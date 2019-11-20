<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumberdaya extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper('url');
	 	$this->load->model('Msumberdaya');
	 	$this->load->library('dompdf_gen');
    }
	public function index()
	{
		$session = $this->session->userdata('login');
		if($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Kemahasiswaan'){
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}

	//Alokasi Dana
	public function tambahAlokasi(){
	    $data = array(
	        'alokasi'		=> $this->input->post('alokasi'),
	        'tahun'	=> $this->input->post('tahun'),
	        'jumlahdana'	=> $this->input->post('jumlahdana')
	    );
	    $insert = $this->Msumberdaya->tambahAlokasi($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
			$data = $this->Msumberdaya->get_by_id($id);

			echo json_encode($data);
	}
	public function ubahAlokasi(){
		$data = array(
			'alokasi'		=> $this->input->post('alokasi'),
	        'tahun'	=> $this->input->post('tahun'),
	        'jumlahdana'	=> $this->input->post('jumlahdana')
			);
		$this->Msumberdaya->ubahAlokasi(array('idAlokasi' => $this->input->post('idAlokasi')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatAlokasi(){
		$data['data']=$this->Msumberdaya->lihatAlokasi();
		$data['data2']=$this->Msumberdaya->lihatAnggaranMasuk();
		$data['data3']=$this->Msumberdaya->lihatAnggaranKeluar();
		$data['data4']=$this->Molahdata->pivotAnggaran1();
		$data['data5']=$this->Molahdata->pivotAnggaran2();
		$data['data6']=$this->Molahdata->pivotAnggaran3();
		$data['data7']=$this->Molahdata->keluarpertahun();
		$data['data8']=$this->Molahdata->anggaranmasuk();
		$data['data9']=$this->Molahdata->anggarankeluar();
		$session = $this->session->userdata('login');
		if($session == 'Sumberdaya'){
			$this->load->view('Sumberdaya/anggaran',$data);
		}
		elseif($session == 'Kemahasiswaan'){
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusAlokasi($id)
	{
		$this->Msumberdaya->hapusAlokasi($id);
		echo json_encode(array("status" => TRUE));
	}
	public function printanggaran(){
    	$data['data']=$this->Msumberdaya->lihatAlokasi();
		$data['data2']=$this->Msumberdaya->lihatAnggaranMasuk();
		$data['data3']=$this->Msumberdaya->lihatAnggaranKeluar();
		$data['data4']=$this->Molahdata->pivotAnggaran1();
		$data['data5']=$this->Molahdata->pivotAnggaran2();
		$data['data6']=$this->Molahdata->pivotAnggaran3();
    	$this->load->view('SumberDaya/printanggaran',$data);
    }


	//Anggaran Masuk
    public function tambahAnggaranMasuk(){
	    $data = array(
	        'sumberDana' => $this->input->post('sumberDana'),
	        'jenisDana'		=> $this->input->post('jenisDana'),
	        'tahun'	=> $this->input->post('Tahun'),
	        'jumlahDana'	=> $this->input->post('jumlahDana')
	    );
	    $insert = $this->Msumberdaya->tambahAnggaranMasuk($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit5($id)
	{
			$data = $this->Msumberdaya->get_by_id5($id);

			echo json_encode($data);
	}
	public function ubahAnggaranMasuk(){
		$data = array(
			'sumberDana' => $this->input->post('sumberDana'),
	        'jenisDana'		=> $this->input->post('jenisDana'),
	        'tahun'	=> $this->input->post('Tahun'),
	        'jumlahDana'	=> $this->input->post('jumlahDana')
			);
		$this->Msumberdaya->ubahAnggaranMasuk(array('idMasuk' => $this->input->post('idMasuk')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function hapusAnggaranMasuk($id)
	{
		$this->Msumberdaya->hapusAnggaranMasuk($id);
		echo json_encode(array("status" => TRUE));
	}




	//Anggaran Keluar
    public function tambahAnggaranKeluar(){
	    $data = array(
	        'jenisPenggunaan'		=> $this->input->post('jenisPenggunaan'),
	        'tahun'	=> $this->input->post('thn'),
	        'jumlahDana'	=> $this->input->post('dana')
	    );
	    $insert = $this->Msumberdaya->tambahAnggaranKeluar($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit6($id)
	{
			$data = $this->Msumberdaya->get_by_id6($id);

			echo json_encode($data);
	}
	public function ubahAnggaranKeluar(){
		$data = array(
			'jenisPenggunaan'		=> $this->input->post('jenisPenggunaan'),
	        'tahun'	=> $this->input->post('thn'),
	        'jumlahDana'	=> $this->input->post('dana')
			);
		$this->Msumberdaya->ubahAnggaranKeluar(array('idKeluar' => $this->input->post('idKeluar')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function hapusAnggaranKeluar($id)
	{
		$this->Msumberdaya->hapusAnggaranKeluar($id);
		echo json_encode(array("status" => TRUE));
	}






	//Dosen
	public function tambahDosen(){
			$data = array(
					'NIP'		=> $this->input->post('NIP'),
			        'namaDosen'	=> $this->input->post('namaDosen'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'jabatan'	=> $this->input->post('jabatan'),
			        'jenjangPendidikan'	=> $this->input->post('jenjangPendidikan'),
			        'golongan'	=> $this->input->post('golongan')
				);
			$insert = $this->Msumberdaya->tambahDosen($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit2($id)
	{
			$data = $this->Msumberdaya->get_by_id2($id);

			echo json_encode($data);
	}
	public function ubahDosen(){
		$data = array(
					'NIP'		=> $this->input->post('NIP'),
			        'namaDosen'	=> $this->input->post('namaDosen'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'jabatan'	=> $this->input->post('jabatan'),
			        'jenjangPendidikan'	=> $this->input->post('jenjangPendidikan'),
			        'golongan'	=> $this->input->post('golongan')
				);
		$this->Msumberdaya->ubahDosen(array('idDosen' => $this->input->post('idDosen')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatDosen(){
		$data['data']=$this->Msumberdaya->lihatDosen();
		$data['data2']=$this->Molahdata->prodi();
		$data['data3']=$this->Molahdata->pivotDosen1();
		$data['data4']=$this->Molahdata->lihatBantuDosen();
		$data['data5']=$this->Molahdata->dosenperprodi();
		$data['data6']=$this->Molahdata->dosenperprodi();
		$data['data7']=$this->Molahdata->pivotDosen2();
		$session = $this->session->userdata('login');
		if($session == 'Sumberdaya'){
			$this->load->view('SumberDaya/dosen',$data);
		}
		elseif($session == 'Kemahasiswaan'){
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusDosen($id)
	{
		$this->Msumberdaya->hapusDosen($id);
		echo json_encode(array("status" => TRUE));
	}
	public function bantuan(){
		$tahun=getdate();
		$apoajo=count($this->Molahdata->where3($tahun['year']));
		$data['tahun']=$tahun['year'];
    	$data['til']=count($this->Molahdata->dosen1());
		$data['tip']=count($this->Molahdata->dosen2());
		$data['tsl']=count($this->Molahdata->dosen3());
		$data['tsp']=count($this->Molahdata->dosen4());
		$data['tml']=count($this->Molahdata->dosen5());
		$data['tmp']=count($this->Molahdata->dosen6());
		$data['tel']=count($this->Molahdata->dosen7());
		$data['tep']=count($this->Molahdata->dosen8());
		$data['arl']=count($this->Molahdata->dosen9());
		$data['arp']=count($this->Molahdata->dosen10());
		$data['sil']=count($this->Molahdata->dosen11());
		$data['sip']=count($this->Molahdata->dosen12());
		if($apoajo>0){
			$this->Msumberdaya->ubahbantudosen('bantudosen',$data,array('tahun'=>$tahun['year']));
		}
		else{
		$this->Msumberdaya->tambahbantudosen('bantudosen',$data);}
    	redirect('Sumberdaya/lihatDosen');
    }
    public function printDosen(){
		$data['data']=$this->Msumberdaya->lihatDosen();
		$data['data2']=$this->Molahdata->prodi();
		$data['data3']=$this->Molahdata->pivotDosen1();
		$data['data4']=$this->Molahdata->lihatBantuDosen();
		$data['data5']=$this->Molahdata->dosenperprodi();
		$data['data6']=$this->Molahdata->dosenperprodi();
		$data['data7']=$this->Molahdata->pivotDosen2();
		$this->load->view('SumberDaya/printdosen',$data);
	}





    //Mahasiswa
	public function tambahMahasiswa(){
			$data = array(
					'NPM'		=> $this->input->post('NPM'),
			        'namaMahasiswa'	=> $this->input->post('namaMahasiswa'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin'),
			        'jalurMasuk'	=> $this->input->post('jalurMasuk'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'tahunMasuk'	=> $this->input->post('tahunMasuk')
				);
			$insert = $this->Msumberdaya->tambahMahasiswa($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit3($id)
	{
			$data = $this->Msumberdaya->get_by_id3($id);

			echo json_encode($data);
	}
	public function ubahMahasiswa(){
		$data = array(
					'NPM'		=> $this->input->post('NPM'),
			        'namaMahasiswa'	=> $this->input->post('namaMahasiswa'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin'),
			        'jalurMasuk'	=> $this->input->post('jalurMasuk'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'tahunMasuk'	=> $this->input->post('tahunMasuk')
				);
		$this->Msumberdaya->ubahMahasiswa(array('NPM' => $this->input->post('NPMlama')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatMahasiswa(){
		$data['data']=$this->Msumberdaya->lihatMahasiswa();
		$data['data2']=$this->Molahdata->prodi();
		$data['data3']=$this->Molahdata->pivotMahasiswa();
		$data['data4']=$this->Molahdata->mahasiswaperprodi();
		$data['data5']=$this->Molahdata->pivotMahasiswa2();
		$data['data6']=$this->Molahdata->lihatBantuMahasiswa();
		$session = $this->session->userdata('login');
		if($session == 'Sumberdaya'){
			$this->load->view('SumberDaya/mahasiswa',$data);
		}
		elseif($session == 'Kemahasiswaan'){
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusMahasiswa($id)
	{
		$this->Msumberdaya->hapusMahasiswa($id);
		echo json_encode(array("status" => TRUE));
	}
	public function bantuan2(){
		$tahun=getdate();
		$apoajo=count($this->Molahdata->where4($tahun['year']));
		$data['tahun']=$tahun['year'];
    	$data['til']=count($this->Molahdata->mhs1());
		$data['tip']=count($this->Molahdata->mhs2());
		$data['tsl']=count($this->Molahdata->mhs3());
		$data['tsp']=count($this->Molahdata->mhs4());
		$data['tml']=count($this->Molahdata->mhs5());
		$data['tmp']=count($this->Molahdata->mhs6());
		$data['tel']=count($this->Molahdata->mhs7());
		$data['tep']=count($this->Molahdata->mhs8());
		$data['arl']=count($this->Molahdata->mhs9());
		$data['arp']=count($this->Molahdata->mhs10());
		$data['sil']=count($this->Molahdata->mhs11());
		$data['sip']=count($this->Molahdata->mhs12());
		if($apoajo>0){
			$this->Msumberdaya->ubahbantumahasiswa('bantumahasiswa',$data,array('tahun'=>$tahun['year']));
		}
		else{
		$this->Msumberdaya->tambahbantumahasiswa('bantumahasiswa',$data);}
    	redirect('Sumberdaya/lihatMahasiswa');
    }
	public function printMahasiswa(){
		$data['data']=$this->Msumberdaya->lihatMahasiswa();
		$data['data2']=$this->Molahdata->prodi();
		$data['data3']=$this->Molahdata->pivotMahasiswa();
		$data['data4']=$this->Molahdata->mahasiswaperprodi();
		$data['data5']=$this->Molahdata->pivotMahasiswa2();
		$data['data6']=$this->Molahdata->lihatBantuMahasiswa();
		$this->load->view('SumberDaya/printmahasiswa',$data);
	}




    //Pegawai
	public function tambahPegawai(){
			$data = array(
					'NIP'		=> $this->input->post('NIP'),
			        'namaPegawai'	=> $this->input->post('namaPegawai'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin'),
			        'unitKerja'	=> $this->input->post('unitKerja'),
			        'golongan'	=> $this->input->post('golongan'),
			        'status'	=> $this->input->post('status'),
			        'jenjangPendidikan'	=> $this->input->post('jenjangPendidikan')
				);
			$insert = $this->Msumberdaya->tambahPegawai($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit4($id)
	{
			$data = $this->Msumberdaya->get_by_id4($id);

			echo json_encode($data);
	}
	public function ubahPegawai(){
		$data = array(
					'NIP'		=> $this->input->post('NIP'),
			        'namaPegawai'	=> $this->input->post('namaPegawai'),
			        'jenisKelamin'	=> $this->input->post('jenisKelamin'),
			        'unitKerja'	=> $this->input->post('unitKerja'),
			        'golongan'	=> $this->input->post('golongan'),
			        'status'	=> $this->input->post('status'),
			        'jenjangPendidikan'	=> $this->input->post('jenjangPendidikan')
				);
		$this->Msumberdaya->ubahPegawai(array('idPegawai' => $this->input->post('idPegawai')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatPegawai(){
		$data['data']=$this->Msumberdaya->lihatPegawai();
		$data['data2']=$this->Molahdata->pegawaiperunit();
		$data['data3']=$this->Molahdata->pivotPegawai();
		$data['data4']=$this->Molahdata->pivotPegawai2();
		$data['data5']=$this->Molahdata->pivotPegawai3();
		$session = $this->session->userdata('login');
		if($session == 'Sumberdaya'){
			$this->load->view('SumberDaya/pegawai',$data);
		}
		elseif($session == 'Kemahasiswaan'){
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusPegawai($id)
	{
		$this->Msumberdaya->hapusPegawai($id);
		echo json_encode(array("status" => TRUE));
	}
	public function printPegawai(){
		$data['data']=$this->Msumberdaya->lihatPegawai();
		$data['data2']=$this->Molahdata->pegawaiperunit();
		$data['data3']=$this->Molahdata->pivotPegawai();
		$data['data4']=$this->Molahdata->pivotPegawai2();
		$data['data5']=$this->Molahdata->pivotPegawai3();
		$this->load->view('SumberDaya/printpegawai',$data);
	}




	//inventaris
	public function tambahInventaris(){
	    $data = array(
	        'namaBarang'		=> $this->input->post('namaBarang'),
	        'asalBarang'	=> $this->input->post('asalBarang'),
	        'jumlah'	=> $this->input->post('jumlah'),
	        'lokasi'	=> $this->input->post('lokasi'),
	        'kondisi'	=> $this->input->post('kondisi')
	    );
	    $insert = $this->Msumberdaya->tambahInventaris($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit9($id)
	{
			$data = $this->Msumberdaya->get_by_id7($id);

			echo json_encode($data);
	}
	public function ubahInventaris(){
		$data = array(
			'namaBarang'		=> $this->input->post('namaBarang'),
	        'asalBarang'	=> $this->input->post('asalBarang'),
	        'jumlah'	=> $this->input->post('jumlah'),
	        'lokasi'	=> $this->input->post('lokasi'),
	        'kondisi'	=> $this->input->post('kondisi')
			);
		$this->Msumberdaya->ubahInventaris(array('idInventaris' => $this->input->post('idInventaris')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatInventaris(){
		$data['data']=$this->Msumberdaya->lihatInventaris();
		$data['data2']=$this->Molahdata->inventaris();
		$session = $this->session->userdata('login');
		if($session == 'Sumberdaya'){
			$this->load->view('Sumberdaya/inventaris',$data);
		}
		elseif($session == 'Kemahasiswaan'){
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusInventaris($id)
	{
		$this->Msumberdaya->hapusInventaris($id);
		echo json_encode(array("status" => TRUE));
	}
	public function printInventaris(){
		$data['data']=$this->Msumberdaya->lihatInventaris();
		$data['data2']=$this->Molahdata->inventaris();
		$this->load->view('Sumberdaya/printinventaris',$data);
	}
}
