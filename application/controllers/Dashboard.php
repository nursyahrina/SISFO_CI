<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('data_mahasiswa');
		$this->load->model('data_dosen');
		$this->load->model('data_matakuliah');
		$this->load->model('data_krs');
		$this->load->model('data_tahun_akademik');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		$data = array(
					'n_mahasiswa' => $this->data_mahasiswa->count_rows(),
					'n_dosen' => $this->data_dosen->count_rows(),
					'n_matakuliah' => $this->data_matakuliah->count_rows(),
					'n_krs' => $this->data_krs->count_rows(),
					'n_ta' => $this->data_tahun_akademik->count_rows()
				);

		$this->load->view('header');
		$this->load->view('navigation');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}
}
