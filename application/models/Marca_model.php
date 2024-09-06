<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marca_model extends CI_Model
{
	public function inserir($marca)
	{
		$this->db->insert("marcas", $marca);
	}
}
