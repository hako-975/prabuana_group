<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getRole()
	{
		return $this->db->get('roles')->result_array();
	}

	public function getRoleById($id)
	{
		return $this->db->get_where('roles', ['id_role' => $id])->row_array();
	}

	public function insertRole()
	{
		$dataUser = $this->mamo->dataUser();
		$data = [
			'role_name' => ucwords(strtolower($this->input->post('role_name', true)))
		];
		$this->mamo->checkAccessAdministratorOnly("menambahkan Jabatan " . $data['role_name']);

		$this->db->insert('roles', $data);
		$this->session->set_flashdata('message-success', 'Jabatan ' . $data['role_name'] . ' berhasil ditambahkan');
		$this->lomo->insertLog($dataUser['username'] . " berhasil menambahkan Jabatan " . $data['role_name'], $dataUser['id_user']);
		redirect('role');
	}

	public function updateRole($id)
	{
		$dataUser = $this->mamo->dataUser();


		$dr = $this->getRoleById($id);
		$role_name = $dr['role_name'];
		
		$data = [
			'role_name' => ucwords(strtolower($this->input->post('role_name', true)))
		];

		$this->mamo->checkAccessAdministratorOnly("mengubah Jabatan " . $role_name . " menjadi " . $data['role_name']);

		$this->db->update('roles', $data, ['id_role' => $id]);
		$this->session->set_flashdata('message-success', 'Jabatan ' . $role_name . ' berhasil diubah');
		$this->lomo->insertLog($dataUser['username'] . " berhasil mengubah Jabatan " . $role_name . " menjadi " . $data['role_name'], $dataUser['id_user']);

		redirect('role');
	}

	public function deleteRole($id)
	{
		$dataUser = $this->mamo->dataUser();


		$dr = $this->getRoleById($id);
		$role_name = $dr['role_name'];
		
		$this->mamo->checkAccessAdministratorOnly("menghapus Jabatan " . $role_name);

		$this->db->delete('roles', ['id_role' => $id]);
		$this->session->set_flashdata('message-success', 'Jabatan ' . $role_name . ' berhasil dihapus');
		$this->lomo->insertLog($dataUser['username'] . " berhasil menghapus Jabatan " . $role_name, $dataUser['id_user']);
		redirect('role');
	}
}