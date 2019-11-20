<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makademik extends CI_Model {

	var $table = 'koleksibuku';
	var $table2 = 'jurnal';
	var $table3 = 'pendaftar';
	var $table4 = 'pengunjung';
	var $table5 = 'peminjam';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function tambahBuku($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function get_by_id($id){
		$this->db->from($this->table);
		$this->db->where('idKoleksi',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahBuku($where, $data){
	    $this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatBuku(){
		$this->db->select('*');
		return $this->db->get('koleksibuku')->result();
	}
	public function hapusBuku($id){
		$this->db->where('idKoleksi', $id);
		$this->db->delete($this->table);
	}
	public function tambahBantu($table,$data){
		$this->db->insert($table, $data);
		return true;
	}
	public function ubahBantu($table,$data, $where){
		$this->db->update($table, $data, $where);
		return true;
	}



	//pengunjung
	public function tambahPengunjung($data){
		$this->db->insert($this->table4, $data);
		return $this->db->insert_id();
	}
	public function get_by_id4($id){
		$this->db->from($this->table4);
		$this->db->where('idPengunjung',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahPengunjung($where, $data){
	    $this->db->update($this->table4, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatPengunjung(){
		$this->db->select('pengunjung.idPengunjung,prodi.idProdi,prodi.namaProdi,
					pengunjung.namaPengunjung,pengunjung.tanggal')
				 ->join('prodi','prodi.idProdi=pengunjung.idProdi');
		return $this->db->get('pengunjung')->result();
	}
	public function hapusPengunjung($id){
		$this->db->where('idPengunjung', $id);
		$this->db->delete($this->table4);
	}




	//peminjam
	public function tambahPeminjam($data){
		$this->db->insert($this->table5, $data);
		return $this->db->insert_id();
	}
	public function get_by_id5($id){
		$this->db->from($this->table5);
		$this->db->where('idPeminjam',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahPeminjam($where, $data){
	    $this->db->update($this->table5, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatPeminjam(){
		$this->db->select('peminjam.idPeminjam,prodi.idProdi,prodi.namaProdi,
					peminjam.namaPeminjam,peminjam.tanggal,koleksibuku.namaBuku,koleksibuku.idKoleksi')
				 ->join('koleksibuku','koleksibuku.idKoleksi=peminjam.idKoleksi')
				 ->join('prodi','prodi.idProdi=peminjam.idProdi');
		return $this->db->get('peminjam')->result();
	}
	public function hapusPeminjam($id){
		$this->db->where('idPeminjam', $id);
		$this->db->delete($this->table5);
	}



	//Jurnal
	public function tambahJurnal($data){
		$this->db->insert($this->table2, $data);
		return $this->db->insert_id();
	}
	public function get_by_id2($id){
		$this->db->from($this->table2);
		$this->db->where('idJurnal',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahJurnal($where, $data){
	    $this->db->update($this->table2, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatJurnal(){
		$this->db->select('*');
		return $this->db->get('jurnal')->result();
	}
	public function hapusJurnal($id){
		$this->db->where('idJurnal', $id);
		$this->db->delete($this->table2);
	}




	//Pendaftar
	public function tambahPendaftar($data){
		$this->db->insert($this->table3, $data);
		return $this->db->insert_id();
	}
	public function get_by_id3($id){
		$this->db->from($this->table3);
		$this->db->where('idPendaftar',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function ubahPendaftar($where, $data){
	    $this->db->update($this->table3, $data, $where);
		return $this->db->affected_rows();
	}
	public function lihatPendaftar(){
		$this->db->select('pendaftar.idPendaftar,prodi.idProdi,prodi.namaProdi,
					pendaftar.namaPendaftar,pendaftar.idProdi,pendaftar.jalur,pendaftar.tahun,pendaftar.jenisKelamin')
				 ->join('prodi','prodi.idProdi=pendaftar.idProdi');
		return $this->db->get('pendaftar')->result();
	}
	public function hapusPendaftar($id){
		$this->db->where('idPendaftar', $id);
		$this->db->delete($this->table3);
	}
	/*public function tambahbantupendaftarjeniskelamin($table,$data){
		$this->db->insert($table, $data);
		return true;
	}
	public function ubahbantupendaftarjeniskelamin($table,$data, $where){
		$this->db->update($table, $data, $where);
		return true;
	}*/
}
