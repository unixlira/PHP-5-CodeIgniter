<!doctype html>
<html>
<head>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
	<script src="<?= base_url('js/jquery.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
	<title>Valemobi Teste</title>
</head>
<body>

	<div class="container">
		<h1>Mercado Lira</h1>
		<br>
		<hr>
		<div class='row'>
			<div class='col-sm-12 col-md-6 col-lg-6 campos'>
				<label for="codigo">Código</label>
				<input id="codigo" type="text" class='form form-control'>
			</div>
			<div class='col-sm-12 col-md-6 col-lg-6 campos'>
				<label for="nome">Nome produto</label>
				<input id="nome" type="text" class='form form-control'>
			</div>
			<div class='col-sm-12 col-md-6 col-lg-6 campos'>
				<label for="tipo">Tipo produto</label>
				<select name="tipo" id="tipo" class='form form-control'>
					<option value="">Escolha o produto</option>
					<option value="Livros">Livros</option>
					<option value="Automóveis">Automóveis</option>
					<option value="Eletrônicos">Eletrônicos</option>
				</select>
			</div>
			<div class='col-sm-12 col-md-6 col-lg-6 campos'>
				<label for="qtd">Quantidade</label>
				<input type="number" id="qtd" class='form form-control'>
			</div>
			<div class='col-sm-12 col-md-6 col-lg-6 campos'>
				<label for="preco">Preço</label>
				<input type="number" id='preco' class='form form-control'>
			</div>
			<div class='col-sm-12 col-md-6 col-lg-6 campos'>
				<label for="tiponegocio">Tipo negócio</label>
				<select name="" id="tiponegocio" class='form form-control'>
					<option value="">Tipo de negócio</option>
					<option value="Compra">Compra</option>
					<option value="Venda">Venda</option>
				</select>
			</div>
			<div class='col-sm-12 col-md-12 col-lg-12 campos'>
				<br>
				<button class='btn btn-primary' id="btnProdutos">Cadastrar</button>
			</div>
			<div class='col-sm-12 col-md-12 col-lg-12 retorno'>
				<hr>
				<h2>Produtos</h2>
				<div class='col-sm-12 col-md-12 col-lg-12 produtos'>
					<br>
					<span id='erro'></span>
					<table class='table'>
						<tr>
							<td>Código</td>
							<td>Nome produto</td>
							<td>Tipo produto</td>
							<td>Quantidade Produto</td>
							<td>Proço Produto</td>
							<td>Tipo negociação Produto</td>
						</tr>
						<?php foreach ($retorno as $dados): ?>
							<tr>
								<td><?= $dados['codigo'] ?></td>
								<td><?= $dados['nome_mercadoria'] ?></td>
								<td><?= $dados['tipo_mercadoria'] ?></td>
								<td><?= $dados['quantidade'] ?></td>
								<td><?= $this->inseredados_model->real($dados['preco']) ?></td>
								<td><?= $dados['tipo_negocio'] ?></td>
							</tr>
						<?php endforeach ?>
					</table>

				</div>
			</div>
		</div>


	</div>
	<div>
		<footer id="rodape">
			<p>Teste de Mercado 2017 - By José Roberto Lira<br/>
			<a href="https://www.facebook.com/joselirabello" target="_blank"> Facebook</a> |
			<a href="https://twitter.com/Robin_Lira" target="_blank"> Twitter</a></p>
		</footer>
	</div>
</body>

</html>

<style>

	label{
		color: #ffffff;
	}

	h1,h2{
		color: #ffffff;
	}

	body{
		background: #eeeeee;
	}

	.container{
		background: #212121 !important;
	}
	
	.campos{
		margin-bottom: 10px;
	}

	.retorno{
		min-height: 400px;
	}
	.produtos{
		color: #fff;

	}
	#erro{
		color: #fff;
	}

	footer#rodape p {
    fon
    text-align: center;
    
    }



</style>


<script>
	$("#btnProdutos").click(function() {

		var codProduto = $("#codigo").val();
		var nomeProduto = $("#nome").val();
		var tipoProduto = $("#tipo").val();
		var qtdProduto = $("#qtd").val();
		var precoProduto = $("#preco").val();
		var tiponegocioProduto = $("#tiponegocio").val();

		var url = "<?= base_url('/index.php/home/inseredados') ?>";


		if (codProduto !=='' & nomeProduto !=='' & tipoProduto !=='' &  qtdProduto !=='' &  precoProduto !=='' &  tiponegocioProduto !=='') {

			$.post(url, 
			{
				codProduto : codProduto,
				nomeProduto : nomeProduto,
				tipoProduto : tipoProduto,
				qtdProduto : qtdProduto,
				precoProduto : precoProduto,
				tiponegocioProduto : tiponegocioProduto

			}, function(data) {

				$(".produtos").html(data)

			});


		}else{

			$("#erro").html("<p style='height:50px;color:orange !important'>Preencha todos os campos</p>");
		}

		

	});

	

</script>