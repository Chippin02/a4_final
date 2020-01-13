<?php
$mensaje = "";
if ($_POST) {
    $existe = $this->existsAccount($_POST);
    if (is_array($existe)) { $mensaje = "Ja existeix un compte amb les dades indicades"; }
    else {
        $this->signUp($_POST);
        if ($_POST['checkRecordar']) { setcookie('recordar', $_POST['usuari']."#".$_POST['contrasenya'],time()+3652460*60); }
        session_start();
        $_SESSION['usuari'] = $existe['usuari'];
        header('location:/');
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="log_in">
<div class="caja">
    <h1><?php echo $title; ?></h1>
    <p style="color: red;"><?php echo $mensaje; ?></p>
    <form action="/signup" method="post">
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
            <!--nom = "algo"/""-->
            <tr>
                <td style="text-align: right;"><label for="nom">Nom </label></td>
                <td><input type="text" name="nom" id="nom" placeholder="El seu nom" <?php if(isset($_POST['nom'])) { echo "value='".$_POST['nom']."' "; } ?>required></td>
            </tr>
            <!--cognoms = "algo"/""-->
            <tr>
                <td style="text-align: right;"><label for="cognoms">Cognoms </label></td>
                <td><input type="text" name="cognoms" id="cognoms" placeholder="Els seus cognoms" <?php if(isset($_POST['cognoms'])) { echo "value='".$_POST['cognoms']."' "; } ?>required></td>
            </tr>
            <!--mail = "algo"/""-->
            <tr>
                <td style="text-align: right;"><label for="mail">Correu electrònic </label></td>
                <td><input type="email" name="mail" id="mail" placeholder="?@?.?" <?php if(isset($_POST['mail'])) { echo "value='".$_POST['mail']."' "; } ?>required></td>
            </tr>
            <!--telefon = "algo"/""-->
            <tr>
                <td style="text-align: right;"><label for="telefon">Telèfon </label></td>
                <td><input type="tel" name="telefon" id="telefon" pattern="[0-9]{9}" <?php if(isset($_POST['telefon'])) { echo "value='".$_POST['telefon']."' "; } ?>placeholder="xxxxxxxxx"></td>
            </tr>
            <!--telefon = "algo"/""-->
            <tr>
                <td style="text-align: right;">Tipus de compte </td>
                <td><select name="compte" id="compte">
                        <option value="2" <?php if(isset($_POST['compte']) && $_POST['compte'] == 2) { echo "selected"; } ?>>Comprador</option>
                        <option value="3" <?php if(isset($_POST['compte']) && $_POST['compte'] == 3) { echo "selected"; } ?>>Venedor</option>
                        <option value="4" <?php if(isset($_POST['compte']) && $_POST['compte'] == 4) { echo "selected"; } ?>>Comprador/venedor</option>
                    </select></td>
            </tr>
            <!--checkRecordar = "on"/No existe-->
            <tr>
                <td style="text-align: right;"><label for="recordar-me">Recorda'm </label></td>
                <td><input type="checkbox" name="checkRecordar" id="recordar-me" <?php if(isset($_POST['checkRecordar'])) { echo "checked"; } ?>></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" id="crear" value="Crear compte" name="crear"></td>
            </tr>
        </table>
    </form>
    <hr>
    Ja tens compte?<br>
    <a href="/login">Connectar</a>
</div>
</body>
</html>