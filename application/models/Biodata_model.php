<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model', 'mamo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getBiodata()
	{
		$this->db->order_by('full_name', 'asc');
		return $this->db->get('biodata')->result_array();
	}

	public function getBiodataJoinUser()
	{
		// full outer join
		// $query = "SELECT * FROM biodata
		// 		  LEFT JOIN users ON biodata.id_biodata = users.id_biodata
		// 		  UNION
		// 		  SELECT * FROM biodata
		// 		  RIGHT JOIN users ON biodata.id_biodata = users.id_biodata";

		$this->db->join('biodata', 'biodata.id_biodata = users.id_biodata', 'right');
		return $this->db->get('users')->result_array();
	}

	public function getBiodataById($id)
	{
		return $this->db->get_where('biodata', ['id_biodata' => $id])->row_array();
	}

	public function getBiodataJoinById($id)
	{
		$this->db->join('biodata', 'biodata.id_biodata = users.id_biodata', 'right');
		$this->db->join('roles', 'roles.id_role = users.id_role', 'left');
		return $this->db->get_where('users', ['biodata.id_biodata' => $id])->row_array();
	}

	public function insertBiodata()
	{
		$dataUser = $this->mamo->dataUser();

		$data = [
			'full_name' => ucwords(strtolower($this->input->post('full_name', true))),
			'phone_number' => $this->input->post('phone_number', true),
			'email' => strtolower($this->input->post('email', true)),
			'address' => $this->input->post('address', true),
			'gender' => $this->input->post('gender', true)
		];
		
		$this->mamo->checkAccessAdministratorOnly("menambahkan Karyawan " . $data['full_name'] . 
			" No. Telepon "   . $data['phone_number'] . 
			" Email "  		  . $data['email'] . 
			" Alamat " 		  . $data['address'] . 
			" Jenis Kelamin " . $data['gender']);

		$photo = $_FILES['photo']['name'];
		if ($photo) {
			$config['upload_path'] = './assets/img/img_profiles/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('photo')) {
				$new_photo = $this->upload->data('file_name');
				$this->db->set('photo', $new_photo);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$file_cv = $_FILES['file_cv']['name'];
		if ($file_cv) {
			$config['upload_path'] = './assets/file/file_cv/';
			$config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
			if ($photo == null) {
				$this->load->library('upload', $config);
			} else {
				$this->upload->initialize($config);
			}
		
			if ($this->upload->do_upload('file_cv')) {
				$new_file_cv = $this->upload->data('file_name');
				$this->db->set('file_cv', $new_file_cv);
			} else {
				echo $this->upload->display_errors();
			}
		}
		

		$this->db->insert('biodata', $data);
		$this->session->set_flashdata('message-success', 'Karyawan ' . $data['full_name'] . ' berhasil ditambahkan');
		$this->lomo->insertLog($dataUser['username'] . " berhasil menambahkan Karyawan " . $data['full_name'] . 
			" No. Telepon "   . $data['phone_number'] . 
			" Email "   	  . $data['email'] . 
			" Alamat " 		  . $data['address'] . 
			" Jenis Kelamin " . $data['gender'], $dataUser['id_user']);
		redirect('biodata');
	}

	public function updateBiodata($id)
	{
		$dataUser = $this->mamo->dataUser();

		$db = $this->getBiodataById($id);
		$full_name = $db['full_name'];
		$phone_number = $db['phone_number'];
		$email = $db['email'];
		$address = $db['address'];
		$gender = $db['gender'];
		if ($db['id_biodata'] != $dataUser['id_biodata']) {
			$this->mamo->checkAccessAdministratorOnly("mengubah Karyawan " . $full_name);
		}

		$photo = $_FILES['photo']['name'];
		if ($photo) {
			$config['upload_path'] = './assets/img/img_profiles/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('photo')) {
				$old_photo = $db['photo'];
				if ($old_photo != 'default.png') {
					unlink(FCPATH . 'assets/img/img_profiles/' . $db['photo']);
				}
				$new_photo = $this->upload->data('file_name');
				$this->db->set('photo', $new_photo);
			} else {
				echo $this->upload->display_errors();
			}
		}
		
		$file_cv = $_FILES['file_cv']['name'];
		if ($file_cv) {
			$config['upload_path'] = './assets/file/file_cv/';
			$config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('file_cv')) {
				$old_file_cv = $db['file_cv'];
				if ($old_file_cv != 'default.pdf') {
					unlink(FCPATH . 'assets/file/file_cv/' . $db['file_cv']);
				}
				$new_file_cv = $this->upload->data('file_name');
				$this->db->set('file_cv', $new_file_cv);
			} else {
				echo $this->upload->display_errors();
			}
		}
		
		$data = [
			'full_name' => ucwords(strtolower($this->input->post('full_name', true))),
			'phone_number' => $this->input->post('phone_number', true),
			'email' => strtolower($this->input->post('email', true)),
			'address' => $this->input->post('address', true),
			'gender' => $this->input->post('gender', true)
		];


		$this->db->update('biodata', $data, ['id_biodata' => $id]);
		$this->session->set_flashdata('message-success', 'Karyawan ' . $full_name . ' berhasil diubah');
		$this->lomo->insertLog($dataUser['username'] . " berhasil mengubah Karyawan " . 
			$full_name . " menjadi " . $data['full_name'] . ", " .
			" mengubah No. Telepon " . $phone_number. " menjadi " . $data['phone_number'] . ", " .
			" mengubah Email " . $email. " menjadi " . $data['email'] . ", " .
			" mengubah Alamat " . $address. " menjadi " . $data['address'] . ", " .
			" mengubah Jenis Kelamin " . $gender. " menjadi " . $data['gender'], $dataUser['id_user']);
		$current_url = $this->input->post('current_url', true);
		redirect('biodata' . $current_url);
	}

	public function deleteBiodata($id)
	{
		$dataUser = $this->mamo->dataUser();


		$db = $this->getBiodataById($id);
		$full_name = $db['full_name'];
		
		$this->mamo->checkAccessAdministratorOnly("menghapus Karyawan " . $full_name);
		$old_photo = $db['photo'];
		if ($old_photo != 'default.png') {
			unlink(FCPATH . 'assets/img/img_profiles/' . $db['photo']);
		}
		unlink(FCPATH . 'assets/file/file_cv/' . $db['file_cv']);
		$this->db->delete('users', ['users.id_biodata' => $id]);
		$this->db->delete('biodata', ['biodata.id_biodata' => $id]);
		$this->session->set_flashdata('message-success', 'Karyawan ' . $full_name . ' berhasil dihapus');
		$this->lomo->insertLog($dataUser['username'] . " berhasil menghapus Karyawan " . $full_name, $dataUser['id_user']);
		redirect('biodata');
	}
}
