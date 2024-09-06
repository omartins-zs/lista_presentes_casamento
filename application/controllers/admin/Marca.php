<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marca extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dados["titulo"] = "Marcas";
		$dados['marcas'] = $this->Marca_model->buscaMarcas();

		$this->load->vars($dados);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/navbar');
		$this->load->view('admin/marca/listagem');
		$this->load->view('templates/admin/footer');
	}

	public function novo()
	{
		$dados["titulo"] = "Cadastro de Marca";

		$this->load->vars($dados);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/navbar');
		$this->load->view('admin/marca/insertEdit');
		$this->load->view('templates/admin/footer');
	}

	public function create()
	{
		$marca = array(
			"nome" => $this->input->post("nome")
		);

		$this->Marca_model->inserir($marca);

		redirect('admin/marca');
	}

	public function edit($id)
	{
		$dados['marca'] = $this->Marca_model->buscaMarcaPorId($id);

		$this->load->vars($dados);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/navbar');
		$this->load->view('admin/marca/insertEdit');
		// $this->load->view('admin/dashboard');
		$this->load->view('templates/admin/footer');
	}
}
