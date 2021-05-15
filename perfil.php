<?php
  // Verificação de login
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: index.php');
		exit;
	}
?>

<?php include'includes/menudashboard.php';?>
<?php include'config/config.php';?>


<?php 
  // Mostrar infos do perfil

  $id = $_SESSION['id'];

  $mysqli = new mysqli("localhost", "root", "", "hirev2");
  $dadosperfil = "SELECT * FROM users WHERE id = '$id'";
  $result = $mysql_db->query($dadosperfil);

?>

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
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $_SESSION['username']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">E-mail</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php 
                      while ($row = $result->fetch_row()) {
                        printf ("%s\n", $row[6]);
                      }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Telefone / Celular</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php 
                      while ($row = $result->fetch_row()) {
                        printf ("%s\n", $row[7]);
                      }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <button class="btn btn-editar">Editar</button>
                <a href="password_reset.php"><button class="btn btn-editar">Redefinir senha</button></a>
              </div>
            </div>
          </div>
        </div>
</div>


    
<?php include'includes/footerdashboard.php';?>
