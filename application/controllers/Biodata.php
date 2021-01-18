<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
		$this->load->model('Biodata_model', 'bimo');
	}

	public function index()
	{
		$this->mamo->checkLoginMain();

		$data['biodata'] = $this->bimo->getBiodataJoinUser();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Karyawan';

		$this->load->view('templates/header', $data);
		$this->load->view('biodata/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function detail($id)
	{
		$this->mamo->checkLoginMain();

		$data['biodata'] = $this->bimo->getBiodataJoinById($id);
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Detail Karyawan - ' . $data['biodata']['full_name'];

		$this->load->view('templates/header', $data);
		$this->load->view('biodata/detail', $data);
		$this->load->view('templates/footer', $data);
	}

	public function insert()
	{
		$this->mamo->checkLoginMain();

		$data['biodata'] = $this->bimo->getBiodataJoinUser();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Karyawan';

		$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('phone_number', 'No. Telepon', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[biodata.email]');
		if ($this->form_validation->run() == FALSE) {
			$data['error_insert'] = true;
			$this->load->view('templates/header', $data);
			$this->load->view('biodata/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->bimo->insertBiodata();
		}
	}

	public function update($id)
	{
		$this->mamo->checkLoginMain();

		$data['biodata'] = $this->bimo->getBiodataJoinUser();
		$data['dataUser'] = $this->mamo->dataUser();
		$data['title'] = 'Karyawan';

		$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('phone_number', 'No. Telepon', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['error_update'] = true;
			$this->load->view('templates/header', $data);
			$this->load->view('biodata/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->bimo->updateBiodata($id);
		}
	}

	public function delete($id)
	{
		$this->bimo->deleteBiodata($id);
	}
}
