<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('data_dosen');
	}

	public function index()
	{
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_dosen'] = $this->data_dosen->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('dosen', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'dosen';
		$info['operation'] = 'Input';

		$nidn = $this->input->post('nidn');
		$nama_dosen = $this->input->post('nama_dosen');

		$this->load->view('header');

		$records = $this->data_dosen->get_records($nidn)->result();
		if (count($records) == 0) {
			$data = array(
				'nidn' => $nidn,
				'nama_dosen' => $nama_dosen
			);
			$action = $this->data_dosen->insert_data($data, 'dosen');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'dosen';
		$info['operation'] = 'Ubah';

		$nidn = $this->input->post('nidn');
		$nama_dosen = $this->input->post('nama_dosen');

		$this->load->view('header');

		$data = array(
			'nidn' => $nidn,
			'nama_dosen' => $nama_dosen
		);
		$action = $this->data_dosen->update_data($nidn, $data, 'dosen');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'dosen';

		$nidn = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_dosen->delete_data($nidn, 'dosen');
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

		$data['data_tahun_lahir'] = $this->data_dosen->get_tahun_lahir()->result();

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_filter_dosen', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function laporan_filter()
	{
		$user['username'] = $this->session->userdata('username');
		$user['nama_user'] = $this->session->userdata('nama_user');

		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_dosen'] = $this->db->query("select * from dosen where substring(nidn, 7, 2) >= '$dari' and substring(nidn, 7, 2) <= '$sampai'")->result();

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('laporan/laporan_dosen', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	function print()
	{
		$dari = $this->uri->segment('3');
		$sampai = $this->uri->segment('4');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_dosen'] = $this->db->query("select * from dosen where substring(nidn, 7, 2) >= '$dari' and substring(nidn, 7, 2) <= '$sampai'")->result();

		$this->load->view('print/dosen', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$dari = $this->uri->segment('3');
		$sampai = $this->uri->segment('4');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

		$data['data_dosen'] = $this->db->query("select * from dosen where substring(nidn, 7, 2) >= '$dari' and substring(nidn, 7, 2) <= '$sampai'")->result();


		$this->load->view('pdf/dosen', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("dosen.pdf", array('Attachment' => 0));
	}
}
