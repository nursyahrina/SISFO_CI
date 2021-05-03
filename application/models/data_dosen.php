<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_dosen extends CI_Model {
	
	public function get_data() {
		return $this->db->get('dosen');
	}

	public function count_rows() {
		return $this->db->count_all('dosen');
	}

	public function get_records($nidn){
		$where = array('nidn' => $nidn);
		$this->db->where($where);
		return $this->db->get('dosen');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($nidn, $data, $table){
		$where = array('nidn' => $nidn);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($nidn, $table){
		$where = array('nidn' => $nidn);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}