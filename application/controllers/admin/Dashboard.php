<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dados["titulo"] = "Dashboard do Casamento";

		$dados['total_produtos'] = $this->Dashboard_model->countProdutos();
		$dados['total_marcas'] = $this->Dashboard_model->countMarcas();

		$this->load->vars($dados);

		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/navbar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/admin/footer');
	}
}
