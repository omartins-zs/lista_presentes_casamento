<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dados['produtos'] = $this->Produto_model->buscaProdutos();
		$dados["titulo"] = "Produtos";

		$this->load->vars($dados);

		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop/produtos');
		$this->load->view('templates/shop/footer');
	}

	public function detalhes($id)
	{
		$dados["titulo"] = "Detalhes do Presente";

		$dados['produto'] = $this->Produto_model->buscaProdutoPorId($id);
		$dados['marcas'] = $this->Produto_model->getMarcasByProdutoId($id); // Supondo que você tenha uma função para buscar as marcas do produto

		$this->load->vars($dados);

		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('shop/detalhes');
		$this->load->view('templates/shop/footer');
	}

	public function cerimonia()
	{
		$dados["titulo"] = "Cerimonia";

		$this->load->vars($dados);

		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('pages/cerimonia');
		$this->load->view('templates/shop/footer');
	}

	public function festa()
	{
		$dados["titulo"] = "Festa";

		$this->load->vars($dados);

		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		$this->load->view('pages/festa');
		$this->load->view('templates/shop/footer');
	}

	public function comprar($id)
	{
		try {
			// Recebe a entrada JSON
			$input = json_decode(file_get_contents('php://input'), true);

			// Verifica se o nome do comprador está definido
			if (isset($input['nome_comprador'])) {
				$this->load->model('produto_model');
				$this->produto_model->marcar_como_comprado($id, $input['nome_comprador']);

				// Retorna uma resposta JSON
				echo json_encode(['status' => 'success']);
			} else {
				// Retorna uma resposta de erro se o nome do comprador não estiver definido
				echo json_encode(['status' => 'error', 'message' => 'Nome do comprador não fornecido.']);
			}
		} catch (Exception $e) {
			// Captura qualquer exceção e exibe a mensagem de erro
			echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
			http_response_code(500);
		}
	}
}
