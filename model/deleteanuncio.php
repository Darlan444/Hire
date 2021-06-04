<?php 
session_start();

include "../config/config.php";

    if(isset($_GET['deleteanuncio'])){
        $id_anuncio = $_GET['deleteanuncio'];
        $sql_del = "UPDATE `anuncio` SET `visibilidade`= 0 WHERE id='$id_anuncio'";

        $new_sql_del = mysqli_query($mysql_db, $sql_del);
    }
    if (mysqli_affected_rows($mysql_db) != 0 ) { 
        $_SESSION['del_anuncio'] = 'Anúncio apagado com sucesso!';
        header('location: ../view/meusanuncios.php');
    } else {
        echo "Não foi possivel Apagar!";
    }

?>