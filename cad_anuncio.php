<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: index.php');
    exit;
}
?>


<?php


// Fotos
//formatos permitidos
$formatos = array("png", "jpg", "jpeg");

if (isset($_FILES['foto_f'])) :

    $extensao = PATHINFO($_FILES['foto_f']['name'], PATHINFO_EXTENSION);

    if (in_array($extensao, $formatos)) :

        $pasta = "img/";

        //caminho temporario
        $temporario = $_FILES['foto_f']['tmp_name'];

        //renomeando o arquivo de upload
        $novoNome = uniqid() . ".$extensao";

        // EXECUTANDO O UPLOAD
        move_uploaded_file($temporario, $pasta . $novoNome);

    endif;
endif;


require_once 'config/config.php';
// Pega dados do form
$proprietario   = $_POST['proprietario'];
$cidade         = $_POST['cidade'];
$bairro         = $_POST['bairro'];
$rua            = $_POST['rua'];
$num            = $_POST['num'];
$cep            = $_POST['cep'];
$foto_f         = $_POST['foto_f'];
$tipo           = $_POST['tipo'];
$whatsapp       = $_POST['whatsapp'];
$valor          = $_POST['valor'];
$num_comodos    = $_POST['num_comodos'];
$visibilidade   = 1;

//Pega o id da seção atual
$id = $_SESSION['id'];

// Inserir dados no banco
$sql = "INSERT INTO anuncio(proprietario, cidade, bairro,
        rua, num, cep, foto_f, tipo, whatsapp, valor, num_comodos, id_user, visibilidade) VALUES ('$proprietario','$cidade',
        '$bairro','$rua','$num','$cep', '$foto_f', '$tipo', '$whatsapp','$valor','$num_comodos' , '$id', $visibilidade)";

$new_sql = mysqli_query($mysql_db, $sql);

// Redireciona se feito o anuúncio
if (mysqli_affected_rows($mysql_db) != 0) {
    header('location: index.php');
} else {
    echo "Não foi possivel cadastrar";
}

$mysql_db->close();



?>