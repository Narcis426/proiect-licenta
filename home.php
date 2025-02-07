<?php
//session_start();
include 'header.php';
?>


<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <!-- Product Listing -->
        <div class="cell large-9">
            <div class="grid-x grid-margin-x products">
                <!-- Products will be listed here if needed -->
            </div>
        </div>
    </div>
</div>

<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
    <div class="orbit-wrapper">
        <div class="orbit-controls">
            <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
            <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
        </div>
        <ul class="orbit-container">
            <li class="is-active orbit-slide">
                <figure class="orbit-figure">
                    <img class="orbit-image" width="300" height="200" src="images/slides/slide1.jpg" alt="Space">
                </figure>
            </li>
            <li class="orbit-slide">
                <figure class="orbit-figure">
                    <img class="orbit-image" width="300" height="200" src="images/slides/slide2.jpg" alt="Space">
                </figure>
            </li>
            <li class="orbit-slide">
                <figure class="orbit-figure">
                    <img class="orbit-image" width="300" height="200" src="images/slides/slide3.jpg" alt="Space">
                </figure>
            </li>
        </ul>
    </div>
    <nav class="orbit-bullets">
        <button class="is-active" data-slide="0"></button>
        <button data-slide="1"></button>
        <button data-slide="2"></button>
        <button data-slide="3"></button>
    </nav>
</div>

<h2>Produse recomandate</h2>
<table class="produse-recomandate">
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/ssds/ssd.jpg" alt="SSD Samsung">
                    <p>SSD Samsung 980 PRO 2TB PCIe Gen 4.0 x4 NVMe M.2 MZ-V8P2T0BW</p>
                    <a href="ssd.php" class="button"> Vezi ofertă </a>
                </div>
            </td>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/gpus/rtx3060.jpg" alt="rtx 3060">
                    <p>Placa video MSI GeForce RTX 3060 VENTUS 3X OC 12GB GDDR6 192-bit</p>
                    <a href="rtx3060.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/cpus/i9.jpg" alt="procesor">
                    <p>Procesor Intel Core i9-14900KF 3,2 GHz Raptor Lake Refresh Socket 1700 Box BX8071514900KF</p>
                    <a href="i9.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/cases/carcasamsi.jpg" alt="carcasa msi">
                    <p>Carcasa MSI MAG FORGE M100A aRGB cu sursa inclusa MSI MAG 600DN 600W 80 PLUS Active PFC</p>
                    <a href="carcasamsi.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/rams/ramkingston32gb.jpg" alt="RAM">
                    <p>Kit Memorie Kingston FURY Beast 32GB 2x16GB DDR4 3200MHz CL16 Dual Channel kf432c16bbk2/32</p>
                    <a href="ramkingston32gb.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/ssds/ssdsamsung.jpg" alt="ssdsamsung">
                    <p>SSD Samsung 870 QVO 2TB SATA-III 2.5 inch MZ-77Q2T0BW</p>
                    <a href="ssdsamsung.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/psus/sursagigabyte.jpg" alt="sursa">
                    <p>Sursa Modulara GIGABYTE P850GM 850W 80+ Gold gp-p850gm</p>
                    <a href="sursagigabyte.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/mouses/mouselogitech.jpg" alt="mouse logitech">
                    <p>Mouse Gaming Logitech G502 HERO High Performance 16000 DPI USB - EER2 910-005470</p>
                    <a href="mouselogitech.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/keyboards/tastaturacorsair.jpg" alt="tastatura corsair">
                    <p>Tastatura Gaming Corsair K55 RGB PRO XT Negru CH-9226715-NA</p>
                    <a href="tastaturacorsair.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/mouses/mousepadaqirys2.jpg" alt="mousepad aqirys">
                    <p>Mousepad AQIRYS Eclipse Medium (MD) aqrys_eclipsemd</p>
                    <a href="mousepadaqirys.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/headphones/castilogitech.jpg" alt="casti logitech">
                    <p>Casti Gaming Wireless Logitech G733 LightSpeed RGB USB Black 981-000864</p>
                    <a href="castilogitech.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/screens/monitormsi.jpg" alt="monitor msi">
                    <p>Monitor Gaming MSI G274F 27'' Full HD IPS 1ms 180Hz HDR, FreeSync G-SYNC compatible, DisplayPort, HDMI</p>
                    <a href="monitormsi.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
        </tr>
        <tr>

            <td>
                <div class="medium-6 columns panel" data-equalizer-watch>
                    <img src="images/cameras/cameraweb.jpg" alt="camera web logitech">
                    <p>Camera web Logitech C922 Full HD Pro Stream HD 960-001088</p>
                    <a href="cameraweb.php" class="button"> Vezi ofertă</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>
