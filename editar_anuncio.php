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

if (isset($_GET['id_anuncio'])) {
    $id_anuncio     = $_GET['id_anuncio'];
}


?>


    <div class="container">

        <!--
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

        <!-- <div class="alert alert-warning" role="alert">
    <h5><i data-feather="alert-triangle"></i></h5>
    <p><small>O "Tipo: Disponível" só poderá ser editado para indisponível depois que o imóvel for adquirido.</small></p>
    <p><small>Fique atento ao número de telefone inserido, pois os usuários entrarão em contato pelo número inserido.</small></p>
</div> -->
        <br>

        <h5 style="text-align: left;">Criar Anuncio</h5>
        <hr class="linha">

        <form method="POST" action="edt_anuncio.php" enctype="multipart/form-data">

            <!- Máscaras -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="proprietario">Proprietário*</label>
                        <input type="text" class="form-control" id="newproprietario" name="newproprietario" placeholder="Nome do Proprietário" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT proprietario FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tipo">Tipo de Anuncio*</label>
                        <select id="newtipo" name="newtipo" class="form-control" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT tipo FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>"required>
                            <option selected>Aluguel</option>
                            <option>Venda</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cidade">Cidade*</label>
                        <select id="newcidade" name="newcidade" class="form-control" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT cidade FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>" required>
                            <option selected>Juazeiro do Norte - CE</option>
                            <option>Crato - CE</option>
                            <option>Barbalha - CE</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rua">Endereço*</label>
                        <input type="text" class="form-control" id="newrua" name="newrua" placeholder="Rua..." value="<?php

                        $mysqli = new mysqli("localhost", "root", "", "hirev2");
                        $sql_p_anuncio = "SELECT rua FROM anuncio WHERE id = '$id_anuncio'";
                        $result = $mysql_db->query($sql_p_anuncio);


                        while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                        }
                        ?>" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="num">N°*</label>
                        <input type="text" class="form-control" id="newnum" name="newnum" value="<?php

                        $mysqli = new mysqli("localhost", "root", "", "hirev2");
                        $sql_p_anuncio = "SELECT num FROM anuncio WHERE id = '$id_anuncio'";
                        $result = $mysql_db->query($sql_p_anuncio);


                        while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                        }
                        ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bairro">Bairro*</label>
                        <input type="text" class="form-control" id="newbairro" name="newbairro" placeholder="Bairro" value="<?php

                        $mysqli = new mysqli("localhost", "root", "", "hirev2");
                        $sql_p_anuncio = "SELECT bairro FROM anuncio WHERE id = '$id_anuncio'";
                        $result = $mysql_db->query($sql_p_anuncio);


                        while ($row = $result->fetch_row()) {
                        printf("%s\n", $row[0]);
                        }
                        ?>" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="whatsapp">Whatsapp</label>
                        <input type="text" class="form-control" id="newwhatsapp" name="newwhatsapp" placeholder="(00) 00000-0000" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT whatsapp FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>" required>
                        <script type="text/javascript">
                            $("#newwhatsapp").mask("(00) 90000-0000");
                        </script>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cep">CEP*</label>
                        <input type="text" class="form-control" id="newcep" name="newcep" placeholder="00000-000" maxlength="9" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT cep FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>" required>
                        <script type="text/javascript">
                            $("#newcep").mask("00000-000");
                        </script>
                    </div>
                </div>




                <!-- <div class="form-group col-md-3">
                <label for="telefone">Telefone / Celular*</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                <script type="text/javascript">
                    $("#telefone").mask("(00) 90000-0000");
                </script>
            </div> -->



                <h5 style="text-align: left;">Sobre o Imóvel</h5>
                <hr class="linha">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="valor">Valor*</label>
                        <input type="text" class="form-control" id="newvalor" name="newvalor" placeholder="Valor" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT valor FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>" required>
                        <script type="text/javascript">
                            $("#newvalor").mask("R$ 999.990,00", {
                                reverse: true
                            });
                        </script>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="num_comodos">Número de Cômodos*</label>
                        <select id="newnum_comodos" name="newnum_comodos" class="form-control" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT num_comodos FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>" required>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>+ de 10</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="form-row">
            <div class="form-group col-md-6">
                <label for="foto_f">Foto da Fachada*</label>
                <input type="file" class="form-control-file" id="foto_f" name="foto_f" required>
            </div>
        </div> -->

                <!-- <div class="form-group col-md-4 ">
                    <label for="exampleInputFile">Foto da Fachada<i class="fas fa-paw"></i></label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="newfoto_f" class="custom-file-input" id="newfoto_f" value="<?php

                                $mysqli = new mysqli("localhost", "root", "", "hirev2");
                                $sql_p_anuncio = "SELECT foto_f FROM anuncio WHERE id = '$id_anuncio'";
                                $result = $mysql_db->query($sql_p_anuncio);


                                while ($row = $result->fetch_row()) {
                                printf("%s\n", $row[0]);
                                }
                                ?>">
                            <label class="custom-file-label" for="foto_f">Foto</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-upload"></i></span>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Fotos do Cômodo*</label>
                    <input type="file" class="form-control-file" id="" name="" required multiple> 
                </div>
            </div> -->


                <button type="submit" class="btn btn-anunciar" onclick="return confirm('Tem certeza que deseja editar Anúncio?')">Salvar</button>
        </form>



        <br>

    </div>
    <!--container-->



<footer>
    <div class="container">
        <p style="color: aliceblue;">Hire</p>
    </div>
</footer>

<?php include 'includes/footerdashboard.php'; ?>