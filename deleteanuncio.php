<?php 

include "config/config.php";

    $sql_del = "UPDATE anuncio SET visibilidade = 0 WHERE id=$id_anuncio[$i]";
    $new_sql = mysqli_query($mysql_db, $sql_del);

    if (mysqli_affected_rows($mysql_db) != 0 ) { 
        header('location: meusanuncios.php');
    } else {
        echo "Não foi possivel editar!";
    }

?>