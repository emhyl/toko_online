<?php $total = 0; ?>
<?php $btn = false; ?>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-2">

        
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link fs-4 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                        <i class="bi-cart-fill me-1"></i>
                        Keranjang
                    </button>
                  </li>
            <!--       <li class="nav-item" role="presentation">
                    <button class="nav-link fs-4" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-shopping-bag"></i> Orderan</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link fs-4" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-history"></i> Riwayat</button>
                  </li> -->
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- tab mycart -->
                     <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">   
                        <?php foreach($barang as $rowBarang): ?> 
                        <?php if($rowBarang['id_pesanan'] == null){ ?>
                        <?php $total = $total + ($rowBarang['harga']*$rowBarang['item']);$btn = true ?>
                          <div class="col mb-5">
                              <div class="card h-100">
                                  <!-- Product image-->
                                  <img class="card-img-top" src="<?= base_url() ?>uploads/<?= $rowBarang['gambar'] ?>" style="height:150px" alt="..." />

                                  <div class="card-body p-4">
                                      <div class="text-center">
                                          <!-- Product name-->
                                          <h5 class="fw-bolder"><?= $rowBarang['nama_brg'] ?></h5>
                                          <h5 class="fw-bolder"><?= $rowBarang['item'] ?> Buah</h5>
                                          <span class="badge bg-info text-dark">Rp. <?= $rowBarang['harga'] ?></span>
                                          <div>
                                              <button type="button" class="btn btn-link">
                                              <a href="<?= base_url() ?>index.php/dashboard/hapus_keranjang/<?= $rowBarang['id'] ?>">
                                                <i class="fas fa-question-circle"></i> Hapus
                                              </a>
                                              </button>
                                          </div>


                                      </div>
                                  </div>

                              </div>
                          </div>
                        <?php } ?>
                        <?php endforeach; ?>
                        </div>
                        <?php if($btn){ ?>
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                              Checkout
                            </button>
                        <?php } ?>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Atur alamat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="alert alert-info" role="alert">
                                  Jika anda memilih metode pembayaran <span class="fw-bold">Transfer,</span> ke nomor rekening berikut <span class="fw-bold fst-italic">BNI 750300544</span> 
                                </div>
                                <form action="<?= base_url('index.php/dashboard/order') ?>" method="post"  enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" value="<?= $user->id ?>" name="id_user">
                                    <div class="mb-3">
                                      <label for="nama" class="form-label">Nama</label>
                                      <input type="text" required name="nama" class="form-control" value="<?= $user->nama ?>" id="nama" placeholder="Masukkan nama anda">
                                    </div><div class="mb-3">
                                      <label for="alamat" class="form-label">Alamat</label>
                                      <input type="text" required name="alamat" class="form-control" id="alamat" value="<?= $user->alamat ?>" placeholder="Masukkan alamat anda">
                                    </div>
                                    <div class="mb-3">
                                      <label for="noHp" class="form-label">Nomor Telpon</label>
                                      <input type="text" required name="no_hp" class="form-control" id="noHp" value="<?= $user->no_hp ?>" placeholder="Masukkan alamat anda">
                                    </div>
                                    <select class="form-select form-select-sm" name="metode_pembayaran" id="select" aria-label=".form-select-sm example">
                                      <option selected>Metode Bayar</option>
                                      <option value="COD">COD</option>
                                      <option value="TRANSFER">TRANSFER</option>
                                    </select>
                                    <select class="form-select form-select-sm my-2" name="jenis_pengiriman" id="select" aria-label=".form-select-sm example">
                                      <option selected>Opsi Penerimaan Barang</option>
                                      <option value="ambil sendiri">ambil sendiri</option>
                                      <option value="diantarkan">diantarkan</option>
                                    </select>
                                    <div class="mb-3" id="in-img">
                                      <label for="formFileSm" class="form-label">Foto bukti pembayaran</label>
                                      <input class="form-control form-control-sm" name="gambar" id="formFileSm" type="file">
                                    </div>
                                    <div class="mb-5" id="in-img">
                                      <label for="total" class="form-label fw-bold">Total Rp.<?= $total ?></label>
                                      <input class="form-control form-control-sm" name="total" value="<?= $total ?>" id="total" type="hidden">
                                    </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                              </div>
                                </form>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- end maycart -->
                </div>
            </div>
        </section>
     <script type="text/javascript">
       let select = document.getElementById('select');
       let imgBox = document.getElementById('in-img');
       select.addEventListener("change",function(){
         if(this.value == 'COD'){
               imgBox.style.display = "none"
         }else if(this.value == 'TRANSFER'){
           imgBox.style.display = "block"
         }
       });
     </script>