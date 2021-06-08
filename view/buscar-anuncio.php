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
require_once '../config/config.php';

//Busca
//verifica se existe a variavel na url
if (!isset($_GET['pesquisar_anuncio'])) {
    header("Location: welcome.php");
} else {
    //pegar o valor do input buscar
    $valor_pesquisar = $_GET['pesquisar_anuncio'];
}

//select de todos os anuncios
$select_anuncio = "SELECT * FROM anuncio WHERE tipo LIKE '%$valor_pesquisar%' OR cidade LIKE '%$valor_pesquisar%' OR bairro LIKE '$valor_pesquisar'";
$result_select_pesquisar = mysqli_query($mysql_db, $select_anuncio);


//pegar todos os anuncios feitos
$sel_anun_database = "SELECT * FROM anuncio WHERE tipo LIKE '%$valor_pesquisar%' OR cidade LIKE '%$valor_pesquisar%' OR bairro LIKE '$valor_pesquisar'";
$result_anun = $mysql_db->query($sel_anun_database) or die($mysql_db->error);


$sql_anuncio = 'SELECT * FROM anuncio WHERE visibilidade = 1';
// executa querry e define arrays para armazenar infos
$res = mysqli_query($mysql_db, $sql_anuncio);

    $id_anuncio = array();
    $foto_f = array();
    $id_anunciante = array();
    $i = 0;

    while ($reg = mysqli_fetch_assoc($res)) {
        $id_anuncio[$i]    = $reg['id'];
        $foto_f[$i]        = $reg['foto_f'];
        $id_anunciante[$i] = $reg['id_user'];
        $i++;
    }

?>


<div class="container">
    <br>

    <form method="GET" action="buscar-anuncio.php">
        <small>Procure por Cidade, Bairro ou Tipo de Anúncio</small>
        <div class="input-group mb-3">
            <input type="text" class="form-control mr-1 border text-capitalize" name="pesquisar_anuncio" id="pesquisar_anuncio" placeholder="Pesquisar Anúncio" value="<?php echo $valor_pesquisar; ?>">
            <span class="input-group-btn">
                <button class="btn btn-search-painel" style="font-weight: 300;" type="submit" value="gerar_pesquisa">Procurar</button>
            </span>
        </div>
    </form>

    <div>
        <a href="../view/welcome.php"><span class="badge badge-warning">Limpar Busca <i class="fas fa-broom"></i></span></a>
        <a href="#"><span class="badge badge-warning"><?php echo $valor_pesquisar; ?></span></a>
    </div>

    <br>
    <h5 style="text-align: left;">Anúncios</h5>
    <hr class="linha">


    <div class="row" id="row_cards">

        <div class="row">
            <?php while ($dados_anun = $result_anun->fetch_array()) { ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="area-card-painel">

                        <div class="col-sm">
                            <div class="card" style="width: 18rem; margin: 10px;">
                                <img class="card-img-top" src="../img/img_upload/<?php echo $dados_anun['foto_f'] ?>" alt="Card image" width="100%">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $dados_anun['tipo'] ?></h5>
                                    <p>Valor: R$ <?php echo $dados_anun['valor'] ?></p>
                                    <small id="proprietario">Proprietário: <?php echo $dados_anun['proprietario'] ?></small><br>
                                    <small id="endereco">Endereço: <?php echo $dados_anun['rua'], ', ', $dados_anun['num'] ?></small>
                                    <p class="card-text"><small class="text-muted">Anunciado em: <?php echo $dados_anun['data_c'] ?></small></p>
                                    <a href="area_anuncio.php?det_anuncio=<?php echo $id_anuncio[$i]; ?>&foto_anuncio=<?php echo $foto_f[$i]; ?>&iduser=<?php echo $id_user[$i]; ?>" class="btn btn-card" onmousemove="javascript: this.style.backgroundColor = '#FA2929'" onmouseout="javascript: this.style.backgroundColor = '#000'">Detalhes</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>

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
