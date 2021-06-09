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


?>


<div class="container">
    <br>

    <form method="GET" action="buscar-anuncio.php">
        <small>Procure por Cidade, Bairro ou Tipo de Anúncio</small>
        <div class="input-group mb-3">
            <input type="text" class="form-control mr-1 border text-capitalize" name="pesquisar_anuncio" id="pesquisar_anuncio" required placeholder="Pesquisar Anúncio" value="<?php echo $valor_pesquisar; ?>">
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

        <?php while ($dados_anun = $result_anun->fetch_array()) { ?>
            <!- Card -->
                <div class="col-sm">
                    <div class="card" style="width: 18rem; margin: 10px;">
                        <img class="card-img-top" src="../img/img_upload/<?php echo $dados_anun['foto_f'] ?>" alt="Card image" width="100%">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dados_anun['tipo'] ?></h5>
                            <p>Valor: R$ <?php echo $dados_anun['valor'] ?></p>
                            <small id="proprietario">Proprietário: <?php echo $dados_anun['proprietario'] ?></small><br>
                            <small id="endereco">Endereço: <?php echo $dados_anun['rua'], ', ', $dados_anun['num'] ?></small>
                            <p class="card-text"><small class="text-muted">Anunciado em: <?php echo $dados_anun['data_c'] ?></small></p>
                            <a href="area_anuncio.php?det_anuncio=<?php echo $dados_anun['id']; ?>&foto_anuncio=<?php echo $dados_anun['foto_f']; ?>&iduser=<?php echo $dados_anun['id_user']; ?>" class="btn btn-card" onmousemove="javascript: this.style.backgroundColor = '#FA2929'" onmouseout="javascript: this.style.backgroundColor = '#000'">Detalhes</a>
                        </div>
                    </div>

                </div>

            <?php } ?>

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