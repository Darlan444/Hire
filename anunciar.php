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

    <div class="alert alert-warning" role="alert">
        <h5><i data-feather="alert-triangle"></i></h5>
        <p><small>O "Tipo: Disponível" só poderá ser editado para indisponível depois que o imóvel for adquirido.</small></p>
        <p><small>Fique atento ao número de telefone inserido, pois os usuários entrarão em contato pelo número inserido.</small></p>
    </div>
    <br>

    <h5>Criar Anuncio</h5>
    <hr class="linha">

    <form method="POST" action="cad_anuncio.php" >

        <!- Máscaras -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="proprietario">Proprietário*</label>
                    <input type="text" class="form-control" id="proprietario" name="proprietario" placeholder="Nome do Proprietário" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo de Anuncio*</label>
                    <select id="tipo" name="tipo" class="form-control" required>
                        <option selected>Aluguel</option>
                        <option>Venda</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade*</label>
                    <select id="cidade" name="cidade" class="form-control" required>
                        <option selected>Juazeiro do Norte - CE</option>
                        <option>Crato - CE</option>
                        <option>Barbalha - CE</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="rua">Endereço*</label>
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua..." required>
                </div>
                <div class="form-group col-md-2">
                    <label for="num">N°*</label>
                    <input type="text" class="form-control" id="num" name="num" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bairro">Bairro*</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP*</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000" maxlength="9" required>
                    <script type="text/javascript">
                        $("#cep").mask("00000-000");
                    </script>
                </div>
                <div class="form-group col-md-2">
                    <label for="tipo_d">Tipo</label>
                    <select id="tipo_d" name="tipo_d" class="form-control" disabled>
                        <option selected>Disponível</option>
                        <option>Indisponível</option>

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto_f">Foto da Fachada*</label>
                    <input type="file" class="form-control-file" id="foto_f" name="foto_f" required>
                </div>



                <div class="form-group col-md-4">
                    <label for="telefone">Telefone / Celular*</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                    <script type="text/javascript">
                        $("#telefone").mask("(00) 90000-0000");
                    </script>
                </div>
                <div class="form-group col-md-2">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="(00) 00000-0000">
                    <script type="text/javascript">
                        $("#whatsapp").mask("(00) 90000-0000");
                    </script>
                </div>
            </div>

            <h5>Sobre o Imóvel</h5>
            <hr class="linha">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="valor">Valor*</label>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor" required>
                    <script type="text/javascript">
                        $("#valor").mask("R$ 999.990,00", {
                            reverse: true
                        });
                    </script>
                </div>
                <div class="form-group col-md-6">
                    <label for="num_comodos">Número de Cômodos*</label>
                    <select id="num_comodos" name="num_comodos" class="form-control" required>
                        <option selected>3</option>
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
                        <label for="">Fotos do Cômodo*</label>
                        <input type="file" class="form-control-file" id="" name="" required multiple> 
                    </div>
                </div> -->


            <button type="submit" class="btn btn-anunciar" onclick="return confirm('Tem certeza que deseja criar Anúncio?')">Anunciar</button>
            <button type="reset" class="btn btn-limpar">Limpar</button>
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