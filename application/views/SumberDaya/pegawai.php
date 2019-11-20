<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SILATAH | Pegawai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- Data Tables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css'); ?>">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('SumberDaya/layout'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PEGAWAI
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-header">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Grafik Jumlah pegawai per unit kerja</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col (LEFT) -->
        <!-- /.col (RIGHT) -->
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Tabel Data</a></li>
                  <li><a href="#timeline" data-toggle="tab">Data Statistik</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                  <h3 class="box-title">Tabel Pegawai</h3>
                  <!-- /.box-header -->
                  <table id="example1" class="table table-bordered table-striped">
                      <button class="btn btn-success" title="Tambah Data" onclick="add_book()"><i class="glyphicon glyphicon-plus"></i>Tambah</button>&nbsp;&nbsp;&nbsp;
                      <!--  <button class="btn btn-success" formaction="<?php// echo base_url('Kemahasiswaan/cetakpdf'); ?>" type="submit"><i class="glyphicon glyphicon-plus"></i><a href="<?php// echo base_url('Kemahasiswaan/cetakpdf'); ?>"><font color="white">Cetak PDF</font></a></button>&nbsp;&nbsp;&nbsp; 
                      <button class="btn btn-success" formaction="<?php // echo base_url('Kemahasiswaan/exportExcel'); ?>" type="submit"><i class="glyphicon glyphicon-plus"></i><a href="<?php // echo base_url('Kemahasiswaan/exportExcel'); ?>"><font color="white">Ekspor ke Excel</font></a></button>&nbsp;&nbsp;&nbsp;
                      <button class="btn btn-success" formaction="<?php // echo base_url('Kemahasiswaan/cetak'); ?>" type="submit"><i class="glyphicon glyphicon-plus"></i><a href="<?php // echo base_url('Kemahasiswaan/cetak'); ?>"><font color="white">TCPDF</font></a></button> -->
                      <br/>
                      </br>
                      <thead>
                          <tr>
                            <th>No.</th>
                            <th hidden>id Pegawai</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Unit Kerja</th>
                            <th>Golongan</th>
                            <th>Status</th>
                            <th>Jenjang Pendidikan</th>
                            <th style="width:125px;">Aksi
                            </p></th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($data as $dt){?>
                        <tr>
                                  <td><?php echo ++$no;?></td>
                                  <td><?php echo $dt->NIP;?></td>
                                  <td><?php echo $dt->namaPegawai;?></td>
                                  <td><?php echo $dt->jenisKelamin;?></td>
                                  <td><?php echo $dt->unitKerja;?></td>
                                  <td><?php echo $dt->golongan;?></td>
                                  <td><?php echo $dt->status;?></td>
                                  <td><?php echo $dt->jenjangPendidikan;?></td>
                          <td>
                            <button class="btn btn-primary" title="Ubah Data" onclick="edit_book(<?php echo $dt->idPegawai;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                            <button class="btn btn-danger" title="Hapus Data" onclick="delete_book(<?php echo $dt->idPegawai;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                          </td>
                        </tr>
                        <?php }?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>No.</th>
                            <th hidden>id Pegawai</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Unit Kerja</th>
                            <th>Golongan</th>
                            <th>Status</th>
                            <th>Jenjang Pendidikan</th>
                            <th>Aksi</th>
                          </tr>
                      </tfoot>
                  </table>
                  <!-- /.box-body -->
              </div>
              <div class="tab-pane" id="timeline">
                      <!-- The timeline -->
                <h3 class="box-title">Data Statistik Pegawai</h3>
                <a href="<?php echo base_url('Sumberdaya/printPegawai') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
                  <h4>Data Pegawai Berdasarkan Unit Kerja dan  Golongan</h4>
                  <table class="table table-bordered" style="border-collapse: collapse; width: 100%; margin: 0 auto;">
                    <thead>
                      <tr>
                        <th rowspan="3">No.</th>
                        <th rowspan="3">Unit Kerja</th>
                        <th colspan="12">Golongan</th>
                        <th rowspan="3">Total</th>
                      </tr>
                      <tr>
                        <th colspan="4">II</th>
                        <th colspan="4">III</th>
                        <th colspan="4">IV</th>
                      </tr>
                      <tr>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach($data3 as $dta){?>
                      <tr>
                        <td><?php echo ++$no;?></td>
                        <td><?php echo $dta['unitKerja'];?></td>
                        <td><?php echo $dta['satu'];?></td>
                        <td><?php echo $dta['dua'];?></td>
                        <td><?php echo $dta['tiga'];?></td>
                        <td><?php echo $dta['empat'];?></td>
                        <td><?php echo $dta['lima'];?></td>
                        <td><?php echo $dta['enam'];?></td>
                        <td><?php echo $dta['tujuh'];?></td>
                        <td><?php echo $dta['delapan'];?></td>
                        <td><?php echo $dta['sembilan'];?></td>
                        <td><?php echo $dta['sepuluh'];?></td>
                        <td><?php echo $dta['sebelas'];?></td>
                        <td><?php echo $dta['duabelas'];?></td>
                        <td><?php echo $dta['total'];?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <br>
                  <br>
                  <h4>Data Pegawai Tidak Tetap Berdasarkan Tingkat Pendidikan dan  Jenis Kelamin</h4>
                  <table class="table table-bordered" style="border-collapse: collapse; width: 100%; margin: 0 auto;">
                    <thead>
                      <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Tingkat Pendidikan</th>
                        <th colspan="2">Jenis Kelamin</th>
                        <th rowspan="2">Total</th>
                      </tr>
                      <tr>
                        <th>L</th>
                        <th>P</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach($data4 as $dta){?>
                      <tr>
                        <td><?php echo ++$no;?></td>
                        <td><?php echo $dta['jenjangPendidikan'];?></td>
                        <td><?php echo $dta['L'];?></td>
                        <td><?php echo $dta['P'];?></td>
                        <td><?php echo $dta['total'];?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <br>
                  <br>
                  <h4>Data Pegawai Tetap Berdasarkan Tingkat Pendidikan dan  Jenis Kelamin</h4>
                  <table class="table table-bordered" style="border-collapse: collapse; width: 100%; margin: 0 auto;">
                    <thead>
                      <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Tingkat Pendidikan</th>
                        <th colspan="2">Jenis Kelamin</th>
                        <th rowspan="2">Total</th>
                      </tr>
                      <tr>
                        <th>L</th>
                        <th>P</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach($data5 as $dta){?>
                      <tr>
                        <td><?php echo ++$no;?></td>
                        <td><?php echo $dta['jenjangPendidikan'];?></td>
                        <td><?php echo $dta['L'];?></td>
                        <td><?php echo $dta['P'];?></td>
                        <td><?php echo $dta['total'];?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <br>
                  <br>
              </div>
            <!-- /.box -->
            </div>
            </div>
          </div>
        <!-- /.col -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Alpha Version</b> 1.0
      </div>
      <strong>Fakultas Teknik | Universitas Bengkulu</strong>
    </footer>
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- ./wrapper -->
<!-- Bootstrap modal -->
          <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Pegawai</h3>
                </div>
                <div class="modal-body form">
                  <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="idPegawai"/>
                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">NIP</label>
                        <div class="col-md-9">
                          <input name="NIP" id="NIP" required placeholder="NIP" class="form-control" type="text">

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Nama Pegawai</label>
                        <div class="col-md-9">
                          <input name="namaPegawai" id="namaPegawai" required placeholder="Nama Pegawai" class="form-control" type="text">

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Jenis Kelamin</label>
                        <div class="col-md-9">
                          <select name="jenisKelamin" required id="jenisKelamin" class="form-control select2" style="width: 100%;">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Unit Kerja</label>
                        <div class="col-md-9">
                          <select name="unitKerja" required id="unitKerja" class="form-control select2" style="width: 100%;">
                            <option value="Bidang Akademik">Bidang Akademik</option>
                            <option value="Bidang Administrasi Umum & Keuangan">Bidang Administrasi Umum & Keuangan</option>
                            <option value="Prodi Teknik Informatika">Prodi Teknik Informatika</option>
                            <option value="Prodi Teknik Sipil">Prodi Teknik Sipil</option>
                            <option value="Prodi Teknik Mesin">Prodi Teknik Mesin</option>
                            <option value="Prodi Teknik Elektro">Prodi Teknik Elektro</option>
                            <option value="Prodi Arsitektur">Prodi Arsitektur</option>
                            <option value="Prodi Sistem Informasi">Prodi Sistem Informasi</option>
                            <option value="Tenaga Kebersihan">Tenaga Kebersihan</option>
                            <option value="Penjaga Malam">Penjaga Malam</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Golongan</label>
                        <div class="col-md-9">
                          <select name="golongan" required id="golongan" class="form-control select2" style="width: 100%;">
                            <option value="IIIA">IIIA</option>
                            <option value="IIIB">IIIB</option>
                            <option value="IIIC">IIIC</option>
                            <option value="IIID">IIID</option>
                            <option value="IIIE">IIIE</option>
                            <option value="IVA">IVA</option>
                            <option value="IVB">IVB</option>
                            <option value="IVC">IVC</option>
                            <option value="IVD">IVD</option>
                            <option value="IVE">IVE</option>
                            <option value="IIIA">IIIA</option>
                            <option value="IIIB">IIIB</option>
                            <option value="IIIC">IIIC</option>
                            <option value="IIID">IIID</option>
                            <option value="IIIE">IIIE</option>
                            <option value="IIA">IIA</option>
                            <option value="IIB">IIB</option>
                            <option value="IIC">IIC</option>
                            <option value="IID">IID</option>
                            <option value="IIE">IIE</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Status</label>
                        <div class="col-md-9">
                          <select name="status" required id="status" class="form-control select2" style="width: 100%;">
                            <option value="Tetap">Tetap</option>
                            <option value="Tidak Tetap">Tidak Tetap</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Jenjang Pendidikan</label>
                        <div class="col-md-9">
                          <select name="jenjangPendidikan" required id="jenjangPendidikan" class="form-control select2" style="width: 100%;">
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div>
          </div>
          <!-- End Bootstrap modal -->

<!-- modal -->
<!-- Modal Gagal -->
          <div class="modal modal-danger fade" id="modal-danger">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Peringatan</h4>
                        </div>
                        <div class="modal-body">
                          <p>Ada field yang masih kosong&hellip;</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
          </div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/bower_components/Chart.js/Chart.js'); ?>"></script>
<!-- FastClick -->
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'); ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- page script -->
<script type="text/javascript">
                $(document).ready( function () {
                    $('#table_id').DataTable();
                } );
                  var save_method; //for save method string
                  var table;


                  function add_book()
                  {
                    save_method = 'add';
                    $('#form')[0].reset(); // reset form on modals
                    $('#modal_form').modal('show'); // show bootstrap modal
                  //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
                  }

                  function edit_book(id)
                  {
                    save_method = 'update';
                    $('#form')[0].reset(); // reset form on modals

                    //Ajax Load data from ajax
                    $.ajax({
                      url : "<?php echo site_url('Sumberdaya/ajax_edit4/')?>/" + id,
                      type: "GET",
                      dataType: "JSON",
                      success: function(data)
                      {

                          $('[name="idPegawai"]').val(data.idPegawai);
                          $('[name="NIP"]').val(data.NIP);
                          $('[name="namaPegawai"]').val(data.namaPegawai);
                          $('[name="jenisKelamin"]').val(data.jenisKelamin);
                          $('[name="unitKerja"]').val(data.unitKerja);
                          $('[name="golongan"]').val(data.golongan);
                          $('[name="status"]').val(data.status);
                          $('[name="jenjangPendidikan"]').val(data.jenjangPendidikan);


                          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                          $('.modal-title').text('Pegawai'); // Set title to Bootstrap modal title

                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error get data from ajax');
                      }
                  });
                  }



                 
                  function save()
                  {
                    var url;

                    if ($.trim($("#NIP").val()) ==="" || $.trim($("#namaPegawai").val()) ==="" || $.trim($("#jenisKelamin").val()) ==="" || $.trim($("#unitKerja").val()) ==="" || $.trim($("#golongan").val()) ==="" || $.trim($("#status").val()) ==="" || $.trim($("#jenjangPendidikan").val()) ==="") {
                        $('#btnSave').click(function(e) {
                            e.preventDefault();
                             $('#modal-danger').modal('show');
                            return false;
                        })
                    }
                    else{
                        if(save_method == 'add')
                        {
                          url = "<?php echo site_url('Sumberdaya/tambahPegawai')?>";
                        }
                        else
                        {
                          url = "<?php echo site_url('Sumberdaya/ubahPegawai')?>";
                        }
                     // ajax adding data to database
                        $.ajax({
                          url : url,
                          type: "POST",
                          data: $('#form').serialize(),
                          dataType: "JSON",
                          success: function(data)
                          {
                             //if success close modal and reload ajax table
                             $('#modal_form').modal('hide');
                            location.reload();// for reload a page
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                              alert('Error adding / update data');
                          }
                      });
                    }
                  }
                  

                  function delete_book(id)
                  {
                    if(confirm('Are you sure delete this data?'))
                    {
                      // ajax delete data from database
                        $.ajax({
                          url : "<?php echo site_url('Sumberdaya/hapusPegawai')?>/"+id,
                          type: "POST",
                          dataType: "JSON",
                          success: function(data)
                          {
                             
                             location.reload();
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                              alert('Error deleting data');
                          }
                      });

                    }
                  }
</script>
<script>
          var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
            showLeftPush = document.getElementById( 'showLeftPush' ),
            body = document.body;
            
          showLeftPush.onclick = function() {
            classie.toggle( this, 'active' );
            classie.toggle( body, 'cbp-spmenu-push-toright' );
            classie.toggle( menuLeft, 'cbp-spmenu-open' );
            disableOther( 'showLeftPush' );
          };
          

          function disableOther( button ) {
            if( button !== 'showLeftPush' ) {
              classie.toggle( showLeftPush, 'disabled' );
            }
          }
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- <?php
        //foreach($data as $dt){
           // $jumlah1[] = $dt->jumlah1;
           //$jumlah2[] = $dt->jumlah2;
           // $jumlah3[] = $dt->jumlah3;
            //$jumlah4[] = $dt->jumlah4;
            //$jumlah5[] = $dt->jumlah5;
            //$jumlah6[] = $dt->jumlah6;
      //  }
    ?> -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    
   var color1 = '#f56954' 
   var color2 = '#f39c12' 
   var color3 = '#00c0ef' 
   var color4 = '#3c8dbc' 
   var color5 = '#000080'
   var color6 = '#DDA0DD'
   var color7 = '#808000'
   var color8 = '#8B0000'
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    <?php $x=1; foreach ($data2 as $dt) { ?>
      {
        value    : <?php echo $dt['jumlah']; ?>,
        color    : color<?php echo $x;?>,
        highlight: '#d2d6de',
        label    : '<?php echo $dt['unitKerja'] ?>'
      }, <?php $x++;} ?>
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

   
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
