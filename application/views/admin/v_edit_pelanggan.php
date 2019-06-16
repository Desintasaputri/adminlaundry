 <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">


 <!DOCTYPE html>
<html>
<head>
 
</head>
<body>
  <center>
  
    <h3>Edit Data Pelanggan</h3>
  </center>
  <?php foreach($data_pelanggan as $u){ ?>
  <form action="<?php echo base_url(). 'crud/update'; ?>" method="post">
    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->nama_pelanggan ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->alamat_pelanggan?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telpon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->telpon_pelanggan?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" onclick="window.history.go(-1)"  >Kembali</button>
                          <button type="submit" class="btn btn-success" name="submit" value="Submit" >Submit</button>
                      </div>
                      
  </form> 
  <?php } ?>
</body>
</html>