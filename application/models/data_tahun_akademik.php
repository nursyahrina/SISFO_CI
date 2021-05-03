<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tahun_akademik extends CI_Model {

	public function get_data() {
		return $this->db->get('ta');
	}

	public function count_rows() {
		return $this->db->count_all('ta');
	}

	public function get_records($ta){
		$where = array('ta' => $ta);
		$this->db->where($where);
		return $this->db->get('ta');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($ta, $data, $table){
		$where = array('ta' => $ta);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($ta, $table){
		$where = array('ta' => $ta);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}