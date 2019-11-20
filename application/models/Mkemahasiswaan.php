<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkemahasiswaan extends CI_Model {
	
	var $table = 'kegiatanmhs';
	var $table2 = 'prestasi';
	var $table3 = 'beasiswa';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function tambahKegiatan($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('idKegiatan',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahKegiatan($where, $data){
	    $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	/*public function lihatKegiatan(){
		$this->db->from('kegiatanmhs');
		$query=$this->db->get();
		return $query->result();
	}*/
	/*public function lihatKegiatan(){
		$query = $this->db->query("SELECT 'kegiatanmhs.idKegiatan' as 'idKegiatan', 'ormawa.namaOrmawa' as 'namaOrmawa', 'kegiatanmhs.tingkat' as 'tingkat', 'kegiatanmhs.kegiatan' as 'kegiatan', 'kegiatanmhs.tempat' as 'tempat', 'kegiatanmhs.waktu' as 'waktu', 'kegiatanmhs.tahun' as 'tahun', 'kegiatanmhs.dana' as 'dana'
			FROM kegiatanmhs INNER JOIN ormawa
			ON 'kegiatanmhs.namaOrmawa'='ormawa.idOrmawa'")->result();
		return $query;
	}*/
	public function lihatKegiatan(){
		$this->db->select('kegiatanmhs.idKegiatan,ormawa.namaOrmawa,
					kegiatanmhs.tingkat,kegiatanmhs.kegiatan,kegiatanmhs.tempat,kegiatanmhs.waktu,kegiatanmhs.dana,ormawa.idOrmawa,kegiatanmhs.namaOrmawa as nama')
				 ->join('ormawa','ormawa.idOrmawa=kegiatanmhs.namaOrmawa');
		return $this->db->get('kegiatanmhs')->result();
	}
	public function hapusKegiatan($id){
		$this->db->where('idKegiatan', $id);
		$this->db->delete($this->table);
	}
	


	// Prestasi
	public function tambahPrestasi($data){
		$this->db->insert($this->table2, $data);
		return $this->db->insert_id();
	}
	public function get_by_id2($id){
		$this->db->from($this->table2);
		$this->db->where('idPrestasi',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahPrestasi($where, $data){
	    $this->db->update($this->table2, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatPrestasi(){
		$this->db->select('prestasi.idPrestasi,mahasiswa.namaMahasiswa,
					prodi.namaProdi,prestasi.prestasi,prestasi.tingkat,mahasiswa.npm,prestasi.tahun,mahasiswa.namaMahasiswa as namaMhs,prodi.idProdi')
				 ->join('mahasiswa','mahasiswa.NPM=prestasi.NPM')
				 ->join('prodi', 'prodi.idProdi=prestasi.idProdi');
		return $this->db->get('prestasi')->result();
	}
	public function hapusPrestasi($id){
		$this->db->where('idPrestasi', $id);
		$this->db->delete($this->table2);
	}

	//Beasiswa
	public function tambahBeasiswa($data){
		$this->db->insert($this->table3, $data);
		return $this->db->insert_id();
	}
	public function get_by_id3($id){
		$this->db->from($this->table3);
		$this->db->where('idBeasiswa',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahBeasiswa($where, $data){
	    $this->db->update($this->table3, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatBeasiswa(){
		$this->db->select('beasiswa.idBeasiswa,mahasiswa.namaMahasiswa,
					prodi.namaProdi,beasiswa.jenisBeasiswa,beasiswa.tahun,mahasiswa.npm,prodi.idProdi,beasiswa.jenisKelamin')
				 ->join('mahasiswa','mahasiswa.NPM=beasiswa.NPM')
				 ->join('prodi', 'prodi.idProdi=beasiswa.idProdi');
		return $this->db->get('beasiswa')->result();
	}
	public function hapusBeasiswa($id){
		$this->db->where('idBeasiswa', $id);
		$this->db->delete($this->table3);
	}
}
