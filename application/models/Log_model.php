<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

	public function getLog()
	{
		return $this->db->get('log')->result_array();
	}

	public function insertLog($content_log, $id_user)
	{
		$data = [
			'content_log' => $content_log,
			'date_log' => time(),
			'id_user' => $id_user
		];

		$this->db->insert('logs', $data);
	}
}