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

if(isset($_GET['editanuncio'])){
    $id_anuncio = $_GET['editanuncio'];
}
?>

    <div class="container">
        <br>
        <br>
        <h5 style="text-align: left;">Editar Anuncio</h5>
        <hr class="linha">

        <form method="POST" action="../controller/edt_anuncio.php?idanuncio=<?php echo $id_anuncio; ?>">

            <!- Máscaras -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="newproprietario">Proprietário*</label>
                        <input type="text" class="form-control" id="newproprietario" name="newproprietario" placeholder="Nome do Proprietário" value="<?php

                            $mysqli = new mysqli("localhost", "root", "", "hirev2");
                            $sql_p_anuncio = "SELECT proprietario FROM anuncio WHERE id = '$id_anuncio'";
                            $result = $mysql_db->query($sql_p_anuncio);


                            while ($row = $result->fetch_row()) {
                            printf("%s\n", $row[0]);
                            }
                            ?>" required>
                    <script>
                            $('#newproprietario').keypress(function(e) {
                            var keyCode = (e.keyCode ? e.keyCode : e.which); // Variar a chamada do keyCode de acordo com o ambiente.
                            if (keyCode > 47 && keyCode < 58) {
                                e.preventDefault();
                            }
                        });
                    </script>
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
                        <select id="newcidade" name="newcidade" class="form-control" required>
                            <option selected>Juazeiro do Norte - CE</option>
                            <option >Crato - CE</option>
                            <option >Barbalha - CE</option>
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
                        <label for="whatsapp">Whatsapp*</label>
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
                        <select id="newnum_comodos" name="newnum_comodos" class="form-control" required>
                            <option selected>3</option>
                            <option >4</option>
                            <option >5</option>
                            <option >6</option>
                            <option >7</option>
                            <option >8</option>
                            <option >9</option>
                            <option >10</option>
                            <option >+ de 10</option>
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
                <button class="btn btn-editar">Salvar</button>
        </form>



        <br>

    </div>
    <!--container-->



<footer>
    <div class="container">
        <p style="color: aliceblue;">Hire</p>
    </div>
</footer>

<?php include '../includes/footerdashboard.php';?>