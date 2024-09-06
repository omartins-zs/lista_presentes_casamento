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

	public function buscaProdutoPorId($id)
	{
		$this->db->select('*');
		$this->db->from('produtos');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	public function atualizar($id, $produto)
	{
		$this->db->where("id", $id);
		return $this->db->update("produtos", $produto);
	}

	public function removerMarcas($produto_id)
	{
		$this->db->where('produto_id', $produto_id);
		$this->db->delete('produto_marcas');
	}

	public function getMarcasByProdutoId($produto_id)
	{
		$this->db->select('m.*');
		$this->db->from('marcas m');
		$this->db->join('produto_marcas pm', 'pm.marca_id = m.id');
		$this->db->where('pm.produto_id', $produto_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function marcar_como_comprado($id, $nome_comprador)
	{
		try {
			// Certifique-se de que a coluna 'nome_comprador' existe na tabela 'produtos'
			$this->db->where('id', $id);
			$this->db->update('produtos', [
				'comprado' => 1,
				'nome_comprador' => $nome_comprador
			]);

			// Exibe a última query executada
			echo 'Query Executada: ' . $this->db->last_query();
		} catch (Exception $e) {
			// Captura qualquer exceção e exibe a mensagem de erro
			echo 'Erro na query: ' . $e->getMessage();
			http_response_code(500);
		}
	}
}
