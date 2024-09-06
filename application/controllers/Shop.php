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
}
