<?php
/*
session_unset();
session_destroy();
*/
?>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body class="log_in">
        <div class="caja">
            <h1><?php echo $title; ?></h1>
            <p style="color: red;"><?php echo $this->mensaje; ?></p>
            <form action="/login/connectarme" method="post">
                <table style="border-spacing: 5px;">
                    <!--usuari = "algo"/""-->
                    <tr>
                        <td style="text-align: right;"><label for="usuari">Nom d'usuari </label></td>
                        <td><input type="text" name="usuari" id="usuari" placeholder="Nom d'usuari" <?php if(isset($_POST['usuari'])) { echo "value='".$_POST['usuari']."' "; } ?>required></td>
                    </tr>
                    <!--contrasenya = "algo"/""-->
                    <tr>
                        <td style="text-align: right;"><label for="contrasenya">Contrasenya </label></td>
                        <td><input type="password" name="contrasenya" id="contrasenya" placeholder="Contrasenya del compte" required></td>
                    </tr>
                    <!--checkRecordar = "on"/No existe-->
                    <tr>
                        <td style="text-align: right;"><label for="recordar-me">Recorda'm </label></td>
                        <td><input type="checkbox" name="checkRecordar" id="recordar-me" <?php if(isset($_POST['checkRecordar'])) { echo "checked"; } ?>></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><input type="submit" id="connectar" value="Connectar" name="connectar"></td>
                    </tr>
                </table>
            </form>
            <a href="">He oblidat la meva contrasenya</a><br>
            <hr>
            No tens compte?<br>
            <a href="/signup">Registra't</a>
        </div>
    </body>
</html>