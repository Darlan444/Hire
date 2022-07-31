<?php include '../includes/menuhome.php'; ?>

<div class="container">
    <br>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quem Somos</li>
        </ol>
    </div>

    <br>
    <h2 class="quem-somos-title">Quem Somos?</h2>
    <hr class="linha">
    <section class="area-text">
        <div class="flex-item">
            <p class="quem-somos-text">Hire é uma plataforma Web onde você pode encontrar imóveis na região do cariri para aluguel ou venda. Você como usuário poderá anunciar seus imóveis com alguns cliques!</p>
        </div>
    </section>
    <section class="area-text">
        <div class="flex-item">
            <h4>Entre em Contato!</h4>
            <hr class="linha">
            <small>E-mail disponível para contato e duvidas em geral.</small>
            <p>hire@mail.com</p>
        </div>
    </section>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<form>
		<label for="cep">CEP</label>
		<input id="cep" type="text" required/><br>
		<label for="rua">Logradouro</label>
		<input id="rua" type="text" required/><br>
		<label for="numero">Número</label>
		<input id="numero" type="text" /><br>
		<label for="complemento">Complemento</label>
		<input id="complemento" type="text"/><br>
		<label for="bairro">Bairro</label>
		<input id="bairro" type="text" required/><br>
		<label for="uf">Estado</label>
		<select id="uf">
			<option value="AC">Acre</option>
			<option value="AL">Alagoas</option>
			<option value="AP">Amapá</option>
			<option value="AM">Amazonas</option>
			<option value="BA">Bahia</option>
			<option value="CE">Ceará</option>
			<option value="DF">Distrito Federal</option>
			<option value="ES">Espírito Santo</option>
			<option value="GO">Goiás</option>
			<option value="MA">Maranhão</option>
			<option value="MT">Mato Grosso</option>
			<option value="MS">Mato Grosso do Sul</option>
			<option value="MG">Minas Gerais</option>
			<option value="PA">Pará</option>
			<option value="PB">Paraíba</option>
			<option value="PR">Paraná</option>
			<option value="PE">Pernambuco</option>
			<option value="PI">Piauí</option>
			<option value="RJ">Rio de Janeiro</option>
			<option value="RN">Rio Grande do Norte</option>
			<option value="RS">Rio Grande do Sul</option>
			<option value="RO">Rondônia</option>
			<option value="RR">Roraima</option>
			<option value="SC">Santa Catarina</option>
			<option value="SP">São Paulo</option>
			<option value="SE">Sergipe</option>
			<option value="TO">Tocantins</option>
		</select><br>
	</form>

    <script type="text/javascript">
		$("#cep").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#rua").val(resposta.logradouro);
					$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#uf").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#numero").focus();
				}
			});
		});
	</script>

<?php include '../includes/footerhome.php'; ?>