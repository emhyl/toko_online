
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-2"> 
    <div class="alert alert-info text-center fw-bold" role="alert">
      Barang yang di order 
    </div>      
      <div class="row p-5">
      <?php foreach($order as $rowOrder){ ?>
      <?php if($rowOrder->status == 'order' || $rowOrder->status == 'proses'){ ?>
          <div class="col-sm-4 shadow-sm ">
              <div class="row p-2">
                  <?php foreach($barang as $listOrder  ){ ?>
                  <?php if($listOrder['id_pesanan'] == $rowOrder->id){ ?>
                  <div class="col-6">
                      <img src="<?= base_url() ?>uploads/<?= $listOrder['gambar'] ?>" class="img-thumbnail" alt="...">
                      <span class="badge rounded-pill bg-info text-dark"><?= $listOrder['nama_brg'] ?> <?= $listOrder['item'] ?> Buah</span>
                  </div>
                  <?php }} ?>
              </div>
          </div>
          <div class="col-sm-8 p-2">
              <p class="fst-italic">Tanggal pembelian <?= $rowOrder->tgl ?></p>
              <h6 class="fw-bold">Metode pembayaran : <?= $rowOrder->metode_bayar ?></h6>
              <h6 class="fw-bold">Alamat : <?= $rowOrder->alamat ?></h6>
              <h6 class="fw-bold">Opsi penerimaan barang : <?= $rowOrder->jenis_pengiriman ?></h6>
              <h3 class="text-center">Harga Rp.<?= $rowOrder->total ?></h3>
              <?php if($rowOrder->status == 'order'){ ?>
              <div class="alert alert-warning text-center" role="alert">
                      Menunggu Persetujuan dari penjual.!
              </div>
              <?php }else if($rowOrder->status == 'proses'){ ?>
              <div class="alert alert-success text-center" role="alert">
                <?= ($rowOrder->jenis_pengiriman == "diantarkan")?"Barang akan di antarkan melalui kurirta " : "Silahkan Ambil pesanan di penjual.!" ?>
              </div>
              <?php } ?>
          </div>
      <?php }} ?>
      </div>
    </div>
</section>
