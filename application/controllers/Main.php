<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
	}

	public function index()
	{
		$this->mamo->checkLoginMain();

		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Dasbor';
		
		$this->load->view('templates/admin/header', $data);
		$this->load->view('main/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}
}