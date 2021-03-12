  <?php
  if ( !empty($_FILES['arquivo']) ) {
      $tmp_name = $_FILES["arquivo"]["tmp_name"];
      $name = $_FILES["arquivo"]["name"];
    $imagem= move_uploaded_file($tmp_name, "Security/foto/$name");
  }
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Galeria</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Login</b></a>
  </div>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <?php
      session_start();
        if(isset($_SESSION['msg']))
        {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        else
        {
            echo "<p class='login-box-msg'>Cadastre-se</p>";
        }

       ?>






        <form action="" method="post" enctype="multipart/form-data">
        <p class='login-box-msg'>Insira sua foto</p>
        <div class="input-group mb-6">
        
        <input  class="form-control" type="file" name="arquivo" id="arquivo"  value="" required><br>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-image"></span>
            </div>
      </div>

      <br></br>
      <div class="col-12">
      <input type="submit" class="btn btn-info btn-block" value="Upload Image" name="submit">
          </div>
       
        </div>
        
    </form> 
    <br>




      <form action="autenticar.php" method="post">
      
      <div class="input-group mb-3">
          <input name="nome" type="text" class="form-control" placeholder="Nome">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file-signature"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="senha" type="password" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <?php
        if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ){
            $imagem = $_FILES[ 'arquivo' ][ 'name' ];
			      echo "<img width='200' src='Security/foto/{$imagem}' />";
          }
            ?>
          <input type="hidden" class="form-control"  name="foto" value="<?php if (isset($imagem)){echo $imagem;} ?>">

       
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-success btn-block">
          </div>
          <!-- /.col -->
        </div>
      </form>

    
      <!-- /.social-auth-links -->

      <p class="mb-5 col-8 col-8 ">
        <center><h4>Já possui login?<a href="index.php" class="text-center">Entre</a></h4></center>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Filterizr-->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Page specific script -->