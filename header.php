<?php
session_start();
require 'db.php'; // Ensure this file contains your database connection logic

// Function to get the navbar items based on the user type
function getNavbarItems($userType, $conn) {
    $query = "
        SELECT p.id, p.nume_meniu, p.pagina, p.parent_id 
        FROM pagini p
        JOIN drepturi d ON p.id = d.IdPage
        WHERE d.IdUserType = ? AND p.Meniu = 1
        ORDER BY p.parent_id, p.id";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userType);
    $stmt->execute();
    $result = $stmt->get_result();
    $navbarItems = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    // Organize items into an array with sub-items
    $menu = [];
    foreach ($navbarItems as $item) {
        if ($item['parent_id'] == 0) {
            $menu[$item['id']] = $item;
            $menu[$item['id']]['sub_items'] = [];
        } else {
            $menu[$item['parent_id']]['sub_items'][] = $item;
        }
    }

    return $menu;
}

// Function to check if the user has access to the current page
function userHasAccess($userType, $currentPage, $conn) {
    // Allow access to home.php for unauthenticated users
    if ($currentPage == 'home.php') {
        return true;
    }

    // Check if the current page exists in the pagini table
    $query = "SELECT COUNT(*) FROM pagini WHERE pagina = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $currentPage);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // If the page is not listed in the pagini table, allow access
    if ($count == 0) {
        return true;
    }

    // If the page is listed in the pagini table, check for specific permissions
    $query = "
        SELECT COUNT(*) 
        FROM pagini p
        LEFT JOIN drepturi d ON p.id = d.IdPage
        WHERE (d.IdUserType = ? OR d.IdUserType IS NULL) AND p.pagina = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $userType, $currentPage);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}

// Get user type from session
$userType = null;
if (isset($_SESSION['user_type'])) {
    $userType = $_SESSION['user_type'];
}

// Get current page
$currentPage = basename($_SERVER['PHP_SELF']);

// Redirect to login page if not logged in and not on home.php
if (!isset($_SESSION['user']) && $currentPage != 'home.php') {
    header('Location: login.php');
    exit;
}

// Redirect to the previous page if the user does not have access to the current page
if (!userHasAccess($userType, $currentPage, $conn)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Get navbar items based on the user type
$navbarItems = $userType !== null ? getNavbarItems($userType, $conn) : [];
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narcis PC</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

<nav class="top-bar">
    <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
            <li><a href="home.php" class="button"><span class="material-symbols-outlined">home</span>Acasă</a></li>
            <?php foreach ($navbarItems as $item): ?>
                <?php if (empty($item['sub_items'])): ?>
                    <li><a href="<?php echo htmlspecialchars($item['pagina']); ?>" class="button"><?php echo htmlspecialchars($item['nume_meniu']); ?></a></li>
                <?php else: ?>
                    <li class="has-submenu">
                        <button href="#" data-dropdown="drop<?php echo $item['id']; ?>" aria-controls="drop<?php echo $item['id']; ?>" aria-expanded="false" class="button dropdown"><?php echo htmlspecialchars($item['nume_meniu']); ?></button>
                        <ul id="drop<?php echo $item['id']; ?>" data-dropdown-content class="f-dropdown" aria-hidden="true">
                            <?php foreach ($item['sub_items'] as $subItem): ?>
                                <li><a href="<?php echo htmlspecialchars($subItem['pagina']); ?>" class="button"><?php echo htmlspecialchars($subItem['nume_meniu']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="logout.php" class="button">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" class="button">Logare</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

</body>
</html>
