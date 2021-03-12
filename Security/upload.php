<?php
session_start();

$msg='';

$target_dir = "uploads/".$_POST['pasta']."/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verifique se o arquivo de imagem é real ou falso
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        $msg.= "O arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg.= " O arquivo não é uma imagem.";
        $uploadOk = 0;
    }
}

// Verifique se o arquivo já existe
if (file_exists($target_file)) {
    $msg.= "Desculpe, o arquivo já existe.";
    $uploadOk = 0;
}

// Verificar tamanho do arquivo
if ($_FILES["foto"]["size"] > 5000000) {
    $msg.= " Desculpe, seu arquivo é muito grande.";
    $uploadOk = 0;
}

// Permitir determinados formatos de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $msg.= " Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = 0;
}

// Verifique se $ uploadOk está definido como 0 por um erro
if ($uploadOk == 0) {
    $msg.= " Desculpe, seu arquivo não foi carregado.";
// se estiver tudo bem, tente fazer o upload do arquivo
} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        $msg.= " O arquivo ". basename( $_FILES["foto"]["name"]). " foi enviado.";
    } else {
        $msg.= " Desculpe, ocorreu um erro ao fazer upload do seu arquivo.";
    }
}

$_SESSION['msg'] = "<div class='alert alert-danger'>$msg</div>";

echo $_SESSION['msg'];

header("Location: ./");