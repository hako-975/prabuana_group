<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	public function getLogin($username, $password)
	{
		$checkUsername = $this->db->get_where('users', ['username' => $username])->row_array();
		
		if ($checkUsername) {
			if (password_verify($password, $checkUsername['password'])) {
				$dataSession = [
					'id_user' => $checkUsername['id_user']
				];
				$this->session->set_userdata($dataSession);
				redirect('main');
			} else {
				$this->session->set_flashdata('message-failed', 'Password yang anda masukkan salah');
				redirect('auth');
			}	
		} else {
			$this->session->set_flashdata('message-failed', 'Username yang anda masukkan salah');
			redirect('auth');
		}
	}

	public function checkLogin()
	{
		if ($this->session->userdata('id_user')) {
			redirect('main');
		}
	}

	public function checkLoginMain()
	{
		if (!$this->session->userdata('id_user')) {
			redirect('auth');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('auth');
	}
}