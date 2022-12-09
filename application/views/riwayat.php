
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-2"> 
    <div class="alert alert-info text-center fw-bold" role="alert">
      Riwayat pembelian 
    </div>      
      <div class="row p-5">
      <?php foreach($order as $rowOrder){ ?>
      <?php if($rowOrder->status == 'sukses'){ ?>
          <div class="col-sm-4 shadow-sm ">
              <div class="row p-2">
                  <?php foreach($barang as $listOrder  ){ ?>
                  <?php if($listOrder['id_pesanan'] == $rowOrder->id){ ?>
                  <div class="col-6">
                      <img src="<?= base_url() ?>uploads/<?= $listOrder['gambar'] ?>" class="img-thumbnail" alt="...">
                      <span class="badge rounded-pill bg-info text-dark"><?= $listOrder['nama_brg'] ?> <?= $listOrder['item'] ?> 
                  </div>
                  <?php }} ?>
              </div>
          </div>
          <div class="col-8 p-2">
              <h3 class="text-center">
                <p class="fst-italic">Tanggal pembelian <?= $rowOrder->tgl ?></p>
                <span class="badge bg-danger">Harga Rp.<?= $rowOrder->total ?></span>
              </h3>
          </div>
      <?php }} ?>
      </div>
    </div>
</section>
