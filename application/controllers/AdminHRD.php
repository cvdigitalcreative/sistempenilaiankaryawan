<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHRD extends CI_Controller {

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
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='2')
			{
				
				
				$this->load->view('adminhrd/index');
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function pegawai_perpanjang_kontrak()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='2')
			{
				
				$data['data']=$this->pegawai_Database->get_all_pegawai();
				$this->load->view('adminhrd/hasil_penilaian',$data);
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function lihat_pegawai()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='2')
			{
				
				$data['data']=$this->pegawai_Database->get_pegawai_by_status_penilaian_hod();
				$this->load->view('adminhrd/lihatpegawai',$data);
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}
	public function beripenilaian()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='2')
			{
				$id=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
				$data['data']=$this->pegawai_Database->get_pegawai_by_id($id);
				$this->load->view('adminhrd/penilaiankaryawan',$data);
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function beripenilaian_toDatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='2')
			{
				$id_pegawai=$this->input->post('id');
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
				$status_penilaian_hrd="1";
				$this->pegawai_Database->update_status_penilaian_hrd($id_pegawai,$status_penilaian_hrd);
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
				redirect('AdminHRD/lihat_pegawai', 'refresh');
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
