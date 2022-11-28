<?php
$recordar = false;
$usuario = "";
$clave = "";
if(isset($_COOKIE["c_recordar"]) && $_COOKIE["c_recordar"]!=""){
    $recordar = true;
    $usuario = isset($_COOKIE["c_usuario"])?$_COOKIE["c_usuario"]:"";
    $clave = isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"]:"";
}
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>LOGIN</h1>
        <form method="POST" action="mipanel.php">
            Usuario*: <br>
            <input type="text" name="usuario" required value=<?php echo $usuario;?> ><br>
            Clave*: <br>
            <input type="password" name="clave" minlength=8  required value=<?php echo $clave;?>> <br>
            <input type="checkbox" name="chkrecordar" <?php echo ($recordar)?"checked":"";?>>Recordarme<br>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>