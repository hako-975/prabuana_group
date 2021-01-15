<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

	public function getLog()
	{
		$this->db->order_by('id_log', 'desc');
		return $this->db->get('logs')->result_array();
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