        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <?= $this->session->flashdata('err_stok'); ?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach($barang as $rowBarang):?>
                    <div class="col mb-5">
                        <div class="card h-100  <?= ($rowBarang->stok == 0)?'border border-danger border-3':''; ?>">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= base_url() ?>uploads/<?= $rowBarang->gambar ?>" style="height: 200px" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $rowBarang->nama_brg ?></h5>
                                    <!-- Product reviews-->
                                    <!-- <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div> -->
                                    <!-- Product price-->
                                    Rp.<?= $rowBarang->harga ?>
<!--                                     <p><a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#modal<?=$rowBarang->id_brg ?>"><i class="fas fa-question-circle"></i> Detail</a></p> -->
                                    <div>
                                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modal<?=$rowBarang->id_brg ?>">
                                          <i class="fas fa-question-circle"></i> Detail
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?=$rowBarang->id_brg ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?= $rowBarang->nama_brg ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="card" style="width: 18rem; margin: auto;">
                                              <img src="<?= base_url() ?>uploads/<?= $rowBarang->gambar ?>" class="card-img-top" alt="...">
                                              <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">STOK : <?= $rowBarang->stok ?></li>
                                                    <li class="list-group-item"><?= $rowBarang->keterangan ?></li>
                                                    <li class="list-group-item">KATEGORI : <?= $rowBarang->kategori ?></li>
                                                  </ul>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                </div>
                            </div>
                            <!-- Product actions-->

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?= base_url() ?>index.php/dashboard/addcart/<?= $this->session->userdata('idUser') ?>/<?= $rowBarang->id_brg ?>"> <i class="bi bi-cart-plus-fill"></i> Keranjang</a></div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </section>
     