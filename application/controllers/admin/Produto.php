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
}
