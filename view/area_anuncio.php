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

<?php

if (isset($_GET['det_anuncio'])) {
    $id_anuncio = $_GET['det_anuncio'];
}
if (isset($_GET['iduser'])) {
    $id_user = $_GET['iduser'];
}

if (isset($_GET['foto_anuncio'])) {
    $foto_f = $_GET['foto_anuncio'];
}
?>

<div class="container mt-5">


    <div class="row">
        <div class="col-xl-6 col-md-4 mb-3">
            <div class="area-cont-anuncio mb-4">
                <h1 class="h4">Imóvel</h1>
                <hr>
                <!--DADOS DO IMÓVEL-->
                <p class="h5 mb-6"><strong>
                        <?php
                        $sql_p_anuncio = "SELECT tipo FROM anuncio WHERE id = '$id_anuncio'";
                        $result = $mysql_db->query($sql_p_anuncio);

                        while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                        }
                        ?></strong></p>

                <span class="float-right"><i class="fas fa-map-marker-alt"></i></span>
                <p class="mb-1"><strong>Cidade:</strong>
                    <?php

                    $sql_p_anuncio = "SELECT cidade FROM anuncio WHERE id = '$id_anuncio'";
                    $result = $mysql_db->query($sql_p_anuncio);

                    while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                    }
                    ?></p>

                <span class="float-right"><i class="fas fa-map-pin"></i></span>
                <p class="mb-1"><strong>Bairro: </strong>
                    <?php

                    $sql_p_anuncio = "SELECT bairro FROM anuncio WHERE id = '$id_anuncio'";
                    $result = $mysql_db->query($sql_p_anuncio);


                    while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                    }
                    ?></p>

                <span class="float-right"><i class="fas fa-map-pin"></i></span>
                <p class="mb-1"><strong>Endereço:</strong>
                    <?php

                    $sql_p_anuncio = "SELECT rua FROM anuncio WHERE id = '$id_anuncio'";
                    $result = $mysql_db->query($sql_p_anuncio);


                    while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                    }
                    ?> ,
                    <?php

                    $sql_p_anuncio = "SELECT num FROM anuncio WHERE id = '$id_anuncio'";
                    $result = $mysql_db->query($sql_p_anuncio);


                    while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                    }
                    ?></p>

                <span class="float-right"><i class="fas fa-mail-bulk"></i></span>
                <p class="mb-1"><strong>CEP:</strong>
                    <?php

                    $sql_p_anuncio = "SELECT cep FROM anuncio WHERE id = '$id_anuncio'";
                    $result = $mysql_db->query($sql_p_anuncio);


                    while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                    }
                    ?></p>

                <span class="float-right"><i class="fas fa-mail-bulk"></i></span>
                <p class="mb-3"><strong>Num. de Cômodos: </strong>
                    <?php

                    $sql_p_anuncio = "SELECT num_comodos FROM anuncio WHERE id = '$id_anuncio'";
                    $result = $mysql_db->query($sql_p_anuncio);


                    while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                    }
                    ?>
                </p>

                <p class="h5"><strong>Valor: </strong> R$
                    <?php

                    $sql_p_anuncio = "SELECT valor FROM anuncio WHERE id = '$id_anuncio'";
                    $result = $mysql_db->query($sql_p_anuncio);


                    while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                    }
                    ?></p>


            </div>


        </div>
        <div class="col-xl-6 col-md-4 mb-3">

            <div class="area-cont-anuncio mb-6">

                <!--DADOS DO ANUNCIANTE-->
                <h1 class="h4">Dados para Contato</h1>
                <hr>

                <div class="row">
                    <div class="col">
                        <p class="mb-1"><strong>Proprietário:
                                <?php

                                $sql_p_anuncio = "SELECT proprietario FROM anuncio WHERE id = '$id_anuncio'";
                                $result = $mysql_db->query($sql_p_anuncio);


                                while ($row = $result->fetch_row()) {
                                    printf("%s\n", $row[0]);
                                }
                                ?>
                            </strong>
                        </p>

                        <p class="mb-1"><strong>E-mail:</strong>
                            <?php

                            $sql_id_anunciante = "SELECT email FROM users WHERE id = '$id_user'";
                            $result = $mysql_db->query($sql_id_anunciante);


                            while ($row = $result->fetch_row()) {
                                printf("%s\n", $row[0]);
                            }
                            ?>

                        </p>

                        <p class="mb-1"><strong>Whatsapp:

                            </strong>
                            <a href="https://api.whatsapp.com/send?phone=+55
                            <?php

                            $sql_p_anuncio = "SELECT whatsapp FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                                printf("%s\n", $row[0]);
                            }
                            ?>
                            " target="_blank">
                                <?php

                                $sql_p_anuncio = "SELECT whatsapp FROM anuncio WHERE id = '$id_anuncio'";
                                $result = $mysql_db->query($sql_p_anuncio);


                                while ($row = $result->fetch_row()) {
                                    printf("%s\n", $row[0]);
                                }
                                ?></a>
                        </p>
                    </div>
                </div>
            </div>



        </div>




    </div>

    <!--FOTO FACHADA-->
    <div class="row">
        <div class="col-xl-6 col-md-4 mb-3">
            <div class="area-cont-anuncio mb-4">
                <span class="float-right"><i class="fas fa-image"></i></span>
                <h1 class="h4">Fachada</h1>
                <hr>
                <div class="img-fachada" data-allowfullscreen="native" style="border-radius: 10px;">
                    <img src="../img/img_upload/<?php echo $foto_f ?>" alt="Imagem da fachada" class="img-fachada">
                </div>
            </div>
        </div>

        <!--FOTOS COMODOS-->

        <?php
        $sql_comodos = "SELECT * FROM img_comodos WHERE id_anuncio ='$id_anuncio'";
        $result_select_comodos = $mysql_db->query($sql_comodos) or die($mysql_db->error);
        ?>


        <div class="col-xl-6 col-md-4 mb-3">
            <div class="area-cont-anuncio mb-4">
                <span class="float-right"><i class="fas fa-images"></i></span>
                <h1 class="h4">Cômodos</h1>
                <hr>
                <div class="fotorama" data-allowfullscreen="native" data-autoplay="true">
                    <?php while ($dados_img_comodos = $result_select_comodos->fetch_array()) { ?>
                        <img class="img-comodos" src="<?php echo "../img/img_comodos/" . $dados_img_comodos["img_file"]; ?>" alt="">
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

</div>


<?php
include '../includes/footerdashboard.php';
?>