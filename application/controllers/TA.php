<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TA extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_tahun_akademik');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$user['nama_user'] = $this->session->userdata('nama_user');
		$data['data_tahun_akademik'] = $this->data_tahun_akademik->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('tahun_akademik', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'ta';
		$info['operation'] = 'Input';

		$ta = $this->input->post('ta');
		$detail_ta = $this->input->post('detail_ta');

		$this->load->view('header');

		$records = $this->data_tahun_akademik->get_records($ta)->result();
		if (count($records) == 0) {
			$data = array(
				'ta' => $ta,
				'detail_ta' => $detail_ta
			);
			$action = $this->data_tahun_akademik->insert_data($data, 'ta');
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');
	}

	public function edit()
	{
		$info['datatype'] = 'ta';
		$info['operation'] = 'Ubah';

		$ta = $this->input->post('ta');
		$detail_ta = $this->input->post('detail_ta');

		$this->load->view('header');

		$data = array(
			'ta' => $ta,
			'detail_ta' => $detail_ta
		);
		$action = $this->data_tahun_akademik->update_data($ta, $data, 'ta');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}


		$this->load->view('source');
	}

	public function delete()
	{
		$info['datatype'] = 'ta';

		$ta = $this->uri->segment('3');

		$this->load->view('header');

		$action = $this->data_tahun_akademik->delete_data($ta, 'ta');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	function print()
	{
		$data['data_tahun_akademik'] = $this->db->query("select * from ta")->result();

		$this->load->view('print/tahun_akademik', $data);
	}

	function cetak_pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data_tahun_akademik'] = $this->db->query("select * from ta")->result();

		$this->load->view('pdf/tahun_akademik', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("tahun_akademik.pdf", array('Attachment' => 0));
	}
}
