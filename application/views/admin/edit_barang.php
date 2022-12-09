<div class="container_fluid px-4">
	<h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

		<form method="post" action="<?php echo base_url().'admin/data_barang/update/'.$barang->id_brg ?>" enctype="multipart/form-data">

			<div class="mb-3">
			  <label for="exampleInputnama_brg" class="form-label">nama_brg</label>
			  <input type="text" class="form-control" name="nama_brg" value="<?= $barang->nama_brg ?>" placeholder="" id="exampleInputnama_brg">
			</div>
			
			<div class="mb-3">
			  <label for="exampleInputketerangan" class="form-label">keterangan</label>
			  <input type="text" class="form-control" name="keterangan" value="<?= $barang->keterangan ?>" placeholder="" id="exampleInputketerangan">
			</div>
			
			<div class="mb-3">
			  <label for="exampleInputkategori" class="form-label">kategori</label>
			  <input type="text" class="form-control" name="kategori" value="<?= $barang->kategori ?>" placeholder="" id="exampleInputkategori">
			</div>
			
			<div class="mb-3">
			  <label for="exampleInputharga" class="form-label">harga</label>
			  <input type="text" class="form-control" name="harga" value="<?= $barang->harga ?>" placeholder="" id="exampleInputharga">
			</div>
			
			<div class="mb-3">
			  <label for="exampleInputstok" class="form-label">stok</label>
			  <input type="text" class="form-control" name="stok" value="<?= $barang->stok ?>" placeholder="" id="exampleInputstok">
			</div>
			
			<div class="mb-3">
			  <label for="exampleInputgambar" class="form-label">gambar</label>
			  <input type="file" class="form-control" name="gambar" placeholder="" id="exampleInputgambar">
			</div>

			<button type="submit" class="btn btn-primary btn-sm mb-3">Simpan</button>
			
		</form>

</div>