<?php
session_start();
include 'db.php'; // Include your existing database connection

// Redirect if user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: home.php');
    exit();
}

// Handle form submission
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    // Prepare and execute query to join users and user_types tables
    $stmt = $conn->prepare(
        'SELECT users.*, user_types.redirect 
         FROM users 
         INNER JOIN user_types ON users.type = user_types.id 
         WHERE users.username = ?'
    );
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify password
    if ($user && $password === $user['password']) {
        // Start user session
        $_SESSION['user'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = $user['type'];

        // Redirect based on user type
        header('Location: ' . $user['redirect']);
        exit();
    } else {
        
        $error_message = 'Nume de utilizator sau parolă greșită.';
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Login - Narcis PC</title>
    <style>
        .grid-container {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="top-bar">
    <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
            <li><a href="home.php" class="button"><span class="material-symbols-outlined">home</span>Acasă</a></li>
        </ul>
    </div>
    
</nav>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="container">
                <label for="uname"><b>Nume utilizator</b></label>
                <input type="text" placeholder="Introduceți numele de utilizator" name="uname" required>
    
                <label for="psw"><b>Parolă</b></label>
                <input type="password" placeholder="Introduceți parola" name="psw" required>
    
                <button type="submit">Login</button>

            </div>
            <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>
