<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MataKuliah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('data_matakuliah');
	}

	public function index()
	{
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_matakuliah'] = $this->data_matakuliah->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('matakuliah', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'matakuliah';
		$info['operation'] = 'Input';

		$kode_mk = $this->input->post('kode_mk');
		$nama_mk = $this->input->post('nama_mk');
		$sks = $this->input->post('sks');

		$this->load->view('header');

		$records = $this->data_matakuliah->get_records($kode_mk)->result();
		if (count($records) == 0) {
			$data = array(
				'kode_mk' => $kode_mk,
				'nama_mk' => $nama_mk,
				'sks' => $sks
			);
			$action = $this->data_matakuliah->insert_data($data, 'matakuliah');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'matakuliah';
		$info['operation'] = 'Ubah';

		$kode_mk = $this->input->post('kode_mk');
		$nama_mk = $this->input->post('nama_mk');
		$sks = $this->input->post('sks');

		$this->load->view('header');

		$data = array(
			'kode_mk' => $kode_mk,
			'nama_mk' => $nama_mk,
			'sks' => $sks
		);
		$action = $this->data_matakuliah->update_data($kode_mk, $data, 'matakuliah');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'matakuliah';

		$kode_mk = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_matakuliah->delete_data($kode_mk, 'matakuliah');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	public function laporan()
	{
		$user['username'] = $this->session->userdata('username');
		$user['nama_user'] = $this->session->userdata('nama_user');
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_filter_matakuliah');
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function laporan_filter()
	{
		$user['username'] = $this->session->userdata('username');
		$user['nama_user'] = $this->session->userdata('nama_user');

		$semester = $this->input->post('semester');

		$data['semester'] = $semester;

		if ($semester === 'all') {
			$data['data_matakuliah'] = $this->db->query("select * from matakuliah")->result();
		} else {
			$data['data_matakuliah'] = $this->db->query("select * from matakuliah where substring(kode_mk, 4, 1) = '$semester'")->result();
		}

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_matakuliah', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	function print()
	{
		$semester = $this->uri->segment('3');

		$data['semester'] = $semester;

		if ($semester === 'all') {
			$data['data_matakuliah'] = $this->db->query("select * from matakuliah")->result();
		} else {
			$data['data_matakuliah'] = $this->db->query("select * from matakuliah where substring(kode_mk, 4, 1) = '$semester'")->result();
		}

		$this->load->view('print/matakuliah', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$semester = $this->uri->segment('3');

		$data['semester'] = $semester;

		if ($semester === 'all') {
			$data['data_matakuliah'] = $this->db->query("select * from matakuliah")->result();
		} else {
			$data['data_matakuliah'] = $this->db->query("select * from matakuliah where substring(kode_mk, 4, 1) = '$semester'")->result();
		}

		$this->load->view('pdf/matakuliah', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("matakuliah.pdf", array('Attachment' => 0));
	}
}
