<?php
// Verificação de login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
  header('location: index.php');
  exit;
}
?>
<?php
include 'includes/menudashboard.php';
include 'config/config.php';
?>


<div class="container">

  <!--
        
        Código não usado!

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


  </form>


  <br>
  <h6>Meus Anúncios</h6>
  <hr class="linha">


  <div class="row" id="row_cards">
  <?php
    // Pega o id da seção atual
    $id = $_SESSION['id'];
  // Comando para selecionar anuncios
  $sql_meusanuncios = "SELECT * FROM anuncio WHERE id_user= '$id' AND visibilidade = 1";

  // executa querry e define arrays para armazenar infos
  if ($res = mysqli_query($mysql_db, $sql_meusanuncios)) {
    $id_anuncio = array();
    $proprietario = array();
    $cidade = array();
    $bairro = array();
    $rua = array();
    $num = array();
    $cep = array();
    $foto_f = array();
    $tipo = array();
    $telefone = array();
    $whatsapp = array();
    $valor = array();
    $num_comodos = array();
    $id_anunciante = array();
    $data_c = array();
    $i = 0;

    // Recebe os resultados do select
    while ($reg = mysqli_fetch_assoc($res)) {
      $id_anuncio = array();
      $proprietario[$i]  = $reg['proprietario'];
      $cidade[$i]        = $reg['cidade'];
      $bairro[$i]        = $reg['bairro'];
      $rua[$i]           = $reg['rua'];
      $num[$i]           = $reg['num'];
      $cep[$i]           = $reg['cep'];
      $foto_f[$i]        = $reg['foto_f'];
      $tipo[$i]          = $reg['tipo'];
      $telefone[$i]      = $reg['telefone'];
      $whatsapp[$i]      = $reg['whatsapp'];
      $valor[$i]         = $reg['valor'];
      $num_comodos[$i]   = $reg['num_comodos'];
      $id_anunciante[$i] = $reg['id_user'];
      $data_c[$i]        = $reg['data_c'];

  ?>
      <!- Card -->
        <div class="col-sm">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="img/<?php echo $foto_f[$i] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $tipo[$i] ?></h5>
              <p>Valor R$ <?php echo $valor[$i] ?></p>
              <small id="proprietario">Proprietário: <?php echo $proprietario[$i] ?></small><br>
              <small id="endereco">Endereço: <?php echo $rua[$i] ,', ' ,$num[$i] ?></small>
              <p class="card-text"><small class="text-muted"><?php echo $data_c[$i] ?></small></p><br>
              <a href="#" class="btn btn-card" style="width: 120px;" onmousemove="javascript: this.style.backgroundColor = '#1C7A26'" onmouseout="javascript: this.style.backgroundColor = '#000'">Editar</a>
              <a href="deleteanuncio.php" class="btn btn-card" style="width: 120px;" onmousemove="javascript: this.style.backgroundColor = '#FA2929'" onmouseout="javascript: this.style.backgroundColor = '#000'">Apagar</a>
            </div>
          </div>
        
          </div>
    <?php
    $i++;
    }
    
  }

    ?>

    
      </div>

      <br>

      <br>

</div>

<footer>
  <div class="container">
    <p style="color: aliceblue;">Hire</p>
  </div>
</footer>

<?php include 'includes/footerdashboard.php'; ?>