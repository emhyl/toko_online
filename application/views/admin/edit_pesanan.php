<div class="container_fluid px-4">
	<h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

		<form method="post" action="<?php echo base_url().'admin/data_pesanan/update/'.$pesanan->id ?>" enctype="multipart/form-data">

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="idUser">ID USER</label>
			  </div>
			  <select class="custom-select"  name="idUser" id="idUser">
			    <option selected><?= $pesanan->id ?></option>
			    <?php foreach($id_user as $rowUser): ?>
			      <option value="<?= $rowUser->id ?>"><?= $rowUser->nama ?> (<?= $rowUser->id ?>)</option>
			    <?php endforeach ?>
			  </select>
			</div>
			
			<div class="mb-3">
			  <label for="nama" class="form-label">nama</label>
			  <input type="text" class="form-control"  name="nama" value="<?= $pesanan->nama ?>" placeholder="" id="nama">
			</div>
			
			<div class="mb-3">
			  <label for="alamat" class="form-label">alamat</label>
			  <input type="text" class="form-control"  name="alamat" value="<?= $pesanan->alamat ?>" placeholder="" id="alamat">
			</div>
			
			<div class="mb-3">
			  <label for="nohp" class="form-label">no_hp</label>
			  <input type="text" class="form-control"  name="no_hp" value="<?= $pesanan->no_hp ?>" placeholder="" id="nohp">
			</div>
			
			<div class="mb-3">
			  <label for="tgl" class="form-label">tgl</label>
			  <input type="date" class="form-control"  name="tgl" value="<?= $pesanan->tgl ?>" placeholder="" id="tgl">
			</div>
			
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="metode">Status</label>
			  </div>
			  <select class="custom-select"  name="metode_bayar" id="metode">
			    <option selected><?= $pesanan->metode_bayar ?></option>
			    <option value="COD">COD</option>
			    <option value="TRANSFER">TRANSFER</option>
			  </select>
			</div>
			
			<div class="mb-3">
			  <label for="buktiBayar" class="form-label">bukti_pembayaran</label>
			  <input type="file" class="form-control"  name="gambar"  placeholder="" id="buktiBayar">
			  <small class="text-danger">*kosongkan apabila menggunakan metode pembayaran COD</small>
			</div>
			
			<div class="mb-3">
			  <label for="total" class="form-label">total</label>
			  <input type="text" class="form-control"  name="total" value="<?= $pesanan->total ?>" placeholder="" id="total">
			</div>
			
			<div class="mb-3">
			  <label for="status" class="form-label">status</label>
			  <input type="text" class="form-control"  name="status" value="<?= $pesanan->status ?>" placeholder="" id="status">
			</div>

			<button type="submit" class="btn btn-primary btn-sm mb-3">Simpan</button>
			
		</form>

</div>