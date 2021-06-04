<?php
	// Initializa session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: ../view/index.php');
		exit;
	}
?>


<?php 

require_once '../config/config.php';
        // Pega dados do form
        $newemail = $_POST['newemail'];
        $newnome = $_POST['newnome'];
        $newsobrenome = $_POST['newsobrenome'];
        $newtelefone = $_POST['newtelefone'];
        
        //Pega o id da seção atual
        $id = $_SESSION['id'];

        // UPDATE dados no banco
        $sql = "UPDATE `users` SET `nome`= '$newnome',`sobrenome`='$newsobrenome',`email`='$newemail',`telefone`='$newtelefone' WHERE id='$id'";

        $new_sql = mysqli_query($mysql_db, $sql);
        
        // Redireciona se alterar
        if (mysqli_affected_rows($mysql_db) != 0 ) { 
            $_SESSION['att_perfil'] = 'Perfil Atualizado!';
            header('location: ../view/perfil.php');
        } else {
            echo "Não foi possivel editar!";
        }

        $mysql_db->close();



?>