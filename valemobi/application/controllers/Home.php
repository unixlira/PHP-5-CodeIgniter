<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index(){


		$this->load->model('inseredados_model');

		$retorno = array('retorno' => $this->inseredados_model->retornaProdutos());

		$this->load->view("home-view",$retorno);

	}

	public function insereDados(){



		$this->load->model('inseredados_model');


		$dados = array(
			'codigo' => $this->input->post('codProduto'),			
			'nome_mercadoria' => $this->input->post('nomeProduto'),
			'tipo_mercadoria' => $this->input->post('tipoProduto'),
			'quantidade' => $this->input->post('qtdProduto'),
			'preco' => $this->input->post('precoProduto'),
			'tipo_negocio' => $this->input->post('tiponegocioProduto')
			);


		$this->inseredados_model->insereProdutos($dados);

		$retorno  = $this->inseredados_model->retornaProdutos();

		?>
		
		<br>
		<br>
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

		<?php
		

	}


}
