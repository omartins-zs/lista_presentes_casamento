<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto_model extends CI_Model
{
	public function buscaProdutos()
	{
		$this->db->select('*');
		$this->db->from('produtos');
		$result['produtos'] = $this->db->get()->result();

		$this->db->select('COUNT(*) as TOTAL_PRODUTOS');
		$this->db->from('produtos');
		$result['total_produtos'] = $this->db->get()->row()->TOTAL_PRODUTOS;

		return $result;
	}

	public function inserir($produto)
	{
		$this->db->insert('produtos', $produto);
		return $this->db->insert_id();
	}

	public function associarMarca($produto_id, $marca_id)
	{
		$data = array(
			'produto_id' => $produto_id,
			'marca_id' => $marca_id
		);
		return $this->db->insert('produto_marcas', $data);
	}
}
