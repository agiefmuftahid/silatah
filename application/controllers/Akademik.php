<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper('url');
	 	$this->load->model('Makademik');
	 	$this->load->library('dompdf_gen');
    }
	public function index()
	{
		$session = $this->session->userdata('login');
		if($session == 'Akademik'){
			redirect('Akademik/lihatBuku');
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Kemahasiswaan') {
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		else{
			redirect('Login/index');
		}
	}

	//Perpustakaan
	public function tambahBuku(){
			$data = array(
					'namaBuku'		=> $this->input->post('namaBuku'),
					'penerbit'		=> $this->input->post('penerbit'),
					'pengarang'		=> $this->input->post('pengarang'),
			        'jenisBuku'	=> $this->input->post('jenisBuku'),
			        'bahasaBuku'	=> $this->input->post('bahasaBuku')
				);
			$insert = $this->Makademik->tambahBuku($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
			$data = $this->Makademik->get_by_id($id);

			echo json_encode($data);
	}
	public function ubahBuku(){
		$data = array(
				'namaBuku'		=> $this->input->post('namaBuku'),
				'penerbit'		=> $this->input->post('penerbit'),
				'pengarang'		=> $this->input->post('pengarang'),
			    'jenisBuku'	=> $this->input->post('jenisBuku'),
			    'bahasaBuku'	=> $this->input->post('bahasaBuku')
			);
		$this->Makademik->ubahBuku(array('idKoleksi' => $this->input->post('idKoleksi')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatBuku(){
		$data['data']=$this->Makademik->lihatBuku();
		$data['data2']=$this->Molahdata->lihatBantu();
		$data['data3']=$this->Molahdata->perpustakaan();
		$data['data4']=$this->Makademik->lihatPengunjung();
		$data['data5']=$this->Makademik->lihatPeminjam();
		$data['data6']=$this->Molahdata->prodi();
		$data['data7']=$this->Molahdata->koleksi();
		$data['data8']=$this->Molahdata->pengunjung();
		$data['data9']=$this->Molahdata->peminjam();
		$data['data10']=$this->Molahdata->pengunjungPertahun();
		$session = $this->session->userdata('login');
		if($session == 'Akademik'){
			$this->load->view('Akademik/perpustakaan',$data);
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Kemahasiswaan') {
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusBuku($id)
	{
		$this->Makademik->hapusBuku($id);
		echo json_encode(array("status" => TRUE));
	}
	public function bantuan(){
		$tahun=getdate();
		
		$apoajo=count($this->Molahdata->where($tahun['year']));
    	$data['tij']=count($this->Molahdata->buku1());
		$data['taj']=count($this->Molahdata->buku2());
		$data['rij']=count($this->Molahdata->buku3());
		$data['raj']=count($this->Molahdata->buku4());
		if($apoajo>0){
			$this->Makademik->ubahBantu('bantubuku',$data,array('tahun'=>$tahun['year']));
		}
		else{
		$this->Makademik->tambahBantu('bantubuku',$data);
		}
    	redirect('Akademik/lihatBuku');
    }
    public function tambahPengunjung(){
			$data = array(
					'namaPengunjung'		=> $this->input->post('namaPengunjung'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'tanggal'	=> $this->input->post('tanggal')
				);
			$insert = $this->Makademik->tambahPengunjung($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit4($id)
	{
			$data = $this->Makademik->get_by_id4($id);

			echo json_encode($data);
	}
	public function ubahPengunjung(){
		$data = array(
				'namaPengunjung'		=> $this->input->post('namaPengunjung'),
			    'idProdi'	=> $this->input->post('idProdi'),
			    'tanggal'	=> $this->input->post('tanggal')
			);
		$this->Makademik->ubahPengunjung(array('idPengunjung' => $this->input->post('idPengunjung')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function hapusPengunjung($id)
	{
		$this->Makademik->hapusPengunjung($id);
		echo json_encode(array("status" => TRUE));
	}
	public function tambahPeminjam(){
			$data = array(
					'namaPeminjam'		=> $this->input->post('namaPeminjam'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'idKoleksi'	=> $this->input->post('idKoleksi'),
			        'tanggal'	=> $this->input->post('tanggal')
				);
			$insert = $this->Makademik->tambahPeminjam($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit5($id)
	{
			$data = $this->Makademik->get_by_id5($id);

			echo json_encode($data);
	}
	public function ubahPeminjam(){
		$data = array(
				'namaPeminjam'		=> $this->input->post('namaPeminjam'),
			    'idProdi'	=> $this->input->post('idProdi'),
			    'idKoleksi'	=> $this->input->post('idKoleksi'),
			    'tanggal'	=> $this->input->post('tanggal')
			);
		$this->Makademik->ubahPeminjam(array('idPeminjam' => $this->input->post('idPeminjam')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function hapusPeminjam($id)
	{
		$this->Makademik->hapusPeminjam($id);
		echo json_encode(array("status" => TRUE));
	}
	public function printPerpustakaan(){
		$data['data']=$this->Makademik->lihatBuku();
		$data['data2']=$this->Molahdata->lihatBantu();
		$data['data3']=$this->Molahdata->perpustakaan();
		$data['data4']=$this->Makademik->lihatPengunjung();
		$data['data5']=$this->Makademik->lihatPeminjam();
		$data['data6']=$this->Molahdata->prodi();
		$data['data7']=$this->Molahdata->koleksi();
		$data['data8']=$this->Molahdata->pengunjung();
		$data['data9']=$this->Molahdata->peminjam();
		$data['data10']=$this->Molahdata->pengunjungPertahun();
		$this->load->view('Akademik/printperpustakaan',$data);
	}






    //Jurnal
	public function tambahJurnal(){
			$data = array(
					'namaPenulis'		=> $this->input->post('namaPenulis'),
			        'bidangIlmu'	=> $this->input->post('bidangIlmu'),
			        'judul'	=> $this->input->post('judul'),
			        'namaJurnal'	=> $this->input->post('namaJurnal'),
			        'volume'	=> $this->input->post('volume')
				);
			$insert = $this->Makademik->tambahJurnal($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit2($id)
	{
			$data = $this->Makademik->get_by_id2($id);

			echo json_encode($data);
	}
	public function ubahJurnal(){
		$data = array(
					'namaPenulis'		=> $this->input->post('namaPenulis'),
			        'bidangIlmu'	=> $this->input->post('bidangIlmu'),
			        'judul'	=> $this->input->post('judul'),
			        'namaJurnal'	=> $this->input->post('namaJurnal'),
			        'volume'	=> $this->input->post('volume')
				);
		$this->Makademik->ubahJurnal(array('idJurnal' => $this->input->post('idJurnal')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatJurnal(){
		$data['data']=$this->Makademik->lihatJurnal();
		$data['data2']=$this->Molahdata->perBidangIlmu();
		$data['data3']=$this->Molahdata->jurnalperbidangilmu();
		$session = $this->session->userdata('login');
		if($session == 'Akademik'){
			$this->load->view('Akademik/jurnal',$data);
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Kemahasiswaan') {
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusJurnal($id)
	{
		$this->Makademik->hapusjurnal($id);
		echo json_encode(array("status" => TRUE));
	}
	public function printjurnal(){
    	$data['data']=$this->Makademik->lihatJurnal();
		$data['data2']=$this->Molahdata->perBidangIlmu();
    	$this->load->view('Akademik/printjurnal',$data);
    }






     //Jurnal
	public function tambahPendaftar(){
			$data = array(
					'namaPendaftar'		=> $this->input->post('namaPendaftar'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'jalur'	=> $this->input->post('jalur'),
			        'tahun'	=> $this->input->post('tahun'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin')
				);
			$insert = $this->Makademik->tambahPendaftar($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit3($id)
	{
			$data = $this->Makademik->get_by_id3($id);

			echo json_encode($data);
	}
	public function ubahPendaftar(){
		$data = array(
					'namaPendaftar'		=> $this->input->post('namaPendaftar'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'jalur'	=> $this->input->post('jalur'),
			        'tahun'	=> $this->input->post('tahun'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin')
				);
		$this->Makademik->ubahPendaftar(array('idPendaftar' => $this->input->post('idPendaftar')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatPendaftar(){
		$data['data']=$this->Makademik->lihatPendaftar();
		$data['data2']=$this->Molahdata->prodi();
		/*$data['data3']=$this->Molahdata->lihatBantuPendaftarJenisKelamin();*/
		$data['data4']=$this->Molahdata->pendaftarpertahun();
		$data['data5']=$this->Molahdata->pivotPendaftar();
		$data['data6']=$this->Molahdata->pivotPendaftar2();
		$data['data7']=$this->Molahdata->pendaftarTahun();
		$session = $this->session->userdata('login');
		if($session == 'Akademik'){
			$this->load->view('Akademik/pendaftar',$data);
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Kemahasiswaan') {
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusPendaftar($id)
	{
		$this->Makademik->hapusPendaftar($id);
		echo json_encode(array("status" => TRUE));
	}
	/*public function bantuan2(){
		$tahun=getdate();
		$data['tahun'] = $tahun['year'];
		$apoajo=count($this->Molahdata->where2($tahun['year']));
    	$data['til']=count($this->Molahdata->pendaftar1());
		$data['tip']=count($this->Molahdata->pendaftar2());
		$data['tsl']=count($this->Molahdata->pendaftar3());
		$data['tsp']=count($this->Molahdata->pendaftar4());
		$data['tml']=count($this->Molahdata->pendaftar5());
		$data['tmp']=count($this->Molahdata->pendaftar6());
		$data['tel']=count($this->Molahdata->pendaftar7());
		$data['tep']=count($this->Molahdata->pendaftar8());
		$data['arl']=count($this->Molahdata->pendaftar9());
		$data['arp']=count($this->Molahdata->pendaftar10());
		$data['sil']=count($this->Molahdata->pendaftar11());
		$data['sip']=count($this->Molahdata->pendaftar12());
		if($apoajo>0){
			$this->Makademik->ubahbantupendaftarjeniskelamin('bantupendaftarjeniskelamin',$data,$tahun['year']);
		}
		else{
		$this->Makademik->tambahbantupendaftarjeniskelamin('bantupendaftarjeniskelamin',$data);}
    	redirect('Akademik/lihatPendaftar');
    }*/
	public function printPendaftar(){
		$data['data']=$this->Makademik->lihatPendaftar();
		$data['data2']=$this->Molahdata->prodi();
		//$data['data3']=$this->Molahdata->lihatBantuPendaftarJenisKelamin();
		$data['data4']=$this->Molahdata->pendaftarpertahun();
		$data['data5']=$this->Molahdata->pivotPendaftar();
		$data['data6']=$this->Molahdata->pivotPendaftar2();
		$data['data7']=$this->Molahdata->pendaftarTahun();
		$this->load->view('Akademik/printpendaftar',$data);
	}
}
