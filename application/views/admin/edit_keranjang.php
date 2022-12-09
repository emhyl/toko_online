<div class="container_fluid px-4">
	<h3><i class="fas fa-edit"></i>EDIT DATA KERANJANG</h3>

		<form method="post" action="<?php echo base_url().'index.php/admin/data_keranjang/edit/'.$cart->id ?>">

			<div class="mb-3">
			  <label for="idUser" class="form-label">Id User</label>
			  <input type="text" class="form-control" name="id_user" value="<?= $cart->id_user ?>" placeholder="" id="idUser">
			</div>
			
			<div class="mb-3">
			  <label for="idBarang" class="form-label">id_barang</label>
			  <input type="text" class="form-control" name="id_barang" value="<?= $cart->id_barang ?>" placeholder="" id="idBarang">
			</div>
			
			<div class="mb-3">
			  <label for="idPesanan" class="form-label">id_pesanan</label>
			  <input type="text" class="form-control" name="id_pesanan" value="<?= $cart->id_pesanan ?>" placeholder="" id="idPesanan">
			</div>
			
			<div class="mb-3">
			  <label for="item" class="form-label">item</label>
			  <input type="text" class="form-control" name="item" value="<?= $cart->item ?>" placeholder="" id="item">
			</div>

			<button type="submit" name="btn-edit" class="btn btn-primary btn-sm mt-3">Simpan</button>
			
		</form>
	
</div>