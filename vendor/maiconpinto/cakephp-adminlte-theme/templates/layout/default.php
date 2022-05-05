<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php echo $this->Html->css('AdminLTE./bower_components/bootstrap/dist/css/bootstrap.min'); ?>
  <!-- Font Awesome -->
  <?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
  <!-- Ionicons -->
  <?php echo $this->Html->css('AdminLTE./bower_components/Ionicons/css/ionicons.min'); ?>
  <!-- Theme style -->
  <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <?php echo $this->Html->css('AdminLTE.skins/skin-'. Configure::read('Theme.skin') .'.min'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <?php echo $this->fetch('css'); ?>

  <?php echo $this->fetch('css2'); ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <?php echo $this->Html->css('util'); ?> 

  <?php echo $this->Html->css('AdminLTE./plugins/select2/select2.css'); ?>

  <?= 
    $this->Html->css([
        'AdminLTE./plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css',
        'AdminLTE./plugins/datatables/extensions/RowReorder/css/rowReorder.dataTables.min.css',
        'AdminLTE./plugins/datatables/dataTables.bootstrap',
        'AdminLTE./plugins/datatables/extensions/buttons/buttons.dataTables.min',
    ]);
  ?>

</head>
<body class="hold-transition skin-<?php echo Configure::read('Theme.skin'); ?> sidebar-mini">
  <style>
      .select2-container--default.select2-container--focus,
    .select2-selection.select2-container--focus,
    .select2-container--default:focus,
    .select2-selection:focus,
    .select2-container--default:active,
    .select2-selection:active {
      outline: none;
    }
    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
      border: 1px solid #d2d6de;
      border-radius: 0;
      padding: 6px 12px;
      height: 34px;
    }
    .select2-container--default.select2-container--open {
      border-color: #3c8dbc;
    }
    .select2-dropdown {
      border: 1px solid #d2d6de;
      border-radius: 0;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
      background-color: #3c8dbc;
      color: white;
    }
    .select2-results__option {
      padding: 6px 12px;
      user-select: none;
      -webkit-user-select: none;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
      padding-left: 0;
      padding-right: 0;
      height: auto;
      margin-top: -4px;
    }
    .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
      padding-right: 6px;
      padding-left: 20px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 28px;
      right: 3px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
      margin-top: 0;
    }
    .select2-dropdown .select2-search__field,
    .select2-search--inline .select2-search__field {
      border: 1px solid #d2d6de;
    }
    .select2-dropdown .select2-search__field:focus,
    .select2-search--inline .select2-search__field:focus {
      outline: none;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple,
    .select2-container--default .select2-search--dropdown .select2-search__field {
      border-color: #3c8dbc !important;
    }
    .select2-container--default .select2-results__option[aria-disabled=true] {
      color: #999;
    }
    .select2-container--default .select2-results__option[aria-selected=true] {
      background-color: #ddd;
    }
    .select2-container--default .select2-results__option[aria-selected=true],
    .select2-container--default .select2-results__option[aria-selected=true]:hover {
      color: #444;
    }
    .select2-container--default .select2-selection--multiple {
      border: 1px solid #d2d6de;
      border-radius: 0;
    }
    .select2-container--default .select2-selection--multiple:focus {
      border-color: #3c8dbc;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
      border-color: #d2d6de;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #3c8dbc;
      border-color: #367fa9;
      padding: 1px 10px;
      color: #fff;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
      margin-right: 5px;
      color: rgba(255, 255, 255, 0.7);
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
      color: #fff;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
      padding-right: 10px;
    }
  </style>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo Configure::read('Theme.logo.mini'); ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo Configure::read('Theme.logo.large'); ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php echo $this->element('nav-top'); ?>
  </header>

  <?php echo $this->element('aside-main-sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php echo $this->Flash->render(); ?>
    <?php echo $this->Flash->render('auth'); ?>
    <?php echo $this->fetch('content'); ?>

  </div>
  <!-- /.content-wrapper -->

  <?php echo $this->element('footer'); ?>

  <!-- Control Sidebar -->
  <?php echo $this->element('aside-control-sidebar'); ?>
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE.adminlte.min'); ?>
<!-- Slimscroll -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-slimscroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./bower_components/fastclick/lib/fastclick'); ?>

<?= 
  $this->Html->script([
      'AdminLTE./plugins/datatables/jquery.dataTables.min',
      'AdminLTE./plugins/datatables/extensions/buttons/dataTables.buttons.min',
      'AdminLTE./plugins/datatables/extensions/ajax/jszip/jszip.min',
      'AdminLTE./plugins/datatables/extensions/ajax/pdfmake/pdfmake.min',
      'AdminLTE./plugins/datatables/extensions/ajax/pdfmake/vfs_fonts',
      'AdminLTE./plugins/datatables/extensions/buttons/buttons.html5.min',
      'AdminLTE./plugins/datatables/extensions/buttons/buttons.print.min',
      'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
      'AdminLTE./plugins/datatables/extensions/Responsive/js/dataTables.responsive.min',
      'AdminLTE./plugins/datatables/extensions/RowReorder/js/dataTables.rowReorder.min',
  ]);
?>

<?php echo $this->Html->script('dataTable'); ?>

<?php echo $this->fetch('script'); ?>

<?php echo $this->fetch('script2'); ?>

<?php echo $this->fetch('scriptBottom'); ?>

<?php echo $this->Html->script('AdminLTE./plugins/select2/select2'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");

        $('.select2').select2({
            language: 'pt-BR',
            width: '100%',
            selectOnClose: true
        });
        
        var a = $('a[href="<?php echo $this->Url->build() ?>"]');
        if (!a.parent().hasClass('treeview') && !a.parent().parent().hasClass('pagination')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }
        
    });
</script>

</body>
</html>
