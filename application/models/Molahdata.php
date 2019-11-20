<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Molahdata extends CI_Model {
	
	var $table = 'kegiatanmhs';
	var $table2 = 'prestasi';
	var $table3 = 'beasiswa';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function perTahun(){
		$query = $this->db->query("SELECT YEAR(waktu) as tahun, COUNT(YEAR(waktu)) as jumlah FROM kegiatanmhs GROUP BY YEAR(waktu)");
		return $query->result_array();
	}
	public function namaOrmawa(){
		$query = $this->db->query('SELECT * FROM ormawa');
		return $query->result_array();
	}
	public function perOrmawa(){
		$query = $this->db->query('SELECT ormawa.namaOrmawa, COUNT(kegiatanmhs.namaOrmawa) as jumlah FROM kegiatanmhs JOIN ormawa ON ormawa.idOrmawa = kegiatanmhs.namaOrmawa GROUP BY kegiatanmhs.namaOrmawa');
		return $query->result_array();
	}
	public function statistikOrmawa(){
		$this->db->select('kegiatanmhs.idKegiatan,ormawa.namaOrmawa,
					kegiatanmhs.tingkat,kegiatanmhs.kegiatan,kegiatanmhs.tempat,kegiatanmhs.waktu,kegiatanmhs.dana,ormawa.idOrmawa,kegiatanmhs.namaOrmawa as nama,COUNT(kegiatanmhs.namaOrmawa) as jumlah')
				 ->join('ormawa','ormawa.idOrmawa=kegiatanmhs.namaOrmawa')
				 ->group_by('namaOrmawa');
		return $this->db->get('kegiatanmhs')->result();
	}
	public function statistikTingkatKegiatan(){
		$this->db->select('kegiatanmhs.idKegiatan,ormawa.namaOrmawa,
					kegiatanmhs.tingkat,kegiatanmhs.kegiatan,kegiatanmhs.tempat,kegiatanmhs.waktu,kegiatanmhs.dana,ormawa.idOrmawa,kegiatanmhs.namaOrmawa as nama,COUNT(kegiatanmhs.tingkat) as jumlah')
				 ->join('ormawa','ormawa.idOrmawa=kegiatanmhs.namaOrmawa')
				 ->group_by('tingkat');
		return $this->db->get('kegiatanmhs')->result();
	}
	public function statistikProdi(){
		$this->db->select('prestasi.idPrestasi,mahasiswa.namaMahasiswa,
					prodi.namaProdi,prestasi.prestasi,prestasi.tingkat,mahasiswa.npm,prestasi.tahun,mahasiswa.namaMahasiswa as namaMhs,prodi.idProdi,COUNT(prestasi.NPM) as jumlah')
				 ->join('mahasiswa','mahasiswa.NPM=prestasi.NPM')
				 ->join('prodi', 'prodi.idProdi=prestasi.idProdi')
				 ->group_by('prestasi.idProdi');
		return $this->db->get('prestasi')->result();
	}
	public function statistikTingkatPrestasi(){
		$query = $this->db->query('SELECT prestasi.tingkat,COUNT(prestasi.NPM) as jumlah FROM prestasi JOIN mahasiswa ON mahasiswa.NPM=prestasi.NPM JOIN prodi ON prodi.idProdi=prestasi.idProdi  GROUP BY prestasi.tingkat');
		return $query->result_array();
	}
	public function statistikBeasiswaProdi(){
		$this->db->select('beasiswa.idBeasiswa,mahasiswa.namaMahasiswa,
					prodi.namaProdi,beasiswa.jenisBeasiswa,beasiswa.tahun,mahasiswa.npm,prodi.idProdi,COUNT(beasiswa.NPM) as jumlah')
				 ->join('mahasiswa','mahasiswa.NPM=beasiswa.NPM')
				 ->join('prodi', 'prodi.idProdi=beasiswa.idProdi')
				 ->group_by('beasiswa.idProdi');
		return $this->db->get('beasiswa')->result();
	}
	public function statistikBeasiswaJenis(){
		$this->db->select('beasiswa.idBeasiswa,mahasiswa.namaMahasiswa,
					prodi.namaProdi,beasiswa.jenisBeasiswa,beasiswa.tahun,mahasiswa.npm,prodi.idProdi,COUNT(beasiswa.NPM) as jumlah')
				 ->join('mahasiswa','mahasiswa.NPM=beasiswa.NPM')
				 ->join('prodi', 'prodi.idProdi=beasiswa.idProdi')
				 ->group_by('beasiswa.jenisBeasiswa');
		return $this->db->get('beasiswa')->result();
	}
	public function prodi(){
		$query = $this->db->query('SELECT * FROM prodi');
		return $query->result_array();
	}
	public function mahasiswa(){
		$query = $this->db->query('SELECT * FROM mahasiswa');
		return $query->result_array();
	}
	public function perProdi(){
		$query = $this->db->query('SELECT prodi.namaProdi, COUNT(prestasi.idProdi) as jumlah FROM prestasi JOIN prodi ON prodi.idProdi = prestasi.idProdi GROUP BY prestasi.idProdi');
		return $query->result_array();
	}
	public function buku1(){
		$query = $this->db->query('SELECT * FROM koleksibuku WHERE jenisBuku="teks" AND bahasaBuku="indo"');
		return $query->result_array();
	}
	public function buku2(){
		$query = $this->db->query('SELECT * FROM koleksibuku WHERE jenisBuku="teks" AND bahasaBuku="asing"');
		return $query->result_array();
	}
	public function buku3(){
		$query = $this->db->query('SELECT * FROM koleksibuku WHERE jenisBuku="referensi" AND bahasaBuku="indo"');
		return $query->result_array();
	}
	public function buku4(){
		$query = $this->db->query('SELECT * FROM koleksibuku WHERE jenisBuku="referensi" AND bahasaBuku="asing"');
		return $query->result_array();
	}
	public function where($tahun){
		$query = $this->db->query('SELECT * FROM bantubuku WHERE tahun="'.$tahun.'"');
		return $query->result_array();
	}
	/*public function where2($tahun){
		$query = $this->db->query('SELECT * FROM bantupendaftarjeniskelamin WHERE tahun="'.$tahun.'"');
		return $query->result_array();
	}*/
	public function pendaftar1(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=1 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function pendaftar2(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=1 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function pendaftar3(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=2 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function pendaftar4(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=2 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function pendaftar5(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=3 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function pendaftar6(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=3 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function pendaftar7(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=4 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function pendaftar8(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=4 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function pendaftar9(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=5 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function pendaftar10(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=5 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function pendaftar11(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=6 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function pendaftar12(){
		$query = $this->db->query('SELECT * FROM pendaftar WHERE idProdi=6 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function lihatBantu(){
		$this->db->select('*');
		return $this->db->get('bantubuku')->result();
	}
	/*public function lihatBantuPendaftarJenisKelamin(){
		$this->db->select('*');
		return $this->db->get('bantupendaftarjeniskelamin')->result();
	}*/
	public function perBidangIlmu(){
		$this->db->select('bidangIlmu,COUNT(bidangIlmu) as jumlah')
				 ->group_by('bidangIlmu');
		return $this->db->get('jurnal')->result();
	}
	public function pivotAnggaran1(){
		$query = $this->db->query('SELECT jenisPenggunaan, SUM(case when tahun="2012" then jumlahDana else null end) as "nol",SUM(case when tahun="2013" then jumlahDana else null end) as "satu", SUM(case when tahun="2014" then jumlahDana else null end) as "dua", SUM(case when tahun="2015" then jumlahDana else null end) as "tiga", SUM(case when tahun="2016" then jumlahDana else null end) as "empat", SUM(case when tahun="2017" then jumlahDana else null end) as "lima", SUM(jumlahDana) as total FROM anggarankeluar GROUP BY jenisPenggunaan');
		return $query->result_array();
	}
	public function pivotAnggaran2(){
		$query = $this->db->query('SELECT alokasi, SUM(case when tahun="2012" then jumlahDana else null end) as "nol", SUM(case when tahun="2013" then jumlahDana else null end) as "satu", SUM(case when tahun="2014" then jumlahDana else null end) as "dua", SUM(case when tahun="2015" then jumlahDana else null end) as "tiga", SUM(case when tahun="2016" then jumlahDana else null end) as "empat", SUM(case when tahun="2017" then jumlahDana else null end) as "lima", SUM(jumlahDana) as total FROM alokasidana GROUP BY alokasi');
		return $query->result_array();
	}
	public function pivotAnggaran3(){
		$query = $this->db->query('SELECT sumberDana,jenisDana, SUM(case when tahun="2012" then jumlahDana else null end) as "nol", SUM(case when tahun="2013" then jumlahDana else null end) as "satu", SUM(case when tahun="2014" then jumlahDana else null end) as "dua", SUM(case when tahun="2015" then jumlahDana else null end) as "tiga", SUM(case when tahun="2016" then jumlahDana else null end) as "empat", SUM(case when tahun="2017" then jumlahDana else null end) as "lima", SUM(jumlahDana) as total FROM anggaranmasuk GROUP BY sumberDana');
		return $query->result_array();
	}
	public function pivotDosen1(){
		$query = $this->db->query('SELECT  prodi.namaProdi, COUNT(case when dosen.jenisKelamin="Laki-laki" then dosen.jenisKelamin else null end) AS "Laki-laki", COUNT(case when dosen.jenisKelamin="Perempuan" then dosen.jenisKelamin else null end) AS "Perempuan" FROM dosen JOIN prodi ON prodi.idProdi=dosen.idProdi GROUP BY prodi.idProdi');
		return $query->result_array();
	}
	public function dosen1(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=1 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function dosen2(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=1 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function dosen3(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=2 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function dosen4(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=2 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function dosen5(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=3 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function dosen6(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=3 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function dosen7(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=4 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function dosen8(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=4 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function dosen9(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=5 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function dosen10(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=5 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function dosen11(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=6 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function dosen12(){
		$query = $this->db->query('SELECT * FROM dosen WHERE idProdi=6 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function where3($tahun){
		$query = $this->db->query('SELECT * FROM bantudosen WHERE tahun="'.$tahun.'"');
		return $query->result_array();
	}
	public function lihatBantuDosen(){
		$this->db->select('*');
		return $this->db->get('bantudosen')->result();
	}
	public function pivotMahasiswa(){
		$query = $this->db->query('SELECT  prodi.namaProdi, COUNT(case when mahasiswa.jalurMasuk="SNMPTN" then mahasiswa.jalurMasuk else null end) AS "SNMPTN", COUNT(case when mahasiswa.jalurMasuk="SBMPTN" then mahasiswa.jalurMasuk else null end) AS "SBMPTN",COUNT(case when mahasiswa.jalurMasuk="PPA/PBM" then mahasiswa.jalurMasuk else null end) AS "PPA/PBM", COUNT(case when mahasiswa.jalurMasuk="SPMU" then mahasiswa.jalurMasuk else null end) AS "SPMU", COUNT(case when mahasiswa.jalurMasuk="Avirmasi" then mahasiswa.jalurMasuk else null end) AS "Avirmasi", COUNT(mahasiswa.jalurMasuk) as total FROM mahasiswa JOIN prodi ON prodi.idProdi=mahasiswa.idProdi GROUP BY prodi.idProdi');
		return $query->result_array();
	}
	public function perJenis(){
		$query = $this->db->query('SELECT beasiswa.jenisBeasiswa, COUNT(beasiswa.jenisBeasiswa) as jumlah FROM beasiswa GROUP BY beasiswa.jenisBeasiswa');
		return $query->result_array();
	}
	public function perProdi2(){
		$query = $this->db->query('SELECT prodi.namaProdi, COUNT(beasiswa.idProdi) as jumlah FROM beasiswa JOIN prodi ON prodi.idProdi = beasiswa.idProdi GROUP BY beasiswa.idProdi');
		return $query->result_array();
	}
	public function keluarpertahun(){
		$query = $this->db->query('SELECT tahun, COUNT(tahun) as jumlah FROM anggarankeluar GROUP BY tahun');
		return $query->result_array();
	}
	public function dosenperprodi(){
		$query = $this->db->query('SELECT prodi.namaProdi, COUNT(dosen.idProdi) as jumlah FROM dosen JOIN prodi ON prodi.idProdi = dosen.idProdi GROUP BY dosen.idProdi');
		return $query->result_array();
	}
	public function mahasiswaperprodi(){
		$query = $this->db->query('SELECT prodi.namaProdi, COUNT(mahasiswa.idProdi) as jumlah FROM mahasiswa JOIN prodi ON prodi.idProdi = mahasiswa.idProdi GROUP BY mahasiswa.idProdi');
		return $query->result_array();
	}
	public function pegawaiperunit(){
		$query = $this->db->query('SELECT unitKerja, COUNT(unitKerja) as jumlah FROM pegawai GROUP BY unitKerja');
		return $query->result_array();
	}
	public function perpustakaan(){
		$query = $this->db->query('SELECT bahasaBuku, COUNT(bahasaBuku) as jumlah FROM koleksibuku GROUP BY bahasaBuku');
		return $query->result_array();
	}
	public function pendaftarpertahun(){
		$query = $this->db->query('SELECT pendaftar.jalur, COUNT(pendaftar.jalur) as jumlah FROM pendaftar JOIN prodi ON prodi.idProdi = pendaftar.idProdi GROUP BY pendaftar.jalur');
		return $query->result_array();
	}
	public function jurnalperbidangilmu(){
		$query = $this->db->query('SELECT bidangIlmu, COUNT(bidangIlmu) as jumlah FROM jurnal GROUP BY bidangIlmu');
		return $query->result_array();
	}
	public function anggaranmasuk(){
		$query = $this->db->query('SELECT tahun, SUM(jumlahDana) as jumlah FROM anggaranmasuk GROUP BY tahun');
		return $query->result_array();
	}
	public function anggarankeluar(){
		$query = $this->db->query('SELECT tahun, SUM(jumlahDana) as jumlah FROM anggarankeluar GROUP BY tahun');
		return $query->result_array();
	}
	public function pivotBeasiswa1(){
		$query = $this->db->query('SELECT  beasiswa.jenisBeasiswa, COUNT(case when beasiswa.idProdi=1 then beasiswa.idProdi else null end) AS "ti", COUNT(case when beasiswa.idProdi=2 then beasiswa.idProdi else null end) AS "ts",COUNT(case when beasiswa.idProdi=3 then beasiswa.idProdi else null end) AS "tm", COUNT(case when beasiswa.idProdi=4 then beasiswa.idProdi else null end) AS "te", COUNT(case when beasiswa.idProdi=5 then beasiswa.idProdi else null end) AS "ar", COUNT(case when beasiswa.idProdi=6 then beasiswa.idProdi else null end) AS "si", COUNT(beasiswa.idProdi) as total FROM beasiswa GROUP BY beasiswa.jenisBeasiswa');
		return $query->result_array();
	}
	public function pivotDosen2(){
		$query = $this->db->query('SELECT  prodi.namaProdi, COUNT(case when dosen.golongan="IIIA" then dosen.golongan else null end) AS "satu", COUNT(case when dosen.golongan="IIIB" then dosen.golongan else null end) AS "dua", COUNT(case when dosen.golongan="IIIC" then dosen.golongan else null end) AS "tiga", COUNT(case when dosen.golongan="IIID" then dosen.golongan else null end) AS "empat", COUNT(case when dosen.golongan="IIIE" then dosen.golongan else null end) AS "lima", COUNT(case when dosen.golongan="IVA" then dosen.golongan else null end) AS "enam", COUNT(case when dosen.golongan="IVB" then dosen.golongan else null end) AS "tujuh", COUNT(case when dosen.golongan="IVC" then dosen.golongan else null end) AS "delapan", COUNT(case when dosen.golongan="IVD" then dosen.golongan else null end) AS "sembilan", COUNT(case when dosen.golongan="IVE" then dosen.golongan else null end) AS "sepuluh", COUNT(dosen.golongan) as total FROM dosen JOIN prodi ON prodi.idProdi=dosen.idProdi GROUP BY dosen.idProdi');
		return $query->result_array();
	}
	public function beasiswaperTahun(){
		$query = $this->db->query('SELECT beasiswa.tahun, COUNT(beasiswa.tahun) as jumlah FROM beasiswa GROUP BY beasiswa.tahun');
		return $query->result_array();
	}
	public function pivotPegawai(){
		$query = $this->db->query('SELECT  pegawai.unitKerja, COUNT(case when pegawai.golongan="IIA" then pegawai.golongan else null end) AS "satu", COUNT(case when pegawai.golongan="IIB" then pegawai.golongan else null end) AS "dua", COUNT(case when pegawai.golongan="IIC" then pegawai.golongan else null end) AS "tiga", COUNT(case when pegawai.golongan="IID" then pegawai.golongan else null end) AS "empat", COUNT(case when pegawai.golongan="IIIA" then pegawai.golongan else null end) AS "lima", COUNT(case when pegawai.golongan="IIIB" then pegawai.golongan else null end) AS "enam", COUNT(case when pegawai.golongan="IIIC" then pegawai.golongan else null end) AS "tujuh", COUNT(case when pegawai.golongan="IIID" then pegawai.golongan else null end) AS "delapan", COUNT(case when pegawai.golongan="IVA" then pegawai.golongan else null end) AS "sembilan", COUNT(case when pegawai.golongan="IVB" then pegawai.golongan else null end) AS "sepuluh", COUNT(case when pegawai.golongan="IVC" then pegawai.golongan else null end) AS "sebelas", COUNT(case when pegawai.golongan="IVD" then pegawai.golongan else null end) AS "duabelas", COUNT(pegawai.golongan) as total FROM pegawai GROUP BY pegawai.unitKerja');
		return $query->result_array();
	}
	public function pivotPegawai2(){
		$query = $this->db->query('SELECT jenjangPendidikan, COUNT(case when jenisKelamin="Laki-laki" then jenisKelamin else null end) AS "L", COUNT(case when jenisKelamin="Perempuan" then jenisKelamin else null end) AS "P", COUNT(jenisKelamin) as total FROM pegawai WHERE status="tidak tetap" GROUP BY jenjangPendidikan');
		return $query->result_array();
	}
	public function pivotPegawai3(){
		$query = $this->db->query('SELECT jenjangPendidikan, COUNT(case when jenisKelamin="Laki-laki" then jenisKelamin else null end) AS "L", COUNT(case when jenisKelamin="Perempuan" then jenisKelamin else null end) AS "P", COUNT(jenisKelamin) as total FROM pegawai WHERE status="tetap" GROUP BY jenjangPendidikan');
		return $query->result_array();
	}
	public function pivotMahasiswa2(){
		$query = $this->db->query('SELECT  prodi.namaProdi, COUNT(case when mahasiswa.tahunMasuk="2012" then mahasiswa.tahunMasuk else null end) AS "satu", COUNT(case when mahasiswa.tahunMasuk="2013" then mahasiswa.tahunMasuk else null end) AS "dua",COUNT(case when mahasiswa.tahunMasuk="2014" then mahasiswa.tahunMasuk else null end) AS "tiga", COUNT(case when mahasiswa.tahunMasuk="2015" then mahasiswa.tahunMasuk else null end) AS "empat", COUNT(case when mahasiswa.tahunMasuk="2016" then mahasiswa.tahunMasuk else null end) AS "lima", COUNT(case when mahasiswa.tahunMasuk="2017" then mahasiswa.tahunMasuk else null end) AS "enam", COUNT(mahasiswa.tahunMasuk) as total FROM mahasiswa JOIN prodi ON prodi.idProdi=mahasiswa.idProdi GROUP BY mahasiswa.idProdi');
		return $query->result_array();
	}
	public function pivotBeasiswa2(){
		$query = $this->db->query('SELECT  jenisBeasiswa, COUNT(case when tahun="2012" AND jenisKelamin="Laki-laki" then tahun AND jenisKelamin else null end) AS "satu", COUNT(case when tahun="2012" AND jenisKelamin="Perempuan" then tahun AND jenisKelamin else null end) AS "dua", COUNT(case when tahun="2013" AND jenisKelamin="Laki-laki" then tahun AND jenisKelamin else null end) AS "tiga", COUNT(case when tahun="2013" AND jenisKelamin="Perempuan" then tahun AND jenisKelamin else null end) AS "empat", COUNT(case when tahun="2014" AND jenisKelamin="Laki-laki" then tahun AND jenisKelamin else null end) AS "lima", COUNT(case when tahun="2014" AND jenisKelamin="Perempuan" then tahun AND jenisKelamin else null end) AS "enam", COUNT(case when tahun="2015" AND jenisKelamin="Laki-laki" then tahun AND jenisKelamin else null end) AS "tujuh", COUNT(case when tahun="2015" AND jenisKelamin="Perempuan" then tahun AND jenisKelamin else null end) AS "delapan", COUNT(case when tahun="2016" AND jenisKelamin="Laki-laki" then tahun AND jenisKelamin else null end) AS "sembilan", COUNT(case when tahun="2016" AND jenisKelamin="Perempuan" then tahun AND jenisKelamin else null end) AS "sepuluh", COUNT(case when tahun="2017" AND jenisKelamin="Laki-laki" then tahun AND jenisKelamin else null end) AS "sebelas", COUNT(case when tahun="2017" AND jenisKelamin="Perempuan" then tahun AND jenisKelamin else null end) AS "duabelas", COUNT(tahun AND jenisKelamin) as total FROM beasiswa GROUP BY jenisBeasiswa');
		return $query->result_array();
	}
	public function pivotPendaftar(){
		$query = $this->db->query('SELECT  prodi.namaProdi, COUNT(case when pendaftar.tahun="2012" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "satu", COUNT(case when pendaftar.tahun="2012" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "dua", COUNT(case when pendaftar.tahun="2013" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "tiga", COUNT(case when pendaftar.tahun="2013" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "empat", COUNT(case when pendaftar.tahun="2014" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "lima", COUNT(case when pendaftar.tahun="2014" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "enam", COUNT(case when pendaftar.tahun="2015" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "tujuh", COUNT(case when pendaftar.tahun="2015" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "delapan", COUNT(case when pendaftar.tahun="2016" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "sembilan", COUNT(case when pendaftar.tahun="2016" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "sepuluh", COUNT(case when pendaftar.tahun="2017" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND jenisKelamin else null end) AS "sebelas", COUNT(case when pendaftar.tahun="2017" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "duabelas", COUNT(pendaftar.tahun AND pendaftar.jenisKelamin) as total FROM pendaftar JOIN prodi ON prodi.idProdi=pendaftar.idProdi GROUP BY pendaftar.idProdi');
		return $query->result_array();
	}
	public function pivotPendaftar2(){
		$query = $this->db->query('SELECT  prodi.namaProdi, COUNT(case when pendaftar.jalur="SNMPTN" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.jalur AND pendaftar.jenisKelamin else null end) AS "satu", COUNT(case when pendaftar.jalur="SNMPTN" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.jalur AND pendaftar.jenisKelamin else null end) AS "dua", COUNT(case when pendaftar.tahun="SBMPTN" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.jalur AND pendaftar.jenisKelamin else null end) AS "tiga", COUNT(case when pendaftar.tahun="SBMPTN" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.jalur AND pendaftar.jenisKelamin else null end) AS "empat", COUNT(case when pendaftar.jalur="PPA/PBM" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "lima", COUNT(case when pendaftar.jalur="PPA/PBM" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "enam",  COUNT(case when pendaftar.jalur="PPA/PBM" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "lima", COUNT(case when pendaftar.jalur="PPA/PBM" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "enam",  COUNT(case when pendaftar.jalur="SPMU" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "tujuh", COUNT(case when pendaftar.jalur="SPMU" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "delapan", COUNT(case when pendaftar.jalur="Avirmasi" AND pendaftar.jenisKelamin="Laki-laki" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "sembilan", COUNT(case when pendaftar.jalur="Avirmasi" AND pendaftar.jenisKelamin="Perempuan" then pendaftar.tahun AND pendaftar.jenisKelamin else null end) AS "sepuluh", COUNT(pendaftar.jalur AND pendaftar.jenisKelamin) as total FROM pendaftar JOIN prodi ON prodi.idProdi=pendaftar.idProdi GROUP BY pendaftar.idProdi');
		return $query->result_array();
	}
	public function koleksi(){
		$query = $this->db->query('SELECT * FROM koleksibuku');
		return $query->result_array();
	}
	public function inventaris(){
		$query = $this->db->query('SELECT lokasi, COUNT(lokasi) as total FROM inventaris GROUP BY lokasi ');
		return $query->result_array();
	}
	public function pengunjung(){
		$query = $this->db->query("SELECT YEAR(tanggal) as tahun, COUNT(YEAR(tanggal)) as jumlah FROM pengunjung GROUP BY YEAR(tanggal)");
		return $query->result_array();
	}
	public function peminjam(){
		$query = $this->db->query("SELECT YEAR(tanggal) as tahun, COUNT(YEAR(tanggal)) as jumlah FROM peminjam GROUP BY YEAR(tanggal)");
		return $query->result_array();
	}
	public function pendaftarTahun(){
		$query = $this->db->query("SELECT tahun, COUNT(tahun) as jumlah FROM pendaftar GROUP BY tahun");
		return $query->result_array();
	}
	public function prestasiperTahun(){
		$query = $this->db->query("SELECT tahun, COUNT(tahun) as jumlah FROM prestasi GROUP BY tahun");
		return $query->result_array();
	}
	public function pengunjungPertahun(){
		$query = $this->db->query('SELECT YEAR(pengunjung.tanggal) as tahun, COUNT(case when pengunjung.idProdi=1 then pengunjung.idProdi else null end) AS "TI", COUNT(case when pengunjung.idProdi=2 then pengunjung.idProdi else null end) AS "TS", COUNT(case when pengunjung.idProdi=3 then pengunjung.idProdi else null end) AS "TM", COUNT(case when pengunjung.idProdi=4 then pengunjung.idProdi else null end) AS "TE", COUNT(case when pengunjung.idProdi=5 then pengunjung.idProdi else null end) AS "AR", COUNT(case when pengunjung.idProdi=6 then pengunjung.idProdi else null end) AS "SI", COUNT(YEAR(pengunjung.tanggal)) as jumlah FROM pengunjung JOIN prodi ON prodi.idProdi=pengunjung.idProdi GROUP BY YEAR(pengunjung.tanggal)');
		return $query->result_array();
	}
	public function mhs1(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=1 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function mhs2(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=1 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function mhs3(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=2 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function mhs4(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=2 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function mhs5(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=3 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function mhs6(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=3 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function mhs7(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=4 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function mhs8(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=4 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function mhs9(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=5 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function mhs10(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=5 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function mhs11(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=6 AND jenisKelamin="Laki-laki"');
		return $query->result_array();
	}
	public function mhs12(){
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE idProdi=6 AND jenisKelamin="Perempuan"');
		return $query->result_array();
	}
	public function where4($tahun){
		$query = $this->db->query('SELECT * FROM bantumahasiswa WHERE tahun="'.$tahun.'"');
		return $query->result_array();
	}
	public function lihatBantuMahasiswa(){
		$this->db->select('*');
		return $this->db->get('bantumahasiswa')->result();
	}
}
