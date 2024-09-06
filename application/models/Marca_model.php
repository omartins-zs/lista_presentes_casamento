<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marca_model extends CI_Model
{
	public function inserir($marca)
	{
		$this->db->insert("marcas", $marca);
	}

	public function buscaMarcas()
	{
		$this->db->select('*');
		$this->db->from('marcas');

		return $this->db->get()->result();
	}

	public function buscaMarcaPorId($id)
	{
		$this->db->select('*');
		$this->db->from('marcas');
		$this->db->where('id', $id);

		return $this->db->get()->row();
	}
}
