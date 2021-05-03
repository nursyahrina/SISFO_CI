<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_matakuliah extends CI_Model {

	public function get_data() {
		return $this->db->get('matakuliah');
	}

	public function count_rows() {
		return $this->db->count_all('matakuliah');
	}
	public function get_records($kode_mk){
		$where = array('kode_mk' => $kode_mk);
		$this->db->where($where);
		return $this->db->get('matakuliah');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($kode_mk, $data, $table){
		$where = array('kode_mk' => $kode_mk);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($kode_mk, $table){
		$where = array('kode_mk' => $kode_mk);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}