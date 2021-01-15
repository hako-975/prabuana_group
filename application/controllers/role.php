<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
		$this->load->model('Role_model', 'romo');
	}

	public function index()
	{
		$this->mamo->checkLoginMain();

		$data['role'] = $this->romo->getRole();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Jabatan';

		$this->load->view('templates/header', $data);
		$this->load->view('role/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function insert()
	{
		$this->mamo->checkLoginMain();

		$data['role'] = $this->romo->getRole();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Jabatan';

		$this->form_validation->set_rules('role_name', 'Nama Jabatan', 'required|is_unique[roles.role_name]');
		if ($this->form_validation->run() == FALSE) {
			$data['error_insert'] = true;
			$this->load->view('templates/header', $data);
			$this->load->view('role/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->romo->insertRole();
		}
	}

	public function update($id)
	{
		$this->mamo->checkLoginMain();

		$data['role'] = $this->romo->getRole();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Jabatan';

		$this->form_validation->set_rules('role_name', 'Nama Jabatan', 'required|is_unique[roles.role_name]');
		if ($this->form_validation->run() == FALSE) {
			$data['error_update'] = true;
			$this->load->view('templates/header', $data);
			$this->load->view('role/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->romo->updateRole($id);
		}
	}

	public function delete($id)
	{
		$data['dataUser'] = $this->mamo->dataUser();
		$this->romo->deleteRole($id);
	}
}