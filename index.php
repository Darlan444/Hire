<?php
// Verificação de login
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: welcome.php");
  exit;
}

// conexao do banco
require_once "config/config.php";

// Define variaveis e inicializa com valores vazios
$username = $password = '';
$username_err = $password_err = '';

// Pega dados dos form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Verifica se userame está vazio
  if (empty(trim($_POST['username']))) {
    $username_err = 'Insira um usuário.';
  } else {
    $username = trim($_POST['username']);
  }

  // Verifica de senha está vazia
  if (empty(trim($_POST['password']))) {
    $password_err = 'Insira uma senha.';
  } else {
    $password = trim($_POST['password']);
  }

  // Verifica se tem erros
  if (empty($username_err) && empty($password_err)) {
    // Faz o select
    $sql = 'SELECT id, username, password FROM users WHERE username = ?';

    if ($stmt = $mysql_db->prepare($sql)) {

      // Parâmetro
      $param_username = $username;

      $stmt->bind_param('s', $param_username);

      // Executa
      if ($stmt->execute()) {

        $stmt->store_result();

        // Verifica se user já existe
        if ($stmt->num_rows == 1) {
          $stmt->bind_result($id, $username, $hashed_password);

          if ($stmt->fetch()) {
            if (password_verify($password, $hashed_password)) {

              session_start();

              $_SESSION['loggedin'] = true;
              $_SESSION['id'] = $id;
              $_SESSION['username'] = $username;

              // Redireciona
              header('location: welcome.php');
            } else {
              // Erro senha
              $password_err = 'Senha Inválida.';
            }
          }
        } else {
          $username_err = "Usuário não existe.";
        }
      } else {
        echo "Oops! Algo deu errado, por favor, tente de novo.";
      }

      $stmt->close();
    }

    $mysql_db->close();
  }
}
?>

<?php include 'includes/menuhome.php'; ?>

<main>

  <div class="grupo_lista">
    <ul class="ul_quem_somos">
      <li class="lista_quem_somos"><a href="quemsomos.php" class="link_quem_somos"><button class="btn btn-quemsomos">Quem Somos?</button></a></li>
    </ul>
  </div>

  <section class="">
    <form class="form-signin text-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <h1 class="text-home"><img src="img/logohireblack.svg" alt="" width=""></h1>
      <br>
      <div class="form-group <?php (!empty($username_err)) ? 'has_error' : ''; ?>">
        <input type="text" name="username" id="username" class="form-control" placeholder="Usuário" value="<?php echo $username ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
      </div>

      <div class="form-group <?php (!empty($password_err)) ? 'has_error' : ''; ?>">
        <input type="password" name="password" id="password" class="form-control" placeholder="Senha" value="<?php echo $password ?>">
        <span class="help-block"><?php echo $password_err; ?></span>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-lg btn-login btn-block" value="login" onmousemove="javascript: this.style.backgroundColor = '#25A87F'" onmouseout="javascript: this.style.backgroundColor = '#000'">
      </div>
      <p>Não tem uma conta? <a href="register.php">Registrar</a>.</p>
      <p class="mt-5 mb-3" style="color: rgb(0, 0, 0);">&copy; Juazeiro do Norte - CE | Hire 💖</p>
    </form>
  </section>
</main>

<?php include 'includes/footerhome.php'; ?>