
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan </h2>
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
                      Data laporan Pemasukan
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Jenis Pemasukan</th>
                          <th>Quantity</th>
                          <th>Harga</th>
                          <th>Tanggal Pemasukan</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                    <?php 

                    $no = 1;
                    foreach ($data->result() as $lap_pemasukan) : ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $lap_pemasukan->jenis_pemasukan; ?></td>
                          <td><?php echo $lap_pemasukan->qty_pemasukan; ?></td>
                          <td><?php echo $lap_pemasukan->nominal; ?></td>
                          <td><?php echo $lap_pemasukan->tanggal_pemasukan; ?></td>
                          
                          

                        </tr>

                    <?php endforeach; ?>



                      </tbody>
                    </table>
                  </div>
                </div>
              </div>