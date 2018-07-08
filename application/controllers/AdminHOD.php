<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHOD extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {	 
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('download');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
		// Load database
		$this->load->model('penilaian_Database');
		// Load database
		$this->load->model('pegawai_Database');

	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='1')
			{
				
				
				$this->load->view('adminhod/index');
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function formulirwawancara()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='1')
			{
				
				
				$this->load->view('adminhod/formulirwawancara');
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}
	public function formulirwawancara_toDatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='1')
			{
				$nama_lengkap=$this->input->post('nama_lengkap');
				$tanggal_lahir=$this->input->post('tanggal_lahir');
				$pendidikan=$this->input->post('pendidikan');
				$department=$this->input->post('departement');
				$posisi=$this->input->post('posisi');
				$akhir_kontrak=$this->input->post('akhir_kontrak');
				$penilaian_1=$this->input->post('penilaian_1');
				$penilaian_2=$this->input->post('penilaian_2');
				$penilaian_3=$this->input->post('penilaian_3');
				$penilaian_4=$this->input->post('penilaian_4');
				$penilaian_5=$this->input->post('penilaian_5');
				$penilaian_6=$this->input->post('penilaian_6');
				$penilaian_7=$this->input->post('penilaian_7');
				$penilaian_8=$this->input->post('penilaian_8');
				$penilaian_9=$this->input->post('penilaian_9');
				$penilaian_10=$this->input->post('penilaian_10');
				$penilaian_11=$this->input->post('penilaian_11');
				$penilaian_12=$this->input->post('penilaian_12');
				$pemberi_nilai=$this->input->post('pemberi_nilai');
				$status_penilaian_hod="1";
				$id_pegawai=$this->pegawai_Database->simpan_laporan(
		$nama_lengkap,
		$tanggal_lahir, 
		$pendidikan,
		$department,
		$posisi,
		$akhir_kontrak,
		$status_penilaian_hod
		);
				$this->penilaian_Database->simpan_laporan($id_pegawai,$penilaian_1, $penilaian_2,
		$penilaian_3,
		$penilaian_4,
		$penilaian_5,
		$penilaian_6,
		$penilaian_7,
		$penilaian_8,
		$penilaian_9,
		$penilaian_10,
		$penilaian_11,
		$penilaian_12,
		$pemberi_nilai
		);
					$data= array(
						'error_message' => "Berhasil Kiriman",
						);
				$this->load->view('adminhod/formulirwawancara',$data);
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	

	
	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('Home', 'refresh');
	}


}
