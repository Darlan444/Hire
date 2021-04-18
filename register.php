<?php
	require_once 'config/config.php';


	// Define variáveis e inicializa com valores vazios
	$username = $password = $confirm_password = "";

	$username_err = $password_err = $confirm_password_err = "";

	// Dados de formulários submetidos ao processo
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		// Verifica se o nome de usuário está vazio
		if (empty(trim($_POST['username']))) {
			$username_err = "Por favor, digite um nome de usuário.";

			// Verifique se o nome de usuário já existe
		} else {

			// Prepara uma instrução selecionada
			$sql = 'SELECT id FROM users WHERE username = ?';

			if ($stmt = $mysql_db->prepare($sql)) {
				
				$param_username = trim($_POST['username']);

				
				$stmt->bind_param('s', $param_username);

				
				if ($stmt->execute()) {
					
					
					$stmt->store_result();

					if ($stmt->num_rows == 1) {
						$username_err = 'Este nome de usuário não está disponível.';
					} else {
						$username = trim($_POST['username']);
					}
				} else {
					echo "Oops! ${$username}, algo deu errado. Por favor, tente novamente mais tarde.";
				}

				
				$stmt->close();
			} else {

				
				$mysql_db->close();
			}
		}

		// Valida a senha
	    if(empty(trim($_POST["password"]))){
	        $password_err = "Por favor, digite uma senha.";     
	    } elseif(strlen(trim($_POST["password"])) < 6){
	        $password_err = "A senha deve ter pelo menos 6 caracteres.";
	    } else{
	        $password = trim($_POST["password"]);
	    }
    
	    // Confirma se a senha é igual 
	    if(empty(trim($_POST["confirm_password"]))){
	        $confirm_password_err = "Por favor, confirme a senha.";     
	    } else{
	        $confirm_password = trim($_POST["confirm_password"]);
	        if(empty($password_err) && ($password != $confirm_password)){
	            $confirm_password_err = "A senha não bate.";
	        }
	    }

	    // Verifique o erro de entrada antes de inserir no banco de dados

	    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

	    	
			$sql = 'INSERT INTO users (username, password) VALUES (?,?)';

			if ($stmt = $mysql_db->prepare($sql)) {

				
				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT); // Created a password

				
				$stmt->bind_param('ss', $param_username, $param_password);

				
				if ($stmt->execute()) {
					// Redireciona para logar
					header('location: ./index.php');
					
				} else {
					echo "Algo deu errado. Tente entrar de novo.";
				}

				
				$stmt->close();	
			}

			
			$mysql_db->close();
	    }
	}
?>

<?php include'includes/menuhome.php';?>
	<main>
		<section class="">
			
        	<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

				<br>
        		<div class="text-center"><h3 class="text-home">Cadastre-se na Hire</h3></div>
        		<br>

        		<div class="form-group <?php (!empty($username_err))?'has_error':'';?>">
        			<input type="text" name="username" id="username" class="form-control" placeholder="Nome de Usuário" value="<?php echo $username ?>">
        			<span class="help-block"><?php echo $username_err;?></span>
        		</div>

        		<div class="form-group <?php (!empty($password_err))?'has_error':'';?>">
        			<input type="password" name="password" id="password" class="form-control" placeholder="Senha" value="<?php echo $password ?>">
        			<span class="help-block"><?php echo $password_err; ?></span>
        		</div>

        		<div class="form-group <?php (!empty($confirm_password_err))?'has_error':'';?>">
        			<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar Senha" value="<?php echo $confirm_password; ?>">
        			<span class="help-block"><?php echo $confirm_password_err;?></span>
        		</div>

        		<div class="form-group">
        			<input type="submit" class="btn btn-lg btn-login btn-block" value="Cadastrar">
        		</div>
        		<p>Já tem conta? Entre agora! <a href="index.php">Login Aqui</a>.</p>
        	</form>
		</section>
	</main>

<?php include'includes/footerhome.php';?>