<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
		$this->load->model('User_model', 'usmo');
		$this->load->model('Biodata_model', 'bimo');
		$this->load->model('Role_model', 'romo');
	}

	public function index()
	{
		$this->mamo->checkLoginMain();

		$data['role'] = $this->romo->getRole();
		$data['biodata'] = $this->bimo->getBiodataJoinUser();
		$data['user'] = $this->usmo->getUser();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Pengguna';

		$this->load->view('templates/admin/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/admin/footer', $data);
	}

	public function insert()
	{
		$this->mamo->checkLoginMain();

		$data['role'] = $this->romo->getRole();
		$data['biodata'] = $this->bimo->getBiodataJoinUser();
		$data['user'] = $this->usmo->getUser();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Pengguna';

		$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'required|matches[password_verify]');
		$this->form_validation->set_rules('password_verify', 'Verifikasi Kata Sandi', 'required|matches[password]');
		$this->form_validation->set_rules('id_biodata', 'Nama Karyawan', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_role', 'Nama Jabatan', 'required|is_natural_no_zero');
		if ($this->form_validation->run() == FALSE) {
			$data['error_insert'] = true;
			$this->load->view('templates/admin/header', $data);
			$this->load->view('user/index', $data);
			$this->load->view('templates/admin/footer', $data);
		} else {
			$this->usmo->insertUser();
		}
	}

	public function update($id)
	{
		$this->mamo->checkLoginMain();

		$data['role'] = $this->romo->getRole();
		$data['biodata'] = $this->bimo->getBiodataJoinUser();
		$data['user'] = $this->usmo->getUser();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Pengguna';

		$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|is_unique[users.username]');
		if ($this->form_validation->run() == FALSE) {
			$data['error_update'] = true;
			$this->load->view('templates/admin/header', $data);
			$this->load->view('user/index', $data);
			$this->load->view('templates/admin/footer', $data);
		} else {
			$this->usmo->updateUser($id);
		}
	}

	public function changePassword()
	{
		$this->mamo->checkLoginMain();

		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Profil';

		$this->form_validation->set_rules('old_password', 'Kata Sandi Lama', 'required');
		$this->form_validation->set_rules('new_password', 'Kata Sandi Baru', 'required|matches[verify_new_password]');
		$this->form_validation->set_rules('verify_new_password', 'Verifikasi Kata Sandi Baru', 'required|matches[new_password]');
		if ($this->form_validation->run() == FALSE) {
			$data['error_update'] = true;
			$this->load->view('templates/admin/header', $data);
			$this->load->view('biodata/profile', $data);
			$this->load->view('templates/admin/footer', $data);
		} else {
			$this->usmo->changePassword();
		}
	}

	public function delete($id)
	{
		$this->usmo->deleteUser($id);
	}
}
