<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'lomo');
	}

	public function checkLoginMain()
	{
		if (!$this->session->userdata('id_user')) {
			redirect('auth');
		}
	}

	public function dataUser()
	{
		$this->checkLoginMain();
		$this->db->join('biodata', 'users.id_biodata=biodata.id_biodata');
		$this->db->join('roles', 'users.id_role=roles.id_role');
		return $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();		
	}

	public function checkAccessAdministratorOnly($type)
	{
		$this->checkLoginMain();
		$dataUser = $this->dataUser();
		
		if ($dataUser['id_role'] != '1') {
			$this->session->set_flashdata('message-failed', "Pengguna " . $dataUser['username'] . " dengan Jabatan " . $dataUser['role_name'] . " tidak dapat mengakses, hubungi Administrator untuk info lebih lanjut");
			$this->lomo->insertLog("Pengguna " . $dataUser['username'] . " dengan Jabatan " . $dataUser['role_name'] . " mencoba " . $type, $dataUser['id_user']);
			redirect('main');
		}	
	}
}