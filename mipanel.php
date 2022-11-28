<?php
session_start();
//var_dump($_POST);
//var_dump($_GET);
$ingles = "0";
if(!isset($_SESSION["s_usuario"]) && !isset($_SESSION["s_clave"])){
    if(isset($_POST["usuario"]) && isset($_POST["clave"]) ){
        $_SESSION["s_usuario"] = $_POST["usuario"];
        $_SESSION["s_clave"] = $_POST["clave"];
    }else{
        header("Location: index.php");
    }
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $guardarRecordar = (isset($_POST["chkrecordar"]))?$_POST["chkrecordar"]:"";
    if($guardarRecordar!=""){
        setcookie("c_usuario",$usuario,time()+(60*60*24));
        setcookie("c_clave",$clave,time()+(60*60*24));
        setcookie("c_recordar",$guardarRecordar,time()+(60*60*24));
        setcookie("c_ingles",$ingles,time()+(60*60*24));
    }else{
        setcookie("c_usuario","",0);
        setcookie("c_clave","",0);
        setcookie("c_recordar","",0);
        setcookie("c_ingles","",0);
    }
}
if(isset($_COOKIE["c_ingles"]) && !isset($_GET["ingles"])){
    $ingles = $_COOKIE["c_ingles"];
}else{
    $ingles = (isset($_GET["ingles"]))?$_GET["ingles"]:"0";
    //$ingles =  $_GET["ingles"];
}
if(isset($_COOKIE["c_ingles"]) && isset($_GET["ingles"])){
    //$_COOKIE["c_ingles"] = $_GET["ingles"];
    setcookie("c_ingles",$_GET["ingles"],0);
}

$categoriasEN = "<h2>Product List</h2>" . "<br>";;
$myfile = fopen("categorias_en.txt", "r") or die("Unable to open file!");
while(!feof($myfile)){
    $categoriasEN .=  fgets($myfile) . "<br>";
}
fclose($myfile);
$categoriasES = "<h2>Lista de Productos</h2>" . "<br>";
$myfile = fopen("categorias_es.txt", "r") or die("Unable to open file!");
while(!feof($myfile)){
    $categoriasES .=  fgets($myfile) . "<br>";
}
//echo $categoriasES;
fclose($myfile);
/*$ingles = "0";
if(isset($_GET["ingles"])){
    $ingles = $_GET["ingles"];
}*/
?>
<HTML>
    <head></head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h3>Bienvenido Usuario: <?php echo $_SESSION["s_usuario"];?></h3>
        <a href="mipanel.php?ingles=0">ES (Español) </a> | <a href="mipanel.php?ingles=1">EN (English) </a> <br>
        <a href="cerrarsesion.php">Cerrar sesion</a><br>
        <?php echo ($ingles==0)?$categoriasES:$categoriasEN ?>
    </body>
</HTML>