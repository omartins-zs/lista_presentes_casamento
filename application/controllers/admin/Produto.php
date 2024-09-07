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
}
