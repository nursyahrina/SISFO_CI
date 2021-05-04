<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_dosen extends CI_Model
{

	public function get_data()
	{
		return $this->db->get('dosen');
	}

	public function count_rows()
	{
		return $this->db->count_all('dosen');
	}

	public function get_records($nidn)
	{
		$where = array('nidn' => $nidn);
		$this->db->where($where);
		return $this->db->get('dosen');
	}

	public function get_tahun_lahir()
	{
		return $this->db->query('select distinct substring(nidn, 7, 2) as tahun_lahir from dosen');
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($nidn, $data, $table)
	{
		$where = array('nidn' => $nidn);
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete_data($nidn, $table)
	{
		$where = array('nidn' => $nidn);
		$this->db->where($where);
		return $this->db->delete($table);
	}
}
