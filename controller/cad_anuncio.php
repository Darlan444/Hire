<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: ../index.php');
    exit;
}
?>


<?php
require_once '../config/config.php';

// Fotos

if (isset($_POST['btn-anunciar'])) {

    $images_file = '';
    $images_file_tmp = '';
    $images_location = '../img/img_upload/';
    $image_data = '';
    $extensao = array();

    // Pega dados do form
    $proprietario   = $_POST['proprietario'];
    $cidade         = $_POST['cidade'];
    $bairro         = $_POST['bairro'];
    $rua            = $_POST['rua'];
    $num            = $_POST['num'];
    $cep            = $_POST['cep'];
    $tipo           = $_POST['tipo'];
    $whatsapp       = $_POST['whatsapp'];
    $valor          = $_POST['valor'];
    $num_comodos    = $_POST['num_comodos'];
    $visibilidade   = 1;

    //Pega o id da seção atual
    $id = $_SESSION['id'];


    $extensao_permitida = array('jpg', 'jpeg');

        /*foreach ($_FILES['foto_f']['name'] as $key_image => $val_image) {
            $images_file = $_FILES['foto_f']['name'][$key_image];
            $images_file_tmp = $_FILES['foto_f']['tmp_name'][$key_image];
            $extensao = strtolower(pathinfo($images_file, PATHINFO_EXTENSION));
        }*/

        /*
        if (in_array($extensao, $extensao_permitida)) {

            $images_file = str_replace('.', '-', basename($images_file, $extensao));
            $new_images_file = $images_file.time().".".$extensao;
        
            move_uploaded_file($images_file_tmp, $images_location . $images_file);
            $image_data .= $new_images_file . " ";
            
        }else{
            echo "Formato Inválido!";
        }*/

        //img fachada
        if(isset($_FILES['ftfachada'])){
            $image_fachada_name = $_FILES['ftfachada']['name'];
            $image_fachada_type = $_FILES['ftfachada']['type'];
            $image_fachada_size = $_FILES['ftfachada']['size'];
            $image_fachada_tmp = $_FILES['ftfachada']['tmp_name'];
            $image_fachada_location = "../img/img_upload/";
            $extensao = strtolower(pathinfo($image_fachada_name, PATHINFO_EXTENSION));
        }

        //mover fotos fachada
        $image_fachada_name = str_replace('.', '-', basename($image_fachada_name, $extensao));
        $new_image_fachada_name = $image_fachada_name.time()."-".$id.".".$extensao;
        move_uploaded_file($image_fachada_tmp, $image_fachada_location.$new_image_fachada_name);
        $image_data_fachada .= $new_image_fachada_name." ";

        
        // Inserir dados no banco
        $sql = "INSERT INTO anuncio(proprietario, cidade, bairro,
        rua, num, cep, foto_f, tipo, whatsapp, valor, num_comodos, id_user, visibilidade) VALUES ('$proprietario','$cidade',
        '$bairro','$rua','$num','$cep', '$image_data_fachada', '$tipo', '$whatsapp','$valor','$num_comodos' , '$id', $visibilidade)";

        $new_sql = mysqli_query($mysql_db, $sql);

        // Redireciona se feito o anuúncio
        if (mysqli_affected_rows($mysql_db) != 0) {
            $_SESSION['cad_anuncio'] = 'Anúncio realizado com Sucesso!';
            header('location: ../view/meusanuncios.php');
        } else {
            echo "Não foi possivel cadastrar";
        }

    
    }


$mysql_db->close();



?>