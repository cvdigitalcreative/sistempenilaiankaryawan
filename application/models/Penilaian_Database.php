<?php
Class Penilaian_Database extends CI_Model{

	public function get_all_penilaian()
	{
		
		$hasil = $this->db->get('penilaian');
		return $hasil;
	}
	public function simpan_laporan($id_pegawai,$penilaian_1, $penilaian_2,
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
		)
	{
		$data = array(
			'id_pegawai'=>$id_pegawai,
			'penilaian_1'=> $penilaian_1,
			'penilaian_2'=> $penilaian_2,
			'penilaian_3'=> $penilaian_3,
			'penilaian_4'=> $penilaian_4,
			'penilaian_5'=> $penilaian_5,
			'penilaian_6'=> $penilaian_6,
			'penilaian_7'=> $penilaian_7,
			'penilaian_8'=> $penilaian_8,
			'penilaian_9'=> $penilaian_9,
			'penilaian_10'=> $penilaian_10,
			'penilaian_11'=> $penilaian_11,
			'penilaian_12'=> $penilaian_12,
			'pemberi_nilai'=> $pemberi_nilai); 
		$this->db->insert('penilaian',$data);
	}

	
}
?>