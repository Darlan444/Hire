<?php
	require_once 'config/config.php';


	// Define variáveis e inicializa com valores vazios
	$username = $password = $nome = $sobrenome = $email = $telefone = $data_nasc = $confirm_password = "" ;

	$username_err = $password_err = $confirm_password_err = "";

	// Pega Dados de formulários
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

	    // Verifica se tem erro de entrada antes de inserir no banco de dados

	    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

	    	
			$sql = 'INSERT INTO users (username, password, nome, sobrenome, email, telefone, data_nasc) VALUES (?,?,?,?,?,?,?)';

			if ($stmt = $mysql_db->prepare($sql)) {

				
				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT); // Senha cripto
				
				$stmt->bind_param('ss',$param_username,$param_password);

				
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

        		<p style="text-align:center;">Informações Pessoais</p><br>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="" required>
						<span class="help-block"><?php echo $username_err;?></span>
					</div>
					<div class="form-group col-md-6">
						<input type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="Sobrenome" value="" required>
						<span class="help-block"><?php echo $username_err;?></span>
					</div>
				</div>

				<div class="form-group ">
					<input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
				</div>

				<!- Máscaras -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
				
				<div class="form-group">
					<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" autocomplete="off" required>
					<script type="text/javascript">$("#telefone").mask("(00) 90000-0000");</script>
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control" name="data_nasc" id="data_nasc" placeholder="Data de Nascimento" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" autocomplete="off" required>
					<script type="text/javascript">$("#data_nasc").mask("00/00/0000");</script>
				</div>
				

				<div class="form-group">
        			<input type="submit" class="btn btn-lg btn-login btn-block" value="Cadastrar">
        		</div>
        		<p style="text-align:center;">Já tem conta? Entre agora! <a href="index.php">Login Aqui</a>.</p>
        	</form>
		</section>
	</main>

<?php include'includes/footerhome.php';?>