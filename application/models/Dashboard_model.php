<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	public function countProdutos()
	{
		$this->db->select('COUNT(*) as TOTAL_PRODUTOS');
		$this->db->from('produtos');

		$result = $this->db->get()->row()->TOTAL_PRODUTOS;

		return $result;
	}
}
