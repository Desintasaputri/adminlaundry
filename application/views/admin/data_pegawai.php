            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table Data Customer <small><?php echo $this->session->userdata("nama"); ?></small></h2>
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
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Id.Customer</th>
                          <th>Jenis Cucian</th>
                          <th>Tanggal Trnsakasi</th>
                          <th>Tanggal Bayar</th>
                          <th>Status Pembayaran</th>
                          <th>Total</th>
                          <th  colspan="2">Pengaturan</th>
                          
                        </tr>
                      </thead>
                      <tbody>

                    <?php 

                    $no = 1;
                    foreach ($data->result() as $pegawai) : ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $pegawai->nama_pegawai; ?></td>
                          <td><?php echo $pegawai->alamat_pegawai; ?></td>
                          <td><?php echo $pegawai->telpon_pegawai; ?></td>
                          <td>
                           <a href="<?php echo base_url() ?>pegawai/Hapus/<?php echo $pegawai->id_pegawai ?>" class="btn btn-success">Hapus</a>
                          </td>
                        </tr>
                    <?php $no++; 
                    endforeach; ?>


                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>