<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_mahasiswa extends CI_Model {

	public function get_data() {
		return $this->db->get('mahasiswa');
	}

	public function count_rows() {
		return $this->db->count_all('mahasiswa');
	}

	public function get_angkatan() {
		return $this->db->query('select distinct left(nim, 4) as angkatan from mahasiswa');
	}

	public function get_records($nim){
		$where = array('nim' => $nim);
		$this->db->where($where);
		return $this->db->get('mahasiswa');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($nim, $data, $table){
		$where = array('nim' => $nim);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($nim, $table){
		$where = array('nim' => $nim);
		$this->db->where($where);
		return $this->db->delete($table);
	}

}