<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('data_dosen');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$data['data_dosen'] = $this->data_dosen->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation');
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
			$action = $this->data_dosen->insert_data($data,'dosen');
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
		$action = $this->data_dosen->update_data($nidn, $data,'dosen');

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

	function print(){
		
		$data['data_dosen'] = $this->db->query("select * from dosen")->result();
		
		$this->load->view('print/dosen', $data);
	}

	function cetak_pdf(){
		$this->load->library('dompdf_gen');
		
		$data['data_dosen'] = $this->db->query("select * from dosen")->result();
		
		$this->load->view('pdf/dosen', $data);
		
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("dosen.pdf", array('Attachment'=>0));
	}
}
