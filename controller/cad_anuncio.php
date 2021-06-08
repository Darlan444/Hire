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

    // Variáveis Fotos Cômodos
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

    //img fachada
    if (isset($_FILES['ftfachada'])) {
        $image_fachada_name = $_FILES['ftfachada']['name'];
        $image_fachada_type = $_FILES['ftfachada']['type'];
        $image_fachada_size = $_FILES['ftfachada']['size'];
        $image_fachada_tmp = $_FILES['ftfachada']['tmp_name'];
        $image_fachada_location = "../img/img_upload/";
        $extensao = strtolower(pathinfo($image_fachada_name, PATHINFO_EXTENSION));
    }

    //mover fotos fachada
    $image_fachada_name = str_replace('.', '-', basename($image_fachada_name, $extensao));
    $new_image_fachada_name = $image_fachada_name . time() . "-" . $id . "." . $extensao;
    move_uploaded_file($image_fachada_tmp, $image_fachada_location . $new_image_fachada_name);
    $image_data_fachada .= $new_image_fachada_name . " ";


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

$id_anuncio = $mysql_db->insert_id;

//fotos comodos
if (isset($_FILES['ftcomodos'])) {
    foreach ($_FILES['ftcomodos']['tmp_name'] as $key => $value) {
        $img_comodos_file   = $_FILES['ftcomodos']['name'][$key];
        $img_comodos_tmp    = $_FILES['ftcomodos']['tmp_name'][$key];

        $extensao = strtolower(pathinfo($img_comodos_file, PATHINFO_EXTENSION));

        $img_final_comodo = '';

        //if img comodos
        if (in_array($extensao, $extensao_permitida)) {

            //verifica se o nome do arquivo já tem na pasta
            if (!file_exists('../img/img_comodos/' . $img_comodos_file)) {

                move_uploaded_file($img_comodos_tmp, '../img/img_comodos/' . $img_comodos_file);
                $img_final_comodo = $img_comodos_file;
            } else{
                //se tiver a msm img com o msm nome ele add um novo nome
                $img_comodos_file = str_replace('.', '-', basename($img_comodos_file, $extensao));
                $new_img_comodo = $img_comodos_file . time() . "." . $extensao;

                //move a imagem para a pasta
                move_uploaded_file($img_comodos_tmp, '../img/img_comodos/' . $new_img_comodo);
                $img_final_comodo = $new_img_comodo;
            }


            //insert img comodos na tabela das imgs de comodos
            $query_comodos = "INSERT INTO `img_comodos`( `id_user`, `img_file`) VALUES ('$id', '$img_final_comodo')";
            mysqli_query($mysql_db, $query_comodos);

            //atualizar campo com id do anuncio
            $mysql_db->query("UPDATE img_comodos SET id_anuncio ='$id_anuncio' WHERE id_anuncio = 0");
        } else {
            $_SESSION['extensao_err'] = '<b>Erro ao enviar fotos dos cômodos!</b> Você inseriu arquivos não suportados pelo sistema';
            header("Location: ../pages/criar_anuncio.php");
        }
    }

}


$mysql_db->close();



?>