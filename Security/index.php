<?php
session_start();



/* $d = dir("./uploads");

$dirs = [];
while (($dir = $d->read()) !== false){
    if ( !in_array($dir,['.','..']) ){
        //echo "<hr>pasta: " . $dir . "<br>";
        $dirs[]=$dir;
    }

}
$d->close();
echo "<hr>";

$arquivos = [];
foreach($dirs as $dir){
    $f = dir("./uploads/$dir");
    while (($file = $f->read()) !== false){
        if ( !in_array($file,['.','..']) ){
            echo "pasta: $dir, arquivo: " .     $file . "<br>";
            $arquivos[]=$file;
        }
    }
    $f->close();  
} */

$directory = "uploads/";
$dirs = array_diff(scandir($directory, 1), [".", ".."]);

/* echo "<hr>";
foreach ($dirs  as $p){
    echo $p."<br>";
} */

 /* foreach ($arquivos  as $a){ 
    echo "<img src='./uploads/eua/".$a."'><br>";
}  */


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galeria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="./" class="nav-link">Início</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../logout.php" class="nav-link">Sair</a>
                </li>
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../index3.html" class="brand-link">
                
                <center><span class="brand-text font-weight-light">Galeria</span></center>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="foto/<?php echo $_SESSION["usuario"]->foto; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="color:white"><?php echo $_SESSION["usuario"]->nome; ?> </a>
                    </div>
                </div>
              
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">Galeria de Fotos</li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Pelo Mundo
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-image nav-icon"></i>
                                        <p>Europa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-image nav-icon"></i>
                                        <p>Estados Unidos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-image nav-icon"></i>
                                        <p>Egito</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php include "formupload.php" ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pelo Mundo</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./">Início</a></li>
                                <li class="breadcrumb-item active">Pelo Mundo</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="card-title">
                                        Galeria de Fotos
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="btn-group w-100 mb-2">
                                            <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Todos
                                                items </a>
                                                <?php foreach($dirs as $dir){

                                                     if(is_dir($directory.$dir)){ ?>

                                                  <a class="btn btn-info" href="javascript:void(0)" style="text-transform:capitalize;" data-filter="<?=$dir?>"><?=$dir?></a>

                                                 <?php $files[] = $dir;
                                                 }
                                                 }
                                                  ?>
                                                </div>    
                                            <!-- <a class="btn btn-info" href="javascript:void(0)" data-filter="egito"> Egito </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="eua"> Estados Unidos </a>
                                            <a class="btn btn-info" href="javascript:void(0)" data-filter="europa"> Europa </a> -->
                                          
                                        </div>
                                        <div class="mb-2">
                                            <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Misturar </a>
                                            <div class="float-right">
                                                <select class="custom-select" style="width: auto;" data-sortOrder>
                                                    <option value="index"> Ordenar por posição</option>
                                                    <option value="sortData"> Ordenar por data</option>
                                                </select>
                                                <div class="btn-group">
                                                    <a class="btn btn-default" href="javascript:void(0)" data-sortAsc>
                                                        Crescente </a>
                                                    <a class="btn btn-default" href="javascript:void(0)" data-sortDesc>
                                                        Decrescente </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                   /*  
                                    $arquivos = [];
                                    foreach($dirs as $dir){
                                        $f = dir("./uploads/$dir");
                                        while (($file = $f->read()) !== false){
                                            if ( !in_array($file,['.','..']) ){
                                               */
        
                                    ?>
                                    <div>
                                        <div class="filter-container p-0 row">
                                        <?php  foreach($files as $pasta){

                                            foreach(array_diff(scandir($directory.$pasta, 1), [".", ".."]) as $foto){
                                            $foto = "/$foto"; 

                                        ?>
                                            <div class="filtr-item col-sm-2" data-category="<?=$pasta?>" data-sort="white sample">
                                            <a href="<?=$directory.$pasta.$foto?>" data-toggle="lightbox" data-title="<?=$foto?>">    
                                            <img src="<?=$directory.$pasta.$foto?>" class="img-fluid mb-2" alt="white sample"/>
                                            </a>                                                    


                                            <!-- <div class="filtr-item col-sm-2" data-category="<?php/*  echo $dir; */ ?>" data-sort="white sample"> -->
                                             <!--    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1"
                                                   data-toggle="lightbox" data-title="Foto 1 - Europa">
                                                    <img src="./uploads/<?php /* echo $dir. "/" . $file ; */?>"
                                                         class="img-fluid mb-2" alt="white sample"/> -->
                                               <!--  </a> -->
                                            </div>
                                            <?php
                                        
                                }                                            
                                }
                                /* $f->close();
                                }  */
                                ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Versão</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="http://plixsite.net">Gerson Borges</a>.</strong> Todos os direitos reservados.
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Filterizr-->
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>
