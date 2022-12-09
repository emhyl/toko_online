<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah User</button>
  <?= $this->session->flashdata('sukses') ?>
<table class="table table-bordered">
	<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>USERNAME</th>
		<th>PASSWORD</th>
    <th>NO HP</th>
    <th>ALAMAT</th>
		<th>STATUS</th>
		<th colspan="3">AKSI</th>
	</tr>

	<?php
	$no=1;
	foreach($user as $row) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $row->nama ?></td>
			<td><?php echo $row->username ?></td>
			<td><?php echo $row->password ?></td>
      <td><?php echo $row->no_hp ?></td>
      <td><?php echo $row->alamat ?></td>
      <td><?php echo $row->status ?></td>
			<td><?php echo anchor('admin/data_user/edit/' .$row->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td> 
			<td onclick="confirm('apakah anda yakin.?')"><?php echo anchor('admin/data_user/hapus/' .$row->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
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
        <form action="<?php echo base_url(). 'admin/data_user/tambah_aksi' ?>" method="post" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="exampleInputnama" class="form-label">nama</label>
            <input type="text" class="form-control" required name="nama" value="" placeholder="" id="exampleInputnama">
          </div>
        
          <div class="mb-3">
            <label for="exampleInputusername" class="form-label">username</label>
            <input type="text" class="form-control" required name="username" value="" placeholder="" id="exampleInputusername">
          </div>
        
          <div class="mb-3">
            <label for="exampleInputpassword" class="form-label">password</label>
            <input type="text" class="form-control" required name="password" value="" placeholder="" id="exampleInputpassword">
          </div>
        
          <div class="mb-3">
            <label for="exampleInputno_hp" class="form-label">no_hp</label>
            <input type="text" class="form-control" required name="no_hp" value="" placeholder="" id="exampleInputno_hp">
          </div>
        
          <div class="mb-3">
            <label for="exampleInputalamat" class="form-label">alamat</label>
            <input type="text" class="form-control" required name="alamat" value="" placeholder="" id="exampleInputalamat">
          </div>
        
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Status</label>
            </div>
            <select class="custom-select" name="status" id="inputGroupSelect01">
              <option selected>pilih status...</option>
              <option value="admin">admin</option>
              <option value="uaser">user</option>
            </select>
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