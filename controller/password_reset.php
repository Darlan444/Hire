<?php
// Verificação de login
session_start();
 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: ../index.php');
    exit;
}
 
// Chama conexão bd
require_once '../config/config.php';
 
// Define variaveis e inicializa com valores vazios
$new_password = $confirm_password = '';
$new_password_err = $confirm_password_err = '';
 
// Pega dados de forms
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    // Valida nova senha
    if(empty(trim($_POST['new_password']))){
        $new_password_err = 'Por favor, digite a nova senha.';     
    } elseif(strlen(trim($_POST['new_password'])) < 6){
        $new_password_err = 'A senha deve ter pelo menos 6 caracteres.';
    } else{
        $new_password = trim($_POST['new_password']);
    }
    
    // Valida conf. de senha
    if(empty(trim($_POST['confirm_password']))){
        $confirm_password_err = 'Por favor, confirme a senha.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = 'A senha não bate.';
        }
    }
        
    // Verifica erros de entrada
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Realiza o Update
        $sql = 'UPDATE users SET password = ? WHERE id = ?';
        
        if($stmt = $mysql_db->prepare($sql)){
            // Parâmetros
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            $stmt->bind_param("si", $param_password, $param_id);
            
            // Executa
            if($stmt->execute()){
                // Finaliza seção e redireciona
                session_destroy();
                header("location: ../index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }

        $mysql_db->close();
    }
}
?>
 
<?php include '../includes/menudashboard.php';?>

    <main class="">
        <section>
            <form  class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <br>
                <h2>Redefinir Senha</h2>
                <hr class="linha">
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="new_password" class="form-control" placeholder="Nova Senha" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirme a Senha">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-login btn-block" value="Alterar Senha">
                    <a class="btn btn-block btn-link bg-light" href="../view/welcome.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

<?php include '../includes/footerdashboard.php';?>