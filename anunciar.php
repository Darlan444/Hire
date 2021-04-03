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
            <p><small>Fique atento ao número de telefone inserido, os usuários entrarão em contato por o número inserido.</small></p>
          </div>
        <br>

        <h5>Criar Anuncio</h5>
        <hr class="linha">
        
        <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Proprietário*</label>
                        <input type="text" class="form-control" id="" name="" placeholder="Nome do Proprietário" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Tipo de Anuncio*</label>
                        <select id="" name="" class="form-control" required>
                            <option selected>Alugar</option>
                            <option>Vender</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Cidade*</label>
                        <select id="" name="" class="form-control" required>
                            <option selected>Juazeiro do Norte - CE</option>
                            <option>Crato - CE</option>
                            <option>Barbalha - CE</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Endereço*</label>
                        <input type="text" class="form-control" id="" name="" placeholder="Rua..." required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">N°*</label>
                        <input type="text" class="form-control" id="" name="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Bairro*</label>
                        <input type="text" class="form-control" id="" name="" placeholder="Bairro" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">CEP*</label>
                        <input type="text" class="form-control" id="" name="" placeholder="00000000" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Tipo</label>
                        <select id="" name="" class="form-control" disabled>
                            <option selected>Disponível</option>
                            <option>Indisponível</option>
                            
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Foto da Fachada*</label>
                        <input type="file" class="form-control-file" id="" name="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Telefone / Celular*</label>
                        <input type="text" class="form-control" id="" name="" placeholder="(00) 00000-0000" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Whatsapp</label>
                        <input type="text" class="form-control" id="" name="" placeholder="(00) 00000-0000">
                    </div>
                </div>

                <h5>Sobre o Imóvel</h5>
                <hr class="linha">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Valor*</label>
                        <input type="number" class="form-control" id="" name="" placeholder="Valor" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Número de Cômodos*</label>
                        <select id="" name="" class="form-control" required>
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

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Fotos do Cômodo*</label>
                        <input type="file" class="form-control-file" id="" name="" required multiple> 
                    </div>
                </div>


            <button type="submit" class="btn btn-anunciar">Anunciar</button>
            <button type="reset" class="btn btn-limpar">Limpar</button>
        </form>
        
        
        
        <br>

    </div><!--container-->

    <footer>
        <div class="container">
          <p style="color: aliceblue;">Hire.</p>
        </div>
    </footer>

<?php include'includes/footerdashboard.php';?>