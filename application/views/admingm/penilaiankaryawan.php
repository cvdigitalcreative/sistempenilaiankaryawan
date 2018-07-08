<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
     
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistem Monitoring</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo("{$_SESSION['logged_in']['username']}"."<br />");?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php echo("{$_SESSION['logged_in']['username']}"."<br />");?>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>Home/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo("{$_SESSION['logged_in']['username']}"."<br />");?></p>
        
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
       <li>
         
            <i class=""></i> <a href="<?php echo base_url(); ?>AdminGM" > <span>Home</span></a>
            
          </a>
        </li>

       

         <li>
            <i class=""></i><a href="<?php echo base_url(); ?>AdminGM/lihat_pegawai" > <span>Lihat Pegawai</span></a>
          </a>
        </li>
       
          </ul>
        </li>

         <li>
            <i class=""></i><a href="<?php echo base_url(); ?>AdminGM/hasil_penilaian" > <span>Hasil penilaian sistem</span></a>
          </a>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kirim Laporan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('AdminGM/beripenilaian_toDatabase');?>
               <?php
                echo "<div class='error_msg'>";
                if (isset($error_message)) {
                  echo $error_message;
                }
                  echo validation_errors();
                  echo "</div>";
                ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="hidden" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $data->nama_lengkap;?>">
                  <input type="text" class="form-control" value="<?php echo $data->nama_lengkap;?>" disabled>
                </div>

                 <!-- Date -->
                  <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="hidden" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Nama Lengkap" value="<?php echo $data->tanggal_lahir;?>">
                  <input type="text" class="form-control" value="<?php echo $data->tanggal_lahir;?>" disabled>
                </div>
               

              <div class="form-group">
                  <label for="exampleInputEmail1">Pendidikan</label>
                  <input type="hidden" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan" value="<?php echo $data->pendidikan;?>">
                  <input type="text" class="form-control" value="<?php echo $data->pendidikan;?>" disabled>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Departement</label>
                  <input type="hidden" class="form-control" id="departement" name="departement" placeholder="Departement" value="<?php echo $data->department;?>">
                    <input type="text" class="form-control" value="<?php echo $data->department;?>" disabled>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Posisi/Jabatan</label>
                  <input type="hidden" class="form-control" id="posisi" name="posisi" placeholder="Posisi/Jabatan" value="<?php echo $data->posisi;?>">
                   <input type="text" class="form-control" value="<?php echo $data->posisi;?>" disabled>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Akhir Kontrak</label>
                  <input type="hidden" class="form-control" id="akhir_kontrak" name="akhir_kontrak" placeholder="Akhir Kontrak" value="<?php echo $data->akhir_kontrak;?>">
                    <input type="text" class="form-control" value="<?php echo $data->akhir_kontrak;?>" disabled>
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 1</label>
                  <input type="text" class="form-control" id="penilaian_1" name="penilaian_1" placeholder="Nilai Wawancara 1">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 2</label>
                  <input type="text" class="form-control" id="penilaian_2" name="penilaian_2" placeholder="Nilai Wawancara 2">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 3</label>
                  <input type="text" class="form-control" id="penilaian_3" name="penilaian_3" placeholder="Nilai Wawancara 3">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 4</label>
                  <input type="text" class="form-control" id="penilaian_4" name="penilaian_4" placeholder="Nilai Wawancara 4">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 5</label>
                  <input type="text" class="form-control" id="penilaian_5" name="penilaian_5" placeholder="Nilai Wawancara 5">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 6</label>
                  <input type="text" class="form-control" id="penilaian_6" name="penilaian_6" placeholder="Nilai Wawancara 6">
                </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 7</label>
                  <input type="text" class="form-control" id="penilaian_7" name="penilaian_7" placeholder="Nilai Wawancara 7">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 8</label>
                  <input type="text" class="form-control" id="penilaian_8" name="penilaian_8" placeholder="Nilai Wawancara 8">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 9</label>
                  <input type="text" class="form-control" id="penilaian_9" name="penilaian_9" placeholder="Nilai Wawancara 9">
                </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 10</label>
                  <input type="text" class="form-control" id="penilaian_10" name="penilaian_10" placeholder="Nilai Wawancara 10">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 11</label>
                  <input type="text" class="form-control" id="penilaian_11" name="penilaian_11" placeholder="Nilai Wawancara 11">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nilai Wawancara 12</label>
                  <input type="text" class="form-control" id="penilaian_12" name="penilaian_12" placeholder="Nilai Wawancara 12">
                </div>
              </div>
              <!-- /.box-body -->
              <input type="hidden" class="form-control" id="pemberi_nilai" name="pemberi_nilai" value="3">
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data->id;?>">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
             <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
      <!-- Main content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
   
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>dist/js/demo.js"></script>
<!-- Page script -->
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
