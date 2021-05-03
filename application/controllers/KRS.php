<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KRS extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('data_mahasiswa');
		$this->load->model('data_dosen');
		$this->load->model('data_matakuliah');
		$this->load->model('data_tahun_akademik');
		$this->load->model('data_krs');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$data['data_mahasiswa'] = $this->data_mahasiswa->get_data()->result();
		$data['data_dosen'] = $this->data_dosen->get_data()->result();
		$data['data_matakuliah'] = $this->data_matakuliah->get_data()->result();
		$data['data_tahun_akademik'] = $this->data_tahun_akademik->get_data()->result();
		$data['data_krs'] = $this->data_krs->get_data()->result();
		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('krs', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}

	public function add()
	{
		$info['datatype'] = 'krs';
		$info['operation'] = 'Input';
		
		$ta = $this->input->post('ta');
		$nim = $this->input->post('nim');
		$mk = $this->input->post('mk');
		$nidn = $this->input->post('nidn');

		$this->load->view('header');

		$where = array(
			'ta' => $ta,
			'nim' => $nim,
			'mk' => $mk
		);
		$records = $this->data_krs->get_records($where)->result();

		if (count($records) == 0) {
			$data = array(
				'ta' => $ta,
				'nim' => $nim,
				'mk' => $mk,
				'nidn' => $nidn
			);
			$action = $this->data_krs->insert_data($data,'krs');
			$this->load->view('notifications/insert_success', $info);	
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}
		$this->load->view('source');	
	}

	public function edit()
	{
		$info['datatype'] = 'krs';
		$info['operation'] = 'Ubah';
		
		$ta = $this->input->post('ta');
		$nim = $this->input->post('nim');
		$mk = $this->input->post('mk');
		$nidn = $this->input->post('nidn');

		$this->load->view('header');

		$where = array(
			'ta' => $ta,
			'nim' => $nim,
			'mk' => $mk
		);
		$data = array(
			'ta' => $ta,
			'nim' => $nim,
			'mk' => $mk,
			'nidn' => $nidn
		);
		$action = $this->data_krs->update_data($where, $data,'krs');

		if ($action) {
			$this->load->view('notifications/insert_success', $info);
		} else {
			$this->load->view('notifications/insert_failed', $info);
		}

			
		$this->load->view('source');	
	}

	public function delete()
	{
		$info['datatype'] = 'krs';

		$ta = $this->uri->segment('3');
		$nim = $this->uri->segment('4');
		$mk = $this->uri->segment('5');

		$where = array(
			'ta' => $ta,
			'nim' => $nim,
			'mk' => $mk
		);

		$this->load->view('header');

		$action = $this->data_krs->delete_data($where, 'krs');
		if ($action) {
			$this->load->view('notifications/delete_success', $info);
		} else {
			$this->load->view('notifications/delete_failed', $info);
		}

		$this->load->view('source');
	}

	function print(){
		
		$nim = $this->input->post('nim');
		$ta = $this->input->post('ta');

		$data['data_krs'] = $this->db->query("select * from krs, mahasiswa, matakuliah, dosen, ta where mahasiswa.nim = krs.nim and matakuliah.kode_mk = krs.mk and dosen.nidn = krs.nidn and ta.ta = krs.ta and krs.nim = '$nim' and krs.ta = '$ta'")->result();
		
		$this->load->view('print/krs', $data);
	}

	function cetak_pdf(){
		$this->load->library('dompdf_gen');
		
		$nim = $this->input->post('nim');
		$ta = $this->input->post('ta');

		$data['data_krs'] = $this->db->query("select * from krs, mahasiswa, matakuliah, dosen, ta where mahasiswa.nim = krs.nim and matakuliah.kode_mk = krs.mk and dosen.nidn = krs.nidn and ta.ta = krs.ta and krs.nim = '$nim' and krs.ta = '$ta'")->result();
		
		$this->load->view('pdf/krs', $data);
		
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("krs.pdf", array('Attachment'=>0));
	}
}
