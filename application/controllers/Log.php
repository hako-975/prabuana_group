<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
		$this->load->model('Log_model', 'lomo');
	}

	public function index()
	{
		$this->mamo->checkLoginMain();

		$data['log'] = $this->lomo->getLog();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Riwayat';

		$this->load->view('templates/admin/header', $data);
		$this->load->view('log/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}
}