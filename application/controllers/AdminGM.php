<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminGM extends CI_Controller {

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
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='3')
			{
				
				
				$this->load->view('admingm/index');
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function lihat_pegawai()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='3')
			{
				
				$data['data']=$this->pegawai_Database->get_pegawai_by_status_gm();
				$this->load->view('admingm/lihatpegawai',$data);
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function hasil_penilaian()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='3')
			{
				
				$tes['data']=$this->pegawai_Database->get_pegawai_all();
				$data_array = array();
				$array_nama_lengkap = array();
				$array_id_pegawai = array();
				foreach($tes['data']->result() as $row){
					$array = array();
					 $array_nama_lengkap[]=$row->nama_lengkap;
					 $array_id_pegawai[]=$row->id_pegawai;
					 $array[] = $row->penilaian_1;
					 $array[] = $row->penilaian_2;
					 $array[] = $row->penilaian_3;
					 $array[] = $row->penilaian_4;
					 $array[] = $row->penilaian_5;
					 $array[] = $row->penilaian_6;
					 $array[] = $row->penilaian_7;
					 $array[] = $row->penilaian_8;
					 $array[] = $row->penilaian_9;
					 $array[] = $row->penilaian_10;
					 $array[] = $row->penilaian_11;
					 $array[] = $row->penilaian_12;
					
					 $data_array[]=$array;
				}

				$max_data = sizeof($data_array);
				$max_kriteria = sizeof($data_array[0]);
				$sum_penilaian_1=0;
				$sum_penilaian_2=0;
				$sum_penilaian_3=0;
				$sum_penilaian_4=0;
				$sum_penilaian_5=0;
				$sum_penilaian_6=0;
				$sum_penilaian_7=0;
				$sum_penilaian_8=0;
				$sum_penilaian_9=0;
				$sum_penilaian_10=0;
				$sum_penilaian_11=0;
				$sum_penilaian_12=0;

				for($i = 0; $i < $max_data;$i++)
				{
					$sum_penilaian_1=pow($data_array[$i][1], 2)+$sum_penilaian_1;
					$sum_penilaian_2=pow($data_array[$i][2], 2)+$sum_penilaian_2;
					$sum_penilaian_3=pow($data_array[$i][3], 2)+$sum_penilaian_3;
					$sum_penilaian_4=pow($data_array[$i][4], 2)+$sum_penilaian_4;
					$sum_penilaian_5=pow($data_array[$i][5], 2)+$sum_penilaian_5;
					$sum_penilaian_6=pow($data_array[$i][6], 2)+$sum_penilaian_6;
					$sum_penilaian_7=pow($data_array[$i][7], 2)+$sum_penilaian_7;
					$sum_penilaian_8=pow($data_array[$i][8], 2)+$sum_penilaian_8;
					$sum_penilaian_9=pow($data_array[$i][9], 2)+$sum_penilaian_9;
					$sum_penilaian_10=pow($data_array[$i][10], 2)+$sum_penilaian_10;
					$sum_penilaian_11=pow($data_array[$i][11], 2)+$sum_penilaian_11;
					$sum_penilaian_12=pow($data_array[$i][11], 2)+$sum_penilaian_12;
				}

				$sum_penilaian_1=sqrt($sum_penilaian_1);
				$sum_penilaian_2=sqrt($sum_penilaian_2);
				$sum_penilaian_3=sqrt($sum_penilaian_3);
				$sum_penilaian_4=sqrt($sum_penilaian_4);
				$sum_penilaian_5=sqrt($sum_penilaian_5);
				$sum_penilaian_6=sqrt($sum_penilaian_6);
				$sum_penilaian_7=sqrt($sum_penilaian_7);
				$sum_penilaian_8=sqrt($sum_penilaian_8);
				$sum_penilaian_9=sqrt($sum_penilaian_9);
				$sum_penilaian_10=sqrt($sum_penilaian_10);
				$sum_penilaian_11=sqrt($sum_penilaian_11);
				$sum_penilaian_12=sqrt($sum_penilaian_12);
				$sum_penilaian = array();
				 $sum_penilaian[]=$sum_penilaian_1;
				  $sum_penilaian[]=$sum_penilaian_2;
				   $sum_penilaian[]=$sum_penilaian_3;
				    $sum_penilaian[]=$sum_penilaian_4;
				     $sum_penilaian[]=$sum_penilaian_5;
				      $sum_penilaian[]=$sum_penilaian_6;
				       $sum_penilaian[]=$sum_penilaian_7;
				        $sum_penilaian[]=$sum_penilaian_8;
				         $sum_penilaian[]=$sum_penilaian_9;
				          $sum_penilaian[]=$sum_penilaian_10;
				           $sum_penilaian[]=$sum_penilaian_11;
				            $sum_penilaian[]=$sum_penilaian_12;
				          
				           
				$matriks_ternomalisasi = array();
				for($i = 0; $i < $max_data;$i++)
				{
					$array = array();
					for($j = 0; $j < $max_kriteria;$j++)
					{	
						
						$array[]=$data_array[$i][$j]/$sum_penilaian[$j];
					}
					$matriks_ternomalisasi[]=$array;
				}


				$bobot = array();
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;
				$bobot[]=1;

				$matriks_ternomalisasi_berbobot = array();

				for($i = 0; $i < $max_data;$i++)
				{
					$array = array();
					for($j = 0; $j < $max_kriteria;$j++)
					{
					
						$array[]=$matriks_ternomalisasi[$i][$j]*$bobot[$j];
					}
					$matriks_ternomalisasi_berbobot[]=$array;
				}
				
				$matriks_yi= array();
				for($i = 0; $i < $max_kriteria;$i++)
				{
					$array = array();
					for($j = 0; $j < $max_data;$j++)
					{
						$array[]=$matriks_ternomalisasi_berbobot[$j][$i];
					}
					$matriks_yi[]=$array;
				}

				$matriks_solusi_ideal_positif= array();
				for($i = 0; $i < $max_kriteria;$i++)
				{
					$matriks_solusi_ideal_positif[]=max($matriks_yi[$i]);
				}
				$matriks_solusi_ideal_negatif= array();
				for($i = 0; $i < $max_kriteria;$i++)
				{
					$matriks_solusi_ideal_negatif[]=min($matriks_yi[$i]);
				}

				$jarak_solusi_ideal_positif = array();
				for($i = 0; $i < $max_data;$i++)
				{
					$sum_solusi_ideal_ternomalisasi=0;
					for($j = 0; $j < $max_kriteria;$j++)
					{
						$sum_solusi_ideal_ternomalisasi=$sum_solusi_ideal_ternomalisasi+pow(($matriks_solusi_ideal_positif[$j]-$matriks_ternomalisasi_berbobot[$i][$j]),2);
					}
					$jarak_solusi_ideal_positif[]=sqrt($sum_solusi_ideal_ternomalisasi);
				}

				$jarak_solusi_ideal_negatif = array();
				for($i = 0; $i < $max_data;$i++)
				{
					$sum_solusi_ideal_ternomalisasi=0;
					for($j = 0; $j < $max_kriteria;$j++)
					{
						$sum_solusi_ideal_ternomalisasi=$sum_solusi_ideal_ternomalisasi+pow(($matriks_solusi_ideal_negatif[$j]-$matriks_ternomalisasi_berbobot[$i][$j]),2);
					}
					$jarak_solusi_ideal_negatif[]=sqrt($sum_solusi_ideal_ternomalisasi);
				}

				
				$nilai_preferensi= array();
				for($i = 0; $i < $max_data;$i++)
				{
					if ($jarak_solusi_ideal_negatif[$i]+$jarak_solusi_ideal_positif[$i]==0){
						$nilai_preferensi[]=0;
					}else{
						$nilai_preferensi[]=$jarak_solusi_ideal_negatif[$i]/($jarak_solusi_ideal_negatif[$i]+$jarak_solusi_ideal_positif[$i]);

					}
				}


				$data_keseluruhan = array();
				for($i = 0; $i < $max_data;$i++)
				{
					$data= array();
					$data[]=$array_id_pegawai[$i];
					$data[]=$array_nama_lengkap[$i];
					$data[]=$nilai_preferensi[$i];
					if($nilai_preferensi[$i]>0.6){
						$data[]="Direkomendasikan Untuk Perpanjang Kontrak";
					}else{
						$data[]="Tidak Direkomendasikan Untuk Perpanjang Kontrak";
					}
					$data_keseluruhan []=$data;
				}
				$data['data']=$data_keseluruhan ;
			
				$this->load->view('admingm/hasilpenilaian',$data);
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function perpanjang_kontrak_update()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='3')
			{
				
				$id=$this->input->post('id');
				$status_perpanjang_kontrak=$this->input->post('status_perpanjang_kontrak');
				$this->pegawai_Database->update_status_perpanjang_kontrak($id,$status_perpanjang_kontrak);
				redirect('AdminGM/hasil_penilaian', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function beripenilaian()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='3')
			{
				$id=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
				$data['data']=$this->pegawai_Database->get_pegawai_by_id($id);
				$this->load->view('admingm/penilaiankaryawan',$data);
				
			} else
			{
				redirect('Home', 'refresh');
			}
	}

	public function beripenilaian_toDatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==='3')
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
				$status_penilaian_gm="1";
				$this->pegawai_Database->update_status_penilaian_gm($id_pegawai,$status_penilaian_gm);
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
				redirect('AdminGM/lihat_pegawai', 'refresh');
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
