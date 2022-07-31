<?php
// Verificação de login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
  header('location: ../index.php');
  exit;
}
?>
<?php
include '../includes/menudashboard.php';
include '../config/config.php';
?>

<script src="../script/totop.js"></script>
<button class="scrolltotop" onclick="scrolltotop()">TOP</button>

<div class="container">

  <br>
  <!- CAMPO DE BUSCA -->
  <h5 style="text-align: left;">Buscar</h5>
  <hr class="linha">
    <form method="GET" action="buscar-anuncio.php">
        <small>Procure por Cidade, Bairro ou Tipo de Anúncio</small>
        <div class="input-group mb-3">
            <input type="text" class="form-control mr-1 border text-capitalize" name="pesquisar_anuncio" id="pesquisar_anuncio" placeholder="Pesquisar Anúncio" required>
            <span class="input-group-btn">
                <button class="btn btn-search-painel" style="font-weight: 300;" type="submit">Procurar</button>
            </span>
        </div>
    </form>


  <br>
  <h5 style="text-align: left;">Anúncios</h5>
  <hr class="linha">


  <div class="row" id="row_cards">
  <?php
  // Comando para selecionar anuncios
  $sql_anuncio = 'SELECT * FROM anuncio WHERE visibilidade = "1"';

  // executa querry e define arrays para armazenar infos
  if ($res = mysqli_query($mysql_db, $sql_anuncio)) {
    $id_anuncio = array();
    $proprietario = array();
    $cidade = array();
    $bairro = array();
    $rua = array();
    $num = array();
    $cep = array();
    $foto_f = array();
    $tipo = array();
    $whatsapp = array();
    $valor = array();
    $num_comodos = array();
    $id_anunciante = array();
    $data_c = array();
    $i = 0;

    // Recebe os resultados do select
    while ($reg = mysqli_fetch_assoc($res)) {
      $id_anuncio[$i]    = $reg['id'];
      $proprietario[$i]  = $reg['proprietario'];
      $cidade[$i]        = $reg['cidade'];
      $bairro[$i]        = $reg['bairro'];
      $rua[$i]           = $reg['rua'];
      $num[$i]           = $reg['num'];
      $cep[$i]           = $reg['cep'];
      $foto_f[$i]        = $reg['foto_f'];
      $tipo[$i]          = $reg['tipo'];
      $whatsapp[$i]      = $reg['whatsapp'];
      $valor[$i]         = $reg['valor'];
      $num_comodos[$i]   = $reg['num_comodos'];
      $id_anunciante[$i] = $reg['id_user'];
      $data_c[$i]        = $reg['data_c'];

  ?>
      <!- Card -->
        <div class="col-sm">
          <div class="card" style="width: 18rem; margin: 10px;">
            <img class="card-img-top" src="../img/img_upload/<?php echo $foto_f[$i] ?>" alt="Card image" width="100%">
            <div class="card-body">
              <h5 class="card-title"><?php echo $tipo[$i] ?></h5>
              <p>Valor: R$ <?php echo $valor[$i] ?></p>
              <small id="proprietario">Proprietário: <?php echo $proprietario[$i] ?></small><br>
              <small id="endereco">Endereço: <?php echo $rua[$i] ,', ' ,$num[$i] ?></small>
              <p class="card-text"><small class="text-muted">Anunciado em: <?php echo $data_c[$i] ?></small></p>
              <a href="area_anuncio.php?det_anuncio=<?php echo $id_anuncio[$i]; ?>&foto_anuncio=<?php echo $foto_f[$i]; ?>&iduser=<?php echo $id_anunciante[$i]; ?>" class="btn btn-card" onmousemove="javascript: this.style.backgroundColor = '#FA2929'" onmouseout="javascript: this.style.backgroundColor = '#000'">Detalhes</a>
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

<?php include '../includes/footerdashboard.php'; ?>