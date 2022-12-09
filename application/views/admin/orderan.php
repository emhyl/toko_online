<div class="container-fluid">
	<div class="alert alert-dark text-center" role="alert">
	  Orderan
	</div>
	<div class="row row-cols-1 row-cols-md-3 g-4">
	<?php if(count($orderan)>0){ ?>
	<?php foreach($orderan as $rowOrder){ ?>
	  <div class="col">
	    <div class="card h-100">
		    <div class="row">
		    	<?php foreach($all_cart as $rowCart){ ?>
		    	<?php if($rowOrder->id == $rowCart->id_pesanan){ ?>
				<div class="col-6">
					<img src="<?= base_url() ?>uploads/<?= $rowCart->gambar ?>" class="card-img-top" alt="...">
				</div>
				<?php }} ?>
		    </div>
	      <div class="card-body">
	      	<div class="alert alert-info" role="alert">
      	      	<?php foreach($all_cart as $rowCart){ ?>
      	      	<?php if($rowOrder->id == $rowCart->id_pesanan){ ?>
	      	  		<?= $rowCart->nama_brg ?>,
      	  		<?php }} ?>
	      	</div>
	        <h5 class="card-title">Total : Rp.<?= $rowOrder->total ?></h5>
	        <h5 class="card-title">Nama : <?= $rowOrder->nama ?></h5>
	        <h5 class="card-title">Alamat : <?= $rowOrder->alamat ?></h5>
	        <h5 class="card-title">No Hp : <?= $rowOrder->no_hp ?></h5>
	        <h5 class="card-title">Tgl Pemesanan : <?= $rowOrder->tgl ?></h5>
	        <h5 class="card-title">Opsi Penerimaan Barang : <?= $rowOrder->jenis_pengiriman ?></h5>
	        <?php if($rowOrder->metode_bayar == "COD"){ ?>
	        	<h6 class="badge bg-danger text-light">COD</h6>
	        <?php }else{ ?>
	        	<h6 class="badge bg-danger text-light">TRANSFER</h6>
	        	<!-- Button trigger modal -->
	        	
	        	<a href="#" class="text-danger" data-toggle="modal" data-target="#bukti<?= $rowOrder->id ?>">
	        	  Lihat Bukti Pembayaran
	        	</a>

	        	<!-- Modal -->
	        	<div class="modal fade" id="bukti<?= $rowOrder->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	        	  <div class="modal-dialog">
	        	    <div class="modal-content">
	        	      <div class="modal-header">
	        	        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
	        	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        	          <span aria-hidden="true">&times;</span>
	        	        </button>
	        	      </div>
	        	      <div class="modal-body">
	        	      	<img src="<?= base_url() ?>uploads/bukti_bayar/<?= $rowOrder->bukti_pembayaran ?>" width="300" class="rounded mx-auto d-block" alt="...">
	        	      </div>
	        	      <div class="modal-footer">
	        	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        	      </div>
	        	    </div>
	        	  </div>
	        	</div>
	        <?php } ?>
	        <div class="text-center">
	    		<a href="<?= base_url() ?>admin/orderan/setuju/<?= $rowOrder->id ?>" class="btn btn-outline-primary w-100">Setujui</a>
	        </div>
	      </div>
	    </div>
	  </div>
	  <?php } ?>
	  <?php }else{ ?>
	  		<div class="alert alert-info" role="alert">
	  		  Belum ada orderan 
	  		</div>
	  <?php } ?>	  
	</div>

	<div class="alert alert-dark text-center mt-3" role="alert">
	  DI SETUJUI
	</div>
		<div class="row row-cols-1 row-cols-md-3 g-4">
		<?php if(count($proses)>0){ ?>
		<?php foreach($proses as $rowProses){ ?>
		  <div class="col">
		    <div class="card h-100">
			    <div class="row">
			    	<?php foreach($all_cart as $rowCart){ ?>
			    	<?php if($rowProses->id == $rowCart->id_pesanan){ ?>
					<div class="col-6">
						<img src="<?= base_url() ?>uploads/<?= $rowCart->gambar ?>" class="card-img-top" alt="...">
					</div>
					<?php }} ?>
			    </div>
		      <div class="card-body">
		      	<div class="alert alert-info" role="alert">
	      	      	<?php foreach($all_cart as $rowCart){ ?>
	      	      	<?php if($rowProses->id == $rowCart->id_pesanan){ ?>
		      	  		<?= $rowCart->nama_brg ?>,-
	      	  		<?php }} ?>
		      	</div>
		        <h5 class="card-title">Total : Rp.<?= $rowProses->total ?></h5>
		        <h5 class="card-title">Nama : <?= $rowProses->nama ?></h5>
		        <h5 class="card-title">Alamat : <?= $rowProses->alamat ?></h5>
		        <h5 class="card-title">No Hp : <?= $rowProses->no_hp ?></h5>
		        <h5 class="card-title">Tgl Pemesanan : <?= $rowProses->tgl ?></h5>
		        <h5 class="card-title">Opsi Penerimaan Barang : <?= $rowProses->jenis_pengiriman ?></h5>
		        <?php if($rowProses->metode_bayar == "COD"){ ?>
		        	<h6 class="badge bg-danger text-light">COD</h6>
		        <?php }else{ ?>
		        	<h6 class="badge bg-danger text-light">TRANSFER</h6>
		        	<!-- Button trigger modal -->
		        	<a href="#" class=" text-danger" data-toggle="modal" data-target="#bukti<?= $rowProses->id ?>">
		        	  Lihat Bukti Pembayaran
		        	</a>

		        	<!-- Modal -->
		        	<div class="modal fade" id="bukti<?= $rowProses->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		        	  <div class="modal-dialog">
		        	    <div class="modal-content">
		        	      <div class="modal-header">
		        	        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
		        	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        	          <span aria-hidden="true">&times;</span>
		        	        </button>
		        	      </div>
		        	      <div class="modal-body">
		        	        <?= $rowProses->id ?>
		        	      </div>
		        	      <div class="modal-footer">
		        	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        	        <button type="button" class="btn btn-primary">Save changes</button>
		        	      </div>
		        	    </div>
		        	  </div>
		        	</div>
		        <?php } ?>
		        <div class="alert alert-info" role="alert">
		        	Pilih selesai apabila pesanan telah di ambil oleh pembeli
		        </div>
		        <div class="text-center">
		    		<a href="<?= base_url() ?>admin/orderan/selesai/<?= $rowProses->id ?>" class="btn btn-outline-primary w-100">Selesai</a>
		        </div>
		      </div>
		    </div>
		  </div>
		  <?php } ?>
		  <?php }else{ ?>
		  		<div class="alert alert-info" role="alert">
		  		  Belum ada yang di setujui 
		  		</div>
		  <?php } ?>	  
		</div>
	
</div>