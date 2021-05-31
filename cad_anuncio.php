<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: index.php');
    exit;
}
?>


<?php
require_once 'config/config.php';

// Fotos

if (isset($_POST['btn-anunciar'])) {

    $images_file = '';
    $images_file_tmp = '';
    $images_location = 'img/img_upload/';
    $image_data = '';

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


    $extensao_permitida = array('jpg', 'jpeg', 'JPG', 'JPEG', 'Jpg', 'Jpeg');

    foreach ($_FILES['foto_f']['name'] as $key_image => $val_image) {
        $images_file = $_FILES['foto_f']['name'][$key_image];
        $images_file_tmp = $_FILES['foto_f']['tmp_name'][$key_image];
        $extensao = pathinfo($images_file, PATHINFO_EXTENSION);

        if (in_array($extensao, $extensao_permitida)) {

            $images_file = str_replace('.', '-', basename($images_file, $extensao));
            $new_images_file = $images_file.time().".".$extensao;
        
            move_uploaded_file($images_file_tmp, $images_location . $images_file);
            $image_data .= strtolower($new_images_file . " ");

            //Pega o id da seção atual
            $id = $_SESSION['id'];

            // Inserir dados no banco
            $sql = "INSERT INTO anuncio(proprietario, cidade, bairro,
            rua, num, cep, foto_f, tipo, whatsapp, valor, num_comodos, id_user, visibilidade) VALUES ('$proprietario','$cidade',
            '$bairro','$rua','$num','$cep', '$image_data', '$tipo', '$whatsapp','$valor','$num_comodos' , '$id', $visibilidade)";

            $new_sql = mysqli_query($mysql_db, $sql);

            // Redireciona se feito o anuúncio
            if (mysqli_affected_rows($mysql_db) != 0) {
                header('location: index.php');
            } else {
                echo "Não foi possivel cadastrar";
            }
    }else{
        echo "Formato Inválido!";
    }


    
    }
}

$mysql_db->close();



?>