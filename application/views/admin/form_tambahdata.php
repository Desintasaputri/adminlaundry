                  <div class="x_panel">
                    <div class="x_title">
                      <h2><?php echo  $header_tambahmobil; ?> <small>Tambah Data Pengeluaran</small></h2>
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
                    <form action="<?php echo base_url(). 'pengeluaran/aksi_tambahdata'; ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype='multipart/form-data' method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Pengeluaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jenis_pengeluaran" name="jenis_pengeluaran" value=" <?php echo $jenis_pengeluaran; ?> " required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quantity Pengeluaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="qty_pengeluaran" name="qty_pengeluaran" value=" <?php echo $qty_pengeluaran; ?> " required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div><div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nominal" name="nominal" value=" <?php echo $nominal; ?> " required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value=" <?php echo $tanggal_pengeluaran; ?> " required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Note<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="message">Deskripsi (20 chars min, 100 max) :</label>
                          <textarea id="notes_pengeluarab" required="required" class="form-control" name="notes_pengeluaran" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10" <?php echo $notes_pengeluaran; ?> ></textarea>
                          </div>
                      </div>
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary"  >Cancel</button>
                          <button type="submit" class="btn btn-success" name="submit" value="Submit" >Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>