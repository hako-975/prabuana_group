<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getUser()
	{
		$this->db->join('biodata', 'users.id_biodata = biodata.id_biodata');
		$this->db->join('roles', 'users.id_role = roles.id_role');
		return $this->db->get('users')->result_array();
	}

	public function getUserById($id)
	{
		return $this->db->get_where('users', ['id_user' => $id])->row_array();
	}

	public function insertUser()
	{
		$dataUser = $this->mamo->dataUser();
		$data = [
			'username' => $this->input->post('username', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'id_biodata' => $this->input->post('id_biodata', true),
			'id_role' => $this->input->post('id_role', true)
		];
		
		$this->mamo->checkAccessAdministratorOnly("menambahkan Pengguna " . $data['username']);

		$this->db->insert('users', $data);
		$this->session->set_flashdata('message-success', 'Pengguna ' . $data['username'] . ' berhasil ditambahkan');
		$this->lomo->insertLog($dataUser['username'] . " berhasil menambahkan Pengguna " . $data['username'], $dataUser['id_user']);
		redirect('user');
	}

	public function updateUser($id)
	{
		$dataUser = $this->mamo->dataUser();


		$du = $this->getUserById($id);
		$username = $du['username'];
		
		$data = [
			'username' => $this->input->post('username', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'id_biodata' => $this->input->post('id_biodata', true),
			'id_role' => $this->input->post('id_role', true)
		];

		$this->mamo->checkAccessAdministratorOnly("mengubah Pengguna " . $username . " menjadi " . $data['username']);

		$this->db->update('users', $data, ['id_user' => $id]);
		$this->session->set_flashdata('message-success', 'Pengguna ' . $username . ' berhasil diubah');
		$this->lomo->insertLog($dataUser['username'] . " berhasil mengubah Pengguna " . $username . " menjadi " . $data['username'], $dataUser['id_user']);

		redirect('user');
	}

	public function deleteUser($id)
	{
		$dataUser = $this->mamo->dataUser();


		$du = $this->getUserById($id);
		$username = $du['username'];
		
		$this->mamo->checkAccessAdministratorOnly("menghapus Pengguna " . $username);

		$this->db->delete('users', ['id_user' => $id]);
		$this->session->set_flashdata('message-success', 'Pengguna ' . $username . ' berhasil dihapus');
		$this->lomo->insertLog($dataUser['username'] . " berhasil menghapus Pengguna " . $username, $dataUser['id_user']);
		redirect('user');
	}
}
