<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SILATAH | Inventaris</title>
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
<?php $this->load->view('Sumberdaya/layout'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA INVENTARIS
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
        <!-- DONUT CHART -->
          <div class="box box-header">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Grafik Inventaris Berdasarkan Lokasi</h3>

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
                  <h3 class="box-title">Tabel Inventaris Barang</h3>
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
                          <th hidden>Id Inventaris</th>
                          <th>Nama Barang</th>
                          <th>Asal Barang</th>
                          <th>Jumlah</th>
                          <th>Lokasi</th>
                          <th>Kondisi</th>
                          <th style="width:125px;">Aksi</th>
                        
                    </thead>
                    <tbody>
                    <?php $no=0; foreach($data as $dt){?>
                      <tr>
                        <td><?php echo ++$no;?></td>
                        <td hidden><?php echo $dt->idInventaris;?></td>
                        <td><?php echo $dt->namaBarang;?></td>
                        <td><?php echo $dt->asalBarang;?></td>
                        <td><?php echo $dt->jumlah;?></td>
                        <td><?php echo $dt->lokasi;?></td>
                        <td><?php echo $dt->kondisi;?></td>
                        <td>
                            <button class="btn btn-primary" title="Ubah Data" onclick="edit_book(<?php echo $dt->idInventaris;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                            <button class="btn btn-danger" title="Hapus Data" onclick="delete_book(<?php echo $dt->idInventaris;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                          </td>
                        </tr>
                        <?php }?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>No.</th>
                          <th hidden>Id Inventaris</th>
                          <th>Nama Barang</th>
                          <th>Asal Barang</th>
                          <th>Jumlah</th>
                          <th>Lokasi</th>
                          <th>kondisi</th>
                          <th style="width:125px;">Aksi</th>
                          </tr>
                      </tfoot>
                  </table>
                  <!-- /.box-body -->
              </div>
              <div class="tab-pane" id="timeline">
                      <!-- The timeline -->
                <h3 class="box-title">Data Statistik Inventaris</h3>
                <a href="<?php echo base_url('Sumberdaya/printInventaris') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
                <br>
                <br>
                <h4>Tabel Seluruh Inventaris</h4>
                <table class="table table-bordered" style="border-collapse: collapse; width: 100%; margin: 0 auto;">
                      <!--  <button class="btn btn-success" formaction="<?php// echo base_url('Kemahasiswaan/cetakpdf'); ?>" type="submit"><i class="glyphicon glyphicon-plus"></i><a href="<?php// echo base_url('Kemahasiswaan/cetakpdf'); ?>"><font color="white">Cetak PDF</font></a></button>&nbsp;&nbsp;&nbsp; 
                      <button class="btn btn-success" formaction="<?php // echo base_url('Kemahasiswaan/exportExcel'); ?>" type="submit"><i class="glyphicon glyphicon-plus"></i><a href="<?php // echo base_url('Kemahasiswaan/exportExcel'); ?>"><font color="white">Ekspor ke Excel</font></a></button>&nbsp;&nbsp;&nbsp;
                      <button class="btn btn-success" formaction="<?php // echo base_url('Kemahasiswaan/cetak'); ?>" type="submit"><i class="glyphicon glyphicon-plus"></i><a href="<?php // echo base_url('Kemahasiswaan/cetak'); ?>"><font color="white">TCPDF</font></a></button> -->
                    <thead>
                      <tr>
                          <th>No.</th>
                          <th>Nama Barang</th>
                          <th>Asal Barang</th>
                          <th>Jumlah</th>
                          <th>Lokasi</th>
                          <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach($data as $dt){?>
                      <tr>
                        <td><?php echo ++$no;?></td>
                        <td><?php echo $dt->namaBarang;?></td>
                        <td><?php echo $dt->asalBarang;?></td>
                        <td><?php echo $dt->jumlah;?></td>
                        <td><?php echo $dt->lokasi;?></td>
                        <td><?php echo $dt->kondisi;?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
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
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Bootstrap modal -->
          <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Inventaris Barang</h3>
                </div>
                <div class="modal-body form">
                  <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="idInventaris"/>

                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Nama Barang</label>
                        <div class="col-md-9">
                          <input name="namaBarang" id="namaBarang" placeholder="Nama Barang" class="form-control" type="text">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3">Asal Barang</label>
                        <div class="col-md-9">
                          <input name="asalBarang" id="asalBarang" placeholder="Asal Barang" class="form-control" type="text">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3">Jumlah</label>
                        <div class="col-md-9">
                          <input name="jumlah" id="jumlah" placeholder="Jumlah" class="form-control" type="text">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3">Lokasi</label>
                        <div class="col-md-9">
                          <input name="lokasi" id="lokasi" placeholder="Lokasi" class="form-control" type="text">
                        </div>
                      </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3">Kondisi</label>
                        <div class="col-md-9">
                          <select name="kondisi" id="kondisi" class="form-control select2" style="width: 100%;">
                            <option value="Baik, Terawat">Baik, terawat</option>
                            <option value="Rusak">Rusak</option>
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

<!-- modal -->

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
                      url : "<?php echo site_url('Sumberdaya/ajax_edit9/')?>/" + id,
                      type: "GET",
                      dataType: "JSON",
                      success: function(data)
                      {

                          $('[name="idInventaris"]').val(data.idInventaris);
                          $('[name="namaBarang"]').val(data.namaBarang);
                          $('[name="asalBarang"]').val(data.asalBarang);
                          $('[name="jumlah"]').val(data.jumlah);
                          $('[name="lokasi"]').val(data.lokasi);
                          $('[name="kondisi"]').val(data.kondisi);


                          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                          $('.modal-title').text('Inventaris Barang'); // Set title to Bootstrap modal title

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

                    if ($.trim($("#namaBarang").val()) ==="" || $.trim($("#asalBarang").val()) ==="" || $.trim($("#jumlah").val()) ==="" || $.trim($("#lokasi").val()) ==="" || $.trim($("#kondisi").val()) ==="") {
                        $('#btnSave').click(function(e) {
                            e.preventDefault();
                             $('#modal-danger').modal('show');
                            return false;
                        })
                    }
                    else{
                        if(save_method == 'add')
                        {
                          url = "<?php echo site_url('Sumberdaya/tambahInventaris')?>";
                        }
                        else
                        {
                          url = "<?php echo site_url('Sumberdaya/ubahInventaris')?>";
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
                          url : "<?php echo site_url('Sumberdaya/hapusInventaris')?>/"+id,
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
        value    : <?php echo $dt['total']; ?>,
        color    : color<?php echo $x;?>,
        highlight: '#d2d6de',
        label    : '<?php echo $dt['lokasi'] ?>'
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