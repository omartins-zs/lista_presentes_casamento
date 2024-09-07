<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		log_message('debug', 'Construtor da classe Produto chamado');
		$this->load->library('upload');
	}

	public function configurarUpload()
	{
		log_message('debug', 'Configurando upload');

		$config['upload_path']   = 'assets/admin/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['overwrite']     = TRUE;
		$config['max_size']      = 3072;
		$config['detect_mime']   = TRUE;

		return $config;
	}

	public function index()
	{
		log_message('debug', 'Método index() chamado');

		$dados["titulo"] = "Produtos";
		$dados['produtos'] = $this->Produto_model->buscaProdutos();

		$this->load->vars($dados);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/navbar');
		$this->load->view('admin/produto/listagem');
		$this->load->view('templates/admin/footer');
	}

	public function novo()
	{
		log_message('debug', 'Método novo() chamado');

		$dados["titulo"] = "Cadastro de Produto";
		$dados['marcas'] = $this->Marca_model->buscaMarcas();

		$this->load->vars($dados);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/navbar');
		$this->load->view('admin/produto/insertEdit');
		$this->load->view('templates/admin/footer');
	}

	public function create()
	{
		log_message('debug', 'Método create() chamado');

		// Configuração do upload
		$config = $this->configurarUpload();
		$this->upload->initialize($config);

		log_message('debug', 'Configuração de upload inicializada');

		// Verifica se o upload foi bem-sucedido
		if ($this->upload->do_upload('imagem')) {
			echo 'Upload bem-sucedido<br>';
			log_message('debug', 'Upload bem-sucedido');

			$file_data = $this->upload->data();
			$file_name = $file_data['file_name']; // Nome do arquivo após o upload
			log_message('debug', 'Nome do arquivo após upload: ' . $file_name);
		} else {
			echo 'Erro no upload<br>';
			log_message('error', 'Erro no upload');

			// Se o upload falhar, exibe mensagens de erro e redireciona
			$upload_errors = $this->upload->display_errors();
			$this->session->set_flashdata('error_msg', $upload_errors);
			log_message('error', 'Erro ao fazer o upload da imagem: ' . $upload_errors);

			redirect('admin/produto/novo');
		}

		// Dados do produto
		echo 'Preparando dados do produto<br>';
		log_message('debug', 'Preparando dados do produto');

		$produto = array(
			"nome" => $this->input->post("nome"),
			"detalhes" => $this->input->post("detalhes"),
			"link_1" => $this->input->post("link_1"),
			"link_2" => $this->input->post("link_2"),
			"preco_intervalo" => $this->input->post("preco_intervalo"),
			"imagem" => isset($file_name) ? $file_name : null
		);

		// Insere o produto no banco de dados e obtém o ID do produto inserido
		$produto_id = $this->Produto_model->inserir($produto);
		log_message('debug', 'Produto inserido com ID: ' . $produto_id);

		// Manipular marcas selecionadas
		$marcas = $this->input->post("marcas"); // Array de IDs das marcas selecionadas
		if (!empty($marcas)) {
			foreach ($marcas as $marca_id) {
				// Associa a marca ao produto
				$this->Produto_model->associarMarca($produto_id, $marca_id);
				log_message('debug', 'Marca ID ' . $marca_id . ' associada ao produto ID ' . $produto_id);
			}
		}

		echo 'Produto inserido com sucesso<br>';
		log_message('debug', 'Produto inserido com sucesso');

		$this->session->set_flashdata('success', 'Produto inserido com sucesso');
		redirect('admin/produto');
	}

	public function edit($id)
	{
		$dados['produto'] = $this->Produto_model->buscaProdutoPorId($id);
		$dados['marcas'] = $this->Marca_model->buscaMarcas();
		$dados['marcas_selecionadas'] = $this->Produto_model->getMarcasByProdutoId($id);

		$this->load->vars($dados);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/navbar');
		$this->load->view('admin/produto/insertEdit');
		$this->load->view('templates/admin/footer');
	}

	public function update($id)
	{
		$produto = array(
			"nome" => $this->input->post("nome"),
			"detalhes" => $this->input->post("detalhes"),
			"link_1" => $this->input->post("link_1"),
			"link_2" => $this->input->post("link_2"),
			"preco_intervalo" => $this->input->post("preco_intervalo"),
		);

		// Verifica se o campo de imagem foi enviado
		if (!empty($_FILES['imagem']['name'])) {
			$config = $this->configurarUpload();
			$this->upload->initialize($config);

			// Verifica se o upload foi bem-sucedido
			if ($this->upload->do_upload('imagem')) {
				$file_data = $this->upload->data();
				$file_name = $file_data['file_name'];
				$produto['imagem'] = $file_name; // Atualiza o nome da imagem
			} else {
				// Se o upload falhar, imprime mensagem de erro e termina o script
				$this->session->set_flashdata('error_msg', 'Erro ao fazer o upload da imagem: ' . $this->upload->display_errors());
				redirect('admin/produto/edit/' . $id);
			}
		}

		$this->Produto_model->atualizar($id, $produto);

		// Remove marcas associadas antigas
		$this->Produto_model->removerMarcas($id);

		// Adiciona as novas marcas associadas
		$marcas = $this->input->post("marcas"); // Array de IDs das marcas selecionadas
		if (!empty($marcas)) {
			foreach ($marcas as $marca_id) {
				$this->Produto_model->associarMarca($id, $marca_id);
			}
		}

		$this->session->set_flashdata('success', 'Produto editado com sucesso');
		redirect('admin/produto');
	}
}
