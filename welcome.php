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
        
        <!--
        
        NÃO USAR ESTE CÓDIGO!!

        <div class="grupo_lista">
          <h6>Anuncie ou Procure Casas! 😀</h6>
            <ul class="ul_menu">
                <li class="lista_menu"><a href="" class="link_menu"><button class="btn btn-menu">Alugar</button></a></li>
                <li class="lista_menu"><a href="" class="link_menu"><button class="btn btn-menu">Comprar</button></a></li>
                <li class="lista_menu"><a href="" class="link_menu"><button class="btn btn-menu">Anunciar</button></a></li>
            </ul>
        </div>
        -->

        <br>

        <h5>Buscar</h5>
        <hr class="linha">
        <form action="" class="form-group">
          <input type="text" class="form-control is-valid" placeholder="Buscar" id="buscar-input">
          <div class="valid-feedback">
            Procure por Cidade, Bairro ou Rua!
          </div>
          <button class="btn btn-buscar">Buscar</button>

        </form>


        <br>
        <h5>Anunciados Recentementes</h5>
        <hr class="linha">
        
        <div class="row" id="row_cards">
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/img1.jpg" alt="Card image cap">
                <div class="card-body">
                    <div class="salvar_icon"><i data-feather="heart"></i></div>
                    <h5 class="card-title">Aluguel</h5>
                    <p>R$ 750,00</p>
                    <small id="proprietario">Proprietário: Marcos Heiner</small>
                    <p class="card-text text-justify"><span class="badge badge-success">Disponível</span></p>
                    <p class="card-text"><small class="text-muted">3 de mar</small></p>
                    <a href="#" class="btn btn-card">Saiba Mais</a>
                </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/img2.jpg" alt="Card image cap">
                <div class="card-body">
                    <div class="salvar_icon"><i data-feather="heart"></i></div>
                    <h5 class="card-title">Aluguel</h5>
                    <p>R$ 680,00</p>
                    <small id="proprietario">Proprietário: Juvenal Rodrigues</small>
                    <p class="card-text text-justify"><span class="badge badge-danger">Indisponível</span></p>
                    <p class="card-text"><small class="text-muted">1 de mar</small></p>
                    <a href="#" class="btn btn-card">Saiba Mais</a>
                </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="img/img3.jpg" alt="Card image cap">
                <div class="card-body">
                    <div class="salvar_icon"><i data-feather="heart"></i></div>
                    <h5 class="card-title">Venda</h5>
                    <p>R$ 1.550,00</p>
                    <small id="proprietario">Proprietário: Marco Moreira</small>
                    <p class="card-text text-justify"><span class="badge badge-success">Disponível</span></p>
                    <p class="card-text"><small class="text-muted">28 de fev</small></p>
                    <a href="#" class="btn btn-card">Saiba Mais</a>
                </div>
            </div>
          </div>
        </div>

        <br>
        
        <div class="text-center">
          <a href="">Veja todos os anuncios</a>
        </div>
        
        <br>

    </div><!--container-->

    <footer>
        <div class="container">
          <p style="color: aliceblue;">Hire.</p>
        </div>
    </footer>

<?php include'includes/footerdashboard.php';?>