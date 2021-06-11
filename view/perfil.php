<?php
// Verificação de login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
  header('location: ../index.php');
  exit;
}
?>

<?php include '../includes/menudashboard.php'; ?>
<?php include '../config/config.php'; ?>



<div class="container">
  <div class="main-body">

    <br><br>
    <p id="p_perfil">Perfil</p>

    <div class="form-signin text-center">
      <div class="card mb-4">

      <?php if (isset($_SESSION['att_perfil'])) : ?>
        <div class="alert alert-success" role="alert">
          <?= $_SESSION['att_perfil']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      endif;
      unset($_SESSION['att_perfil']);
      ?>

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
        <a href="../controller/password_reset.php"><button class="btn btn-editar">Redefinir senha</button></a>
      </div>
    </div>
  </div>
</div>
</div>



<?php include '../includes/footerdashboard.php'; ?>