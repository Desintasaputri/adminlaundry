 <!DOCTYPE html>
<html>
<head>
 
</head>
<body>
  <center>
  
    <h3>Edit Data Pegawai</h3>
  </center>
  <?php foreach($data_pegawai as $u){ ?>
  <form action="<?php echo base_url(). 'crud/update'; ?>" method="post">
    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->nama_pegawai ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->alamat_pegawai ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telpon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->telpon_pegawai ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->jabatan ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="window.history.go(-1)"  >Kembali</button>
                          <button type="submit" class="btn btn-success" name="submit" value="Submit" >Submit</button>
                      </div>
                      
  </form> 
  <?php } ?>
</body>
</html>




<!-- 
                    <div class="x_panel">
                    <div class="x_title">
                      <h2><?php echo  $header_tambahmobil; ?> <small>Tambah Data Mobil</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div><?php  
  if ($this->session->flashdata('alert'))
   {
      echo '<div class="alert alert-danger alert-message">';
      echo $this->session->flashdata('alert');
      echo '</div>';  # code...
  } else if ($this->session->flashdata('success')) {
      echo '<div class="alert alert-success alert-message">';
      echo $this->session->flashdata('success');
      echo '</div>';
  }
 ?>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php foreach($data_pegawai as $u){ ?>
                    <form action="<?php echo base_url(). 'crud/update'; ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype='multipart/form-data' method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $u->nama_pegawai ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary"  >Cancel</button>
                          <button type="submit" class="btn btn-success"name="submit" value="Submit" >Submit</button>
                        </div>
                      </div>

                    </form>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div> -->