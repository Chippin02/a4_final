<?php
/*session_start();
if (!isset($_SESSION['usuari'])){
    echo "NO EXISTE EL SESSION";
}
else {
    var_dump($_SESSION);
}*/
?>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body class="home">
        <div class="header"><h1><?php echo $title; ?></h1></div>
        <div class="nav">
            <div class="user"></div>
            <div class="links">
                <?php if (isset($_SESSION['usuari'])) { echo "<a href='/user'>Perfil</a>"; } ?>
                <?php if (isset($_SESSION['usuari'])) { echo "<a href='/user'>Desconectar-me</a>"; } ?>
                <?php if (!isset($_SESSION['usuari'])) { echo "<a href='/login'>Connectar-me</a>"; } ?>
                <?php if (!isset($_SESSION['usuari'])) { echo "<a href='/signup'>Crear compte</a>"; } ?>
            </div>
        </div>
        <div class="content">
            <div class="section">
                <div class="article">
                    <h3><a href="/details/show/id/19523">Nombre de la oferta</a></h3>
                    <p>Información de la oferta</p>
                </div>
            </div>
            <div class="aside">
                <h1>Menú</h1>
                <p>HOLA</p>
                <p>Caracola</p>
            </div>
        </div>
        <div class="footer">
            <div>
                <h3>Normativa</h3>
            </div>
            <div>
                <h3>Xarxes socials</h3>
            </div>
        </div>
    </body>
</html>