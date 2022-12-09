<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Keranjang</button>
  <?= $this->session->flashdata('sukses') ?>
<table class="table table-bordered">
	<tr>
		<th>NO</th>
		<th>ID USER</th>
		<th>ID BARANG</th>
		<th>ID PESANAN</th>
    <th>ITEM</th>
		<th colspan="3">AKSI</th>
	</tr>

	<?php
	$no=1;
	foreach($cart as $row) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $row->id_user ?></td>
			<td><?php echo $row->id_barang ?></td>
			<td><?php echo $row->id_pesanan ?></td>
      <td><?php echo $row->item ?></td>
			<td><?php echo anchor('admin/data_keranjang/edit/' .$row->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td> 
			<td onclick="confirm('apakah anda yakin.?')"><?php echo anchor('admin/data_keranjang/hapus/' .$row->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
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
        <form action="<?php echo base_url(). 'admin/data_keranjang/tambah_aksi' ?>" method="post">
        
          <div class="mb-3">
            <label for="exampleInputid_user" class="form-label">id_user</label>
            <input type="text" class="form-control" required name="id_user" value="" placeholder="" id="exampleInputid_user">
          </div>
        
          <div class="mb-3">
            <label for="exampleInputid_barang" class="form-label">id_barang</label>
            <input type="text" class="form-control" required name="id_barang" value="" placeholder="" id="exampleInputid_barang">
          </div>
        
          <div class="mb-3">
            <label for="exampleInputid_pesanan" class="form-label">id_pesanan</label>
            <input type="text" class="form-control" required name="id_pesanan" value="" placeholder="" id="exampleInputid_pesanan">
          </div>
        
          <div class="mb-3">
            <label for="exampleInputitem" class="form-label">item</label>
            <input type="text" class="form-control" required name="item" value="" placeholder="" id="exampleInputitem">
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