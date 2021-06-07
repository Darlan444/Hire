<?php
// Inicia session / Verifica login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: ../index.php');
    exit;
}
?>


<?php
$id_anuncio = '';

if(isset($_GET['idanuncio'])){
    $id_anuncio = $_GET['idanuncio'];
}

require_once '../config/config.php';

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

    if (isset($_GET['idanuncio'])) {
        $id_anuncio = $_GET['idanuncio'];
    }

    // UPDATE dados no banco
    $sql = "UPDATE `anuncio` SET `propritario`= '$newproprietario', `cidade`='$newcidade', `bairro`='$newbairro', `rua`='$newrua', 
    `num`= '$newnum', `cep`='$newcep', `tipo`='$newtipo', `whatsapp`='$newwhatsapp', `valor`='$newvalor', 
    `num_comodos`='$newwhatsapp' WHERE id= $id_anuncio ";

    $new_sql = mysqli_query($mysql_db, $sql);

    // Redireciona se atualizado o anuúncio
    if (mysqli_affected_rows($mysql_db) != 0) {
        $_SESSION['att_anuncio'] = 'Anúncio alterado com sucesso!';
        header('location: ../view/meusanuncios.php');
    } else {
        echo "Não foi possivel editar!";
    }

    $mysql_db->close();


?>