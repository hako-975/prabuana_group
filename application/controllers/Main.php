<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'aumo');
	}

	public function index()
	{
		$this->aumo->checkLoginMain();

		$data['title'] = 'Dasbor';
		$this->load->view('templates/header', $data);
		$this->load->view('main/index', $data);
		$this->load->view('templates/footer', $data);
	}
}