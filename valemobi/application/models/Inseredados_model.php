<?php 

class Inseredados_model extends CI_Model
{
	public function insereProdutos($dados){

		return $this->db->insert('produtos',$dados);

	}

	public function retornaProdutos(){

		$this->db->select("*");
		$this->db->from("produtos");
		$this->db->order_by('id', 'DESC');
		
		return $this->db->get()->result_array();

	}

	public function real($real){

		return 'R$ '.number_format($real , "2", ',','.');

	}




}
?>