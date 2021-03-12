<form action="upload.php" method="post" enctype="multipart/form-data">  

        <p class='login-box-msg'>Insira o local da sua foto</p>
        <center>
        
        <input type="radio" name="pasta" value="egito">Egito
        <input type="radio"  name="pasta" value="eua">Estados Unidos
        <input type="radio"  name="pasta" value="europa">Europa
        </center>
        <br>
        <p class='login-box-msg'>Insira sua foto</p>
       
        <div class="input-group mb-2">
        
        <input  class="form-control" type="file" name="foto" id="foto"  value="" required><br>
        
      <br></br>
      <div class="col-4">
      <input type="submit" class="btn btn-info btn-block" value="Upload Image" name="submit">
          </div>
       
        </div>
       
    </form> 
    <br>