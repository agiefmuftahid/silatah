<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kemahasiswaan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper('url');
	 	$this->load->model('Mkemahasiswaan');
	 	$this->load->library('dompdf_gen');
    }
	public function index()
	{
		$session = $this->session->userdata('login');
		if($session == 'Kemahasiswaan'){
			redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}

	//Kegiatan
	public function tambahKegiatan(){
			$data = array(
					'namaOrmawa'		=> $this->input->post('namaOrmawa'),
			        'tingkat'	=> $this->input->post('tingkat'),
			        'kegiatan'	=> $this->input->post('kegiatan'),
			        'tempat'	=> $this->input->post('tempat'),
			        'waktu'	=> $this->input->post('waktu'),
			        'dana'	=> $this->input->post('dana')
				);
			$insert = $this->Mkemahasiswaan->tambahKegiatan($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
			$data = $this->Mkemahasiswaan->get_by_id($id);

			echo json_encode($data);
	}
	public function ubahKegiatan(){
		$data = array(
				'namaOrmawa'		=> $this->input->post('namaOrmawa'),
			    'tingkat'	=> $this->input->post('tingkat'),
			    'kegiatan'	=> $this->input->post('kegiatan'),
			    'tempat'	=> $this->input->post('tempat'),
			    'waktu'	=> $this->input->post('waktu'),
			    'dana'	=> $this->input->post('dana')
			);
		$this->Mkemahasiswaan->ubahKegiatan(array('idKegiatan' => $this->input->post('idKegiatan')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatKegiatan(){
		$data['data']=$this->Mkemahasiswaan->lihatKegiatan();
		$data['data2']=$this->Molahdata->perTahun();
		$data['data3']=$this->Molahdata->namaOrmawa();
		$data['data4']=$this->Molahdata->perOrmawa();
		$data['data5']=$this->Molahdata->statistikOrmawa();
		$data['data6']=$this->Molahdata->statistikTingkatKegiatan();
        $data['data7'] = $this->Molahdata->statistikTingkatPrestasi();
        $session = $this->session->userdata('login');
		if($session == 'Kemahasiswaan'){
			$this->load->view('Kemahasiswaan/kegiatanmhs',$data);
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusKegiatan($id)
	{
		$this->Mkemahasiswaan->hapusKegiatan($id);
		echo json_encode(array("status" => TRUE));
	}
	public function print(){
    	$data['data']=$this->Mkemahasiswaan->lihatKegiatan();
		$data['data2']=$this->Molahdata->perTahun();
		$data['data3']=$this->Molahdata->namaOrmawa();
		$data['data4']=$this->Molahdata->perOrmawa();
		$data['data5']=$this->Molahdata->statistikOrmawa();
		$data['data6']=$this->Molahdata->statistikTingkatKegiatan();
    	$this->load->view('Kemahasiswaan/print',$data);
    }
	/* public function cetakpdf(){
        $data['title'] = 'Cetak PDF Kegiatan Mahasiswa'; //judul title
        $data['data'] = $this->Mkemahasiswaan->lihatKegiatan(); //query model semua barang
 
        $this->load->view('Kemahasiswaan/cetakkegiatan', $data);
 
        $paper_size  = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporankegiatan.pdf", array('Attachment'=>0));
    }
    public function cetak(){
        $this->load->library('Pdf');
        $data = $this->Mkemahasiswaan->lihatKegiatan(); //query model semua barang
        //$data['title'] = 'Cetak PDF Kegiatan Mahasiswa'; //judul title
        //$data['data'] = $this->Mkemahasiswaan->lihatKegiatan(); //query model semua barang
        $this->load->view('Kemahasiswaan/test', ['data' => $data]);
    }
    public function exportExcel(){
           $data = array( 'title' => 'Laporan Kegiatan Mahasiswa',
                'data' => $this->Mkemahasiswaan->lihatKegiatan());
 
           $this->load->view('Kemahasiswaan/excelkegiatan',$data);
    } */
    




	//Prestasi
	public function tambahPrestasi(){
			$data = array(
					'NPM'		=> $this->input->post('NPM'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'prestasi'	=> $this->input->post('prestasi'),
			        'tingkat'	=> $this->input->post('tingkat'),
			        'tahun'	=> $this->input->post('tahun')
				);
			$insert = $this->Mkemahasiswaan->tambahPrestasi($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit2($id)
	{
			$data = $this->Mkemahasiswaan->get_by_id2($id);

			echo json_encode($data);
	}
	public function ubahPrestasi(){
		$data = array(
					'NPM'		=> $this->input->post('NPM'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'prestasi'	=> $this->input->post('prestasi'),
			        'tingkat'	=> $this->input->post('tingkat'),
			        'tahun'	=> $this->input->post('tahun')
				);
		$this->Mkemahasiswaan->ubahPrestasi(array('idPrestasi' => $this->input->post('idPrestasi')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatPrestasi(){
		$data['data']=$this->Mkemahasiswaan->lihatPrestasi();
        $data['data2'] = $this->Molahdata->perProdi();
        $data['data3'] = $this->Molahdata->prodi();
        $data['data4'] = $this->Molahdata->mahasiswa();
        $data['data5'] = $this->Molahdata->perProdi();
        $data['data6'] = $this->Molahdata->statistikProdi();
        $data['data7'] = $this->Molahdata->statistikTingkatPrestasi();
        $data['data8'] = $this->Molahdata->prestasiperTahun();
        $session = $this->session->userdata('login');
		if($session == 'Kemahasiswaan'){
			$this->load->view('Kemahasiswaan/prestasi',$data);
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusPrestasi($id)
	{
		$this->Mkemahasiswaan->hapusPrestasi($id);
		echo json_encode(array("status" => TRUE));
	}
	public function printprestasi(){
    	$data['data']=$this->Mkemahasiswaan->lihatPrestasi();
        $data['data2'] = $this->Molahdata->perProdi();
        $data['data3'] = $this->Molahdata->prodi();
        $data['data4'] = $this->Molahdata->mahasiswa();
        $data['data5'] = $this->Molahdata->perProdi();
        $data['data6'] = $this->Molahdata->statistikProdi();
        $data['data7'] = $this->Molahdata->statistikTingkatPrestasi();
        $data['data8'] = $this->Molahdata->prestasiperTahun();
		$this->load->view('Kemahasiswaan/printprestasi',$data);
    }






	//Beasiswa
	public function tambahBeasiswa(){
			$data = array(
					'NPM'		=> $this->input->post('NPM'),
					'jenisKelamin'		=> $this->input->post('jenisKelamin'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'jenisBeasiswa'	=> $this->input->post('jenisBeasiswa'),
			        'tahun'	=> $this->input->post('tahun')
				);
			$insert = $this->Mkemahasiswaan->tambahBeasiswa($data);
			echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit3($id)
	{
			$data = $this->Mkemahasiswaan->get_by_id3($id);

			echo json_encode($data);
	}
	public function ubahBeasiswa(){
		$data = array(
					'NPM'		=> $this->input->post('NPM'),
					'jenisKelamin'		=> $this->input->post('jenisKelamin'),
			        'idProdi'	=> $this->input->post('idProdi'),
			        'jenisBeasiswa'	=> $this->input->post('jenisBeasiswa'),
			        'tahun'	=> $this->input->post('tahun')
				);
		$this->Mkemahasiswaan->ubahBeasiswa(array('idBeasiswa' => $this->input->post('idBeasiswa')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function lihatBeasiswa(){
		$data['data']=$this->Mkemahasiswaan->lihatBeasiswa();
		$data['data2']=$this->Molahdata->perJenis();
		$data['data3'] = $this->Molahdata->prodi();
		$data['data4'] = $this->Molahdata->perProdi2();
		$data['data5'] = $this->Molahdata->perJenis();
		$data['data6'] = $this->Molahdata->mahasiswa();
		$data['data7'] = $this->Molahdata->pivotBeasiswa1();
		$data['data8'] = $this->Molahdata->beasiswaperTahun();
		$data['data9'] = $this->Molahdata->pivotBeasiswa2();
		$session = $this->session->userdata('login');
		if($session == 'Kemahasiswaan'){
			$this->load->view('Kemahasiswaan/beasiswa',$data);
		}
		elseif($session == 'Sumberdaya'){
			redirect('Sumberdaya/lihatAlokasi');
		}
		elseif($session == 'Akademik') {
			redirect('Akademik/lihatBuku');
		}
		else{
			redirect('Login/index');
		}
	}
	public function hapusBeasiswa($id)
	{
		$this->Mkemahasiswaan->hapusBeasiswa($id);
		echo json_encode(array("status" => TRUE));
	}
	public function printbeasiswa(){
    	$data['data']=$this->Mkemahasiswaan->lihatBeasiswa();
		$data['data2']=$this->Molahdata->mahasiswa();
		$data['data3'] = $this->Molahdata->prodi();
		$data['data4'] = $this->Molahdata->statistikBeasiswaProdi();
		$data['data5'] = $this->Molahdata->statistikBeasiswaJenis();
		$data['data7'] = $this->Molahdata->pivotBeasiswa1();
		$data['data9'] = $this->Molahdata->pivotBeasiswa2();
		$this->load->view('Kemahasiswaan/printbeasiswa',$data);
    }
}
