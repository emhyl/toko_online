<div class="container-fluid">
<!-- Content Row -->
    <div class="row mb-5">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml ?> BUAH</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_user ?> USER</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total penjualan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.<?= $total ?></div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-2x fas fa-dollar-sign text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
       <!--  <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

<!-- Content Row -->
    
    <div class="d-flex justify-content-between">
        <h4>Riwayat Pemesanan</h4>
        <h4><i class="fas fa-file-pdf"></i> <a href="<?= base_url() ?>index.php/admin/dashboard_admin/report" class="text-muted">Report</a></h4>
    </div>

    <div class="table-responsive">
      <table class="table">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">NO HP</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($sukses as $row){ ?>
            <tr>
              <th scope="row">1</th>
              <td><?= $row->nama ?></td>
              <td><?= $row->alamat ?></td>
              <td><?= $row->no_hp ?></td>
              <td><?= $row->tgl ?></td>
              <td><?= $row->total ?></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
                        

</div>