<?php
// Inicia session / Verifica login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: index.php');
    exit;
}
?>


<?php

require_once 'config/config.php';
// Pega dados do form
$newproprietario  = $_POST['newproprietario'];
$newcidade        = $_POST['newcidade'];
$newbairro        = $_POST['newbairro'];
$newrua           = $_POST['newrua'];
$newnum           = $_POST['newnum'];
$newcep           = $_POST['newcep'];
$newtipo          = $_POST['newtipo'];
$newwhatsapp      = $_POST['newwhatsapp'];
$newvalor         = $_POST['newvalor'];
$newnum_comodos   = $_POST['newnum_comodos'];

//Pega o id do anúncio

if (isset($_GET['editar_anuncio'])) {
    $id_anuncio = $_GET['editar_anuncio'];
}

// UPDATE dados no banco
$sql = "UPDATE `anuncio` SET `propritario`= '$newproprietario',`cidade`='$newcidade',`bairro`='$newbairrp',`rua`='$newrua',
 `num`= '$newnum',`cep`='$newscep',`tipo`='$newtipo',`whatsapp`='$newwhatsapp', `valor`='$newvalor',
 `num_comodos`='$newtelefone' WHERE id='$id_anuncio'";

$new_sql = mysqli_query($mysql_db, $sql);

// Redireciona se feito o anuúncio
if (mysqli_affected_rows($mysql_db) != 0) {
    header('location: meusanuncios.php');
} else {
    echo "Não foi possivel editar!";
}

$mysql_db->close();



?>