            <div class="page-title">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table Data Pengeluaran <small><?php echo $this->session->userdata("nama"); ?></small></h2>
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
                      Di bawah ini merupakan data dari Pengeluaran.
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode</th>
                          <th>Jenis</th>
                          <th>Quantity</th>
                          <th>Harga</th>
                          <th>Tanggal Pengeluaran</th>
                          <th>Note</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                    <?php 

                    $no = 1;
                    foreach ($data->result() as $pengeluaran) : ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $pengeluaran->kode_pengeluaran; ?></td>
                          <td><?php echo $pengeluaran->jenis_pengeluaran; ?></td>
                          <td><?php echo $pengeluaran->qty_pengeluaran; ?></td>
                          <td><?php echo $pengeluaran->nominal; ?></td>
                          <td><?php echo $pengeluaran->tanggal_pengeluaran; ?></td>
                          <td><?php echo $pengeluaran->notes_pengeluaran; ?>	</td>
                           <td>
                             <?php echo anchor('pengeluaran/update_pengeluaran/'.$pengeluaran->kode_pengeluaran, '<i class="fa fa-edit">edit</i>');?>
                             <?php echo anchor('pengeluaran/hapus/'.$pengeluaran->kode_pengeluaran, '<i class="fa fa-trash">delete</i>');?>  </td>
                         

                        </tr>

                    <?php endforeach; ?>


                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>