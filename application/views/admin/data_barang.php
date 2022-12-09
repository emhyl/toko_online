<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
  <?= $this->session->flashdata('sukses') ?>
<table class="table table-bordered">
	<tr>
		<th>NO</th>
		<th>NAMA BARANG</th>
		<th>KETERANGAN</th>
		<th>KATEGORI</th>
		<th>HARGA</th>
    <th>STOK</th>
		<th>GAMBAR</th>
		<th colspan="3">AKSI</th>
	</tr>

	<?php
	$no=1;
	foreach($barang as $brg) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $brg->nama_brg ?></td>
			<td><?php echo $brg->keterangan ?></td>
			<td><?php echo $brg->kategori ?></td>
			<td><?php echo $brg->harga ?></td>
      <td><?php echo $brg->stok ?></td>
			<td><?php echo $brg->gambar ?></td>
			<td><?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td> 
			<td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
		</tr>

	<?php endforeach; ?>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form input</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
          
          <div class="mb-3">
            <label for="exampleInputnama_brg" class="form-label">nama_brg</label>
            <input type="text" class="form-control" required name="nama_brg" value="" placeholder="" id="exampleInputnama_brg">
          </div>
          
          <div class="mb-3">
            <label for="exampleInputketerangan" class="form-label">keterangan</label>
            <input type="text" class="form-control" required name="keterangan" value="" placeholder="" id="exampleInputketerangan">
          </div>
          
          <div class="mb-3">
            <label for="exampleInputkategori" class="form-label">kategori</label>
            <input type="text" class="form-control" required name="kategori" value="" placeholder="" id="exampleInputkategori">
          </div>
          
          <div class="mb-3">
            <label for="exampleInputharga" class="form-label">harga</label>
            <input type="text" class="form-control" required name="harga" value="" placeholder="" id="exampleInputharga">
          </div>
          
          <div class="mb-3">
            <label for="exampleInputstok" class="form-label">stok</label>
            <input type="text" class="form-control" required name="stok" value="" placeholder="" id="exampleInputstok">
          </div>
          
          <div class="mb-3">
            <label for="exampleInputgambar" class="form-label">gambar</label>
            <input type="file" class="form-control" required name="gambar" value="" placeholder="" id="exampleInputgambar">
          </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
     
     </form>


    </div>
  </div>
</div>