<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msumberdaya extends CI_Model {

	var $table = 'alokasidana';
	var $table2 = 'dosen';
	var $table3 = 'mahasiswa';
	var $table4 = 'pegawai';
	var $table5 = 'anggaranmasuk';
	var $table6 = 'anggarankeluar';
	var $table7 = 'inventaris';

	//Alokasi Dana
	public function tambahAlokasi($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('idAlokasi',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahALokasi($where, $data){
	    $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatAlokasi(){
		$this->db->select('*');
		return $this->db->get('alokasidana')->result();
	}
	public function hapusAlokasi($id){
		$this->db->where('idAlokasi', $id);
		$this->db->delete($this->table);
	}




	//Anggaran Masuk
	public function tambahAnggaranMasuk($data){
		$this->db->insert($this->table5, $data);
		return $this->db->insert_id();
	}
	public function get_by_id5($id){
		$this->db->from($this->table5);
		$this->db->where('idMasuk',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahAnggaranMasuk($where, $data){
	    $this->db->update($this->table5, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatAnggaranMasuk(){
		$this->db->select('*');
		return $this->db->get('anggaranmasuk')->result();
	}
	public function hapusAnggaranMasuk($id){
		$this->db->where('idMasuk', $id);
		$this->db->delete($this->table5);
	}




	//Anggaran Keluar
	public function tambahAnggaranKeluar($data){
		$this->db->insert($this->table6, $data);
		return $this->db->insert_id();
	}
	public function get_by_id6($id){
		$this->db->from($this->table6);
		$this->db->where('idKeluar',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahAnggaranKeluar($where, $data){
	    $this->db->update($this->table6, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatAnggaranKeluar(){
		$this->db->select('*');
		return $this->db->get('anggarankeluar')->result();
	}
	public function hapusAnggaranKeluar($id){
		$this->db->where('idKeluar', $id);
		$this->db->delete($this->table6);
	}




	//Dosen
	public function tambahDosen($data){
		$this->db->insert($this->table2, $data);
		return $this->db->insert_id();
	}
	public function get_by_id2($id){
		$this->db->from($this->table2);
		$this->db->where('idDosen',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahDosen($where, $data){
	    $this->db->update($this->table2, $data, $where);
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
	public function lihatDosen(){
		$this->db->select('dosen.idDosen,dosen.NIP,dosen.namaDosen,dosen.jenisKelamin,prodi.idProdi,prodi.namaProdi,dosen.jabatan,dosen.jenjangPendidikan,dosen.golongan')
				 ->join('prodi','prodi.idProdi=dosen.idProdi');
		return $this->db->get('dosen')->result();
	}
	public function hapusDosen($id){
		$this->db->where('idDosen', $id);
		$this->db->delete($this->table2);
	}
	public function tambahbantudosen($table,$data){
		$this->db->insert($table, $data);
		return true;
	}
	public function ubahbantudosen($table,$data, $where){
		$this->db->update($table, $data, $where);
		return true;
	}




	//Mahasiswa
	public function tambahMahasiswa($data){
		$this->db->insert($this->table3, $data);
		return $this->db->insert_id();
	}
	public function get_by_id3($id){
		$this->db->from($this->table3);
		$this->db->where('NPM',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahMahasiswa($where, $data){
	    $this->db->update($this->table3, $data, $where);
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
	public function lihatMahasiswa(){
		$this->db->select('mahasiswa.NPM,mahasiswa.namaMahasiswa,
					mahasiswa.jenisKelamin,mahasiswa.jalurMasuk,prodi.namaProdi,prodi.idProdi,mahasiswa.tahunMasuk')
				 ->join('prodi','prodi.idProdi=mahasiswa.idProdi');
		return $this->db->get('mahasiswa')->result();
	}
	public function hapusMahasiswa($id){
		$this->db->where('NPM', $id);
		$this->db->delete($this->table3);
	}
	public function tambahbantumahasiswa($table,$data){
		$this->db->insert($table, $data);
		return true;
	}
	public function ubahbantumahasiswa($table,$data, $where){
		$this->db->update($table, $data, $where);
		return true;
	}



	//Pegawai
	public function tambahPegawai($data){
		$this->db->insert($this->table4, $data);
		return $this->db->insert_id();
	}
	public function get_by_id4($id){
		$this->db->from($this->table4);
		$this->db->where('idPegawai',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahPegawai($where, $data){
	    $this->db->update($this->table4, $data, $where);
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
	public function lihatPegawai(){
		$this->db->select('*');
		return $this->db->get('pegawai')->result();
	}
	public function hapusPegawai($id){
		$this->db->where('idPegawai', $id);
		$this->db->delete($this->table4);
	}

	//inventaris

	public function tambahInventaris($data){
		$this->db->insert($this->table7, $data);
		return $this->db->insert_id();
	}
	public function get_by_id7($id){
		$this->db->from($this->table7);
		$this->db->where('idInventaris',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahInventaris($where, $data){
	    $this->db->update($this->table7, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatInventaris(){
		$this->db->select('idInventaris, namaBarang, asalBarang, jumlah, lokasi, kondisi');
				 
		return $this->db->get('inventaris')->result();
	}
	public function hapusInventaris($id){
		$this->db->where('idInventaris', $id);
		$this->db->delete($this->table7);
	}
}
