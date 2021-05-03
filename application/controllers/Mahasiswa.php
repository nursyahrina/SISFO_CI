<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('data_mahasiswa');
	}

	public function index()
	{
		$data['data_mahasiswa'] = $this->data_mahasiswa->get_data()->result();
		$data['data_angkatan'] = $this->data_mahasiswa->get_angkatan()->result();
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('mahasiswa', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'mahasiswa';
		$info['operation'] = 'Input';

		$nim = $this->input->post('nim');
		$namamahasiswa = $this->input->post('namamahasiswa');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$alamat = $this->input->post('alamat');

		$this->load->view('header');

		$records = $this->data_mahasiswa->get_records($nim)->result();
		if (count($records) == 0) {
			$data = array(
				'nim' => $nim,
				'namamahasiswa' => $namamahasiswa,
				'jeniskelamin' => $jeniskelamin,
				'alamat' => $alamat
			);
			$action = $this->data_mahasiswa->insert_data($data, 'mahasiswa');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'mahasiswa';
		$info['operation'] = 'Ubah';

		$nim = $this->input->post('nim');
		$namamahasiswa = $this->input->post('namamahasiswa');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$alamat = $this->input->post('alamat');

		$this->load->view('header');

		$data = array(
			'nim' => $nim,
			'namamahasiswa' => $namamahasiswa,
			'jeniskelamin' => $jeniskelamin,
			'alamat' => $alamat
		);
		$action = $this->data_mahasiswa->update_data($nim, $data, 'mahasiswa');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}

		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'mahasiswa';

		$nim = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_mahasiswa->delete_data($nim, 'mahasiswa');
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
		$data['data_angkatan'] = $this->data_mahasiswa->get_angkatan()->result();

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_filter_mahasiswa', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function laporan_filter()
	{
		$user['username'] = $this->session->userdata('username');
		$data['data_angkatan'] = $this->data_mahasiswa->get_angkatan()->result();

		$angkatan = $this->input->post('angkatan');

		$data['angkatan'] = $angkatan;

		if ($angkatan === 'all') {
			$data['data_mahasiswa'] = $this->db->query("select * from mahasiswa")->result();
		} else {
			$data['data_mahasiswa'] = $this->db->query("select * from mahasiswa where nim like '$angkatan%'")->result();
		}

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_mahasiswa', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	function print()
	{
		$angkatan = $this->uri->segment('3');

		$data['angkatan'] = $angkatan;

		if ($angkatan === 'all') {
			$data['data_mahasiswa'] = $this->db->query("select * from mahasiswa")->result();
		} else {
			$data['data_mahasiswa'] = $this->db->query("select * from mahasiswa where nim like '$angkatan%'")->result();
		}

		$this->load->view('print/mahasiswa', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$angkatan = $this->uri->segment('3');

		$data['angkatan'] = $angkatan;

		if ($angkatan === 'all') {
			$data['data_mahasiswa'] = $this->db->query("select * from mahasiswa")->result();
		} else {
			$data['data_mahasiswa'] = $this->db->query("select * from mahasiswa where nim like '$angkatan%'")->result();
		}

		$this->load->view('pdf/mahasiswa', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("mahasiswa.pdf", array('Attachment' => 0));
	}
}
