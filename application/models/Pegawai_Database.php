<?php
Class Pegawai_Database extends CI_Model{

	public function get_all_pegawai()
	{
		
		$hasil = $this->db->get('pegawai');
		return $hasil;
	}

	public function simpan_laporan(
		$nama_lengkap,
		$tanggal_lahir, 
		$pendidikan,
		$department,
		$posisi,
		$akhir_kontrak,
		$status_penilaian_hod
		)
	{
		$data = array(
			'nama_lengkap'=>$nama_lengkap,
			'tanggal_lahir'=> $tanggal_lahir,
			'pendidikan'=> $pendidikan,
			'department'=> $department,
			'posisi'=> $posisi,
			'akhir_kontrak'=> $akhir_kontrak,
			'status_penilaian_hod'=> $status_penilaian_hod); 
		$this->db->insert('pegawai',$data);
		return $this->db->insert_id();
	}

	public function get_pegawai_all()
	{
		
		$this->db->select(' pegawai.id as id_pegawai,nama_lengkap, sum(penilaian_1)/3 as penilaian_1,sum(penilaian_2)/3 as penilaian_2,sum(penilaian_3)/3 as penilaian_3,sum(penilaian_4)/3 as penilaian_4,sum(penilaian_5)/3 as penilaian_5,sum(penilaian_6)/3 as penilaian_6,sum(penilaian_7)/3 as penilaian_7,sum(penilaian_8)/3 as penilaian_8,sum(penilaian_9)/3 as penilaian_9,sum(penilaian_10)/3 as penilaian_10,sum(penilaian_11)/3 as penilaian_11,sum(penilaian_12)/3 as penilaian_12, (sum(penilaian_1)/3 +sum(penilaian_2)/3 +sum(penilaian_3)/3 + sum(penilaian_4)/3 + sum(penilaian_5)/3 + sum(penilaian_6)/3 + sum(penilaian_7)/3 + sum(penilaian_8)/3+sum(penilaian_9)/3 +sum(penilaian_10)/3 +sum(penilaian_11)/3 +sum(penilaian_12)/3) /12  as skor_total ');
		$this->db->from('penilaian');
		$this->db->join('pegawai', 'penilaian.id_pegawai=pegawai.id');
		$this->db->where('pegawai.status_perpanjang_kontrak', '0');
		$this->db->group_by('id_pegawai');
		$hasil = $this->db->get();
		return $hasil;
	}

	public function update_status_perpanjang_kontrak($id,$status_perpanjang_kontrak){
		$this->db->set('status_perpanjang_kontrak', $status_perpanjang_kontrak);
		$this->db->where('id', $id);
		$this->db->update('pegawai');
	}

	public function update_status_penilaian_hrd($id,$status_penilaian_hrd){
		$this->db->set('status_penilaian_hrd', $status_penilaian_hrd);
		$this->db->where('id', $id);
		$this->db->update('pegawai');
	}

	public function update_status_penilaian_gm($id,$status_penilaian_gm){
		$this->db->set('status_penilaian_gm', $status_penilaian_gm);
		$this->db->where('id', $id);
		$this->db->update('pegawai');
	}

	public function get_pegawai_by_status_penilaian_hod()
	{
		
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('status_penilaian_hrd', '0');
		$hasil = $this->db->get();
		return $hasil;
	}

	public function get_pegawai_by_status_gm()
	{
		
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('status_penilaian_gm', '0');
		$hasil = $this->db->get();
		return $hasil;
	}

	public function get_pegawai_by_id($id)
	{
		
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('id', $id);
		$hasil = $this->db->get()->row();
		return $hasil;
	}
}
?>