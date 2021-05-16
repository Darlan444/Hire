<?php
// Verificação de login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
  header('location: index.php');
  exit;
}
?>

<?php include 'includes/menudashboard.php'; ?>
<?php include 'config/config.php'; ?>



<div class="container">
  <div class="main-body">

    <br><br>
    <p id="p_perfil">Perfil</p>

    <!-- <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="img/perfil.jpg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['username']; ?><img src="img/check.svg" alt="" class="verificado" width="15" style="margin-bottom: 20px;"></h4>
                      <p class="text-muted font-size-sm">Juazeiro do Norte - CE, Salesianos</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
    <div class="form-signin text-center">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4">
              <h6 class="mb-0">Username</h6>
            </div>
            <div class="col-sm-8 text-secondary">
              <?php echo $_SESSION['username']; ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <h6 class="mb-0">E-mail</h6>
            </div>
            <div class="col-sm-8 text-secondary">
              <?php

              $id = $_SESSION['id'];

              $mysqli = new mysqli("localhost", "root", "", "hirev2");
              $emailperfil = "SELECT email FROM users WHERE id = '$id'";
              $result = $mysql_db->query($emailperfil);


              while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
              }
              ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <h6 class="mb-0">Nome</h6>
            </div>
            <div class="col-sm-8 text-secondary">
            <?php

            $id = $_SESSION['id'];

            $mysqli = new mysqli("localhost", "root", "", "hirev2");
            $nomeperfil = "SELECT nome FROM users WHERE id = '$id'";
            $result = $mysql_db->query($nomeperfil);


            while ($row = $result->fetch_row()) {
              printf("%s\n", $row[0]);
            }
            ?>
          </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <h6 class="mb-0">Sobrenome</h6>
            </div>
            <div class="col-sm-8 text-secondary">
            <?php

            $id = $_SESSION['id'];

            $mysqli = new mysqli("localhost", "root", "", "hirev2");
            $sobrenomeperfil = "SELECT sobrenome FROM users WHERE id = '$id'";
            $result = $mysql_db->query($sobrenomeperfil);


            while ($row = $result->fetch_row()) {
              printf("%s\n", $row[0]);
            }
            ?>
          </div>
          </div>
          
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <h6 class="mb-0">Telefone / Celular</h6>
            </div>
            <div class="col-sm-8 text-secondary">
            <?php

            $id = $_SESSION['id'];

            $mysqli = new mysqli("localhost", "root", "", "hirev2");
            $telefoneperfil = "SELECT telefone FROM users WHERE id = '$id'";
            $result = $mysql_db->query($telefoneperfil);


            while ($row = $result->fetch_row()) {
              printf("%s\n", $row[0]);
            }
            ?>
          </div>
          </div>
        </div>
      </div>
      <div>
        <a href="editar_perfil.php"><button class="btn btn-editar">Editar</button></a>
        <a href="password_reset.php"><button class="btn btn-editar">Redefinir senha</button></a>
      </div>
    </div>
  </div>
</div>
</div>



<?php include 'includes/footerdashboard.php'; ?>