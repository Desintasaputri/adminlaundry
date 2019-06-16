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
                    <div class="clearfix"></div>
<?php  
	if ($this->session->flashdata('alert'))
	 {
			echo '<div class="alert alert-danger alert-message">';
			echo $this->session->flashdata('alert');
			echo '</div>';	# code...
	} else if ($this->session->flashdata('success')) {
			echo '<div class="alert alert-success alert-message">';
			echo $this->session->flashdata('success');
			echo '</div>';
	}
 ?>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype='multipart/form-data' method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_mobil" name="nama_mobil" value=" <?php echo $nama_mobil; ?> " required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merk Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="merk_mobil" name="merk_mobil" value=" <?php echo $merk_mobil; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapasitas Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" onkeydown="return event.keyCode !== 69" id="kapasitas_mobil" name="kapasitas_mobil" value=" <?php echo $kapasitas_mobil; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Warna Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="warna_mobil" name="warna_mobil" value=" <?php echo $warna_mobil; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        	<input type="number" onkeydown="return event.keyCode !== 69" id="tahun_mobil" name="tahun_mobil" value=" <?php echo $tahun_mobil; ?>" required="required" min="1900" max="2099" step="1" value="" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Sewa <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="harga_sewa" name="harga_sewa" value=" <?php echo $harga_sewa; ?>"   onkeydown="return event.keyCode !== 69" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plat Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="plat_mobil" name="plat_mobil" value=" <?php echo $plat_mobil; ?>"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transmisi Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <select class="form-control col-md-7 col-xs-12" name="transmisi_mobil" required="required">
                            <option value="1"  <?php if($transmisi_mobil == 1) { echo "selected";} ?> >Manual</option>
                            <option value="2" <?php if($transmisi_mobil == 2) { echo "selected";} ?>  >Matic</option>
 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <select class="form-control col-md-7 col-xs-12" name="status_mobil" required="required">
                            <option value="1" <?php if($status_mobil == 1) { echo "selected";} ?> >Tersedia</option>
                            <option value="2" <?php if($status_mobil == 2) { echo "selected";} ?>>Tidak Tersedia</option>
 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status Sewa <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <select class="form-control col-md-7 col-xs-12" name="status_sewa" required="required">
                            <option value="1" <?php if($status_sewa == 1) { echo "selected";} ?> >Sedang disewa</option>
                            <option value="2" <?php if($status_sewa == 2) { echo "selected";} ?> >Tersedia</option>
 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Foto Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="foto"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="message">Deskripsi (20 chars min, 100 max) :</label>
                          <textarea id="message" required="required" class="form-control" name="deskripsi_mobil" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10" <?php echo $deskripsi_mobil; ?> ></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fasilitas Mobil <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <select class="form-control col-md-7 col-xs-12" name="fasilitas_mobil" required="required">
                            <option value="1" <?php if($fasilitas == 1) { echo "selected";} ?>  >Dengan Supir</option>
                            <option value="2" <?php if($fasilitas == 2) { echo "selected";} ?> >Tanpa Supir</option>
 
                          </select>
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
                  </div>
                </div>
              </div>
            </div>