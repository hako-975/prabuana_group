<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'aumo');
	}
	
	public function index()
	{
		$this->aumo->checkLogin();
		
		$data['title'] = 'Masuk';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	public function login()
	{
		$this->aumo->checkLogin();
		
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		return $this->aumo->getLogin($username, $password);
	}

	public function logout()
	{
		$this->aumo->logout();
	}

}
