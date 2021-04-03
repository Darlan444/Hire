<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: index.php');
		exit;
	}
?>

<?php include'includes/menudashboard.php';?>

<div class="container">
    <div class="main-body">

        <br>

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="img/perfil.jpg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['username']; ?><img src="img/check.svg" alt="" class="verificado" width="15" style="margin-bottom: 20px;"></h4>
                      <p class="text-secondary mb-1">Anunciante</p>
                      <p class="text-muted font-size-sm">Juazeiro do Norte - CE, Salesianos</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nome</h6>
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
                      marcosheiner2000@gmail.com
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Telefone / Celular</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Endereço</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Rua Possidônio Bem, 326, Salesianos
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <button class="btn btn-editar">Editar</button>
                <button class="btn btn-editar">Meus Anuncios</button>
                <a href="password_reset.php"><button class="btn btn-editar">Redefinir senha</button></a>
              </div>
            </div>
          </div>
        </div>
</div>


    
<?php include'includes/footerdashboard.php';?>
