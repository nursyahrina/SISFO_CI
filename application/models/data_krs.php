<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_krs extends CI_Model {

	public function get_data() {
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('ta', 'ta.ta = krs.ta');
		$this->db->join('mahasiswa', 'mahasiswa.nim = krs.nim');
		$this->db->join('matakuliah', 'matakuliah.kode_mk = krs.mk');
		$this->db->join('dosen', 'dosen.nidn = krs.nidn');
		return $this->db->get();
	}

	public function count_rows() {
		return $this->db->count_all('krs');
	}

	public function get_records($where){
		$this->db->where($where);
		return $this->db->get('krs');
	}

	public function insert_data($data, $table){
		$this->db->insert($table, $data);
	}

	public function update_data($where, $data, $table){
		$this->db->where($where);
		return $this->db->replace($table, $data);
	}

	public function delete_data($where, $table){
		$this->db->where($where);
		return $this->db->delete($table);
	}
}