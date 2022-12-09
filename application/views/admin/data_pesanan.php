<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Pesanan</button>
  <?= $this->session->flashdata('sukses') ?>
<table class="table table-bordered">
	<tr>
		<th>NO</th>
		<th>ID_USER</th>
		<th>NAMA</th>
		<th>ALAMAT</th>
		<th>NO_HP</th>
    <th>TANGGAL</th>
    <th>METODE BAYAR</th>
    <th>BUKTI PEMBAYARAN</th>
    <th>TOTAL</th>
		<th>STATUS</th>
		<th colspan="3">AKSI</th>
	</tr>

	<?php
	$no=1;
	foreach($pesanan as $roq) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $roq->id_user ?></td>
			<td><?php echo $roq->nama ?></td>
			<td><?php echo $roq->alamat ?></td>
			<td><?php echo $roq->no_hp ?></td>
      <td><?php echo $roq->tgl ?></td>
      <td><?php echo $roq->metode_bayar ?></td>
      <td><?php echo $roq->bukti_pembayaran ?></td>
      <td><?php echo $roq->total ?></td>
			<td><?php echo $roq->status ?></td>
			<td><?php echo anchor('admin/data_pesanan/edit/' .$roq->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td> 
			<td><?php echo anchor('admin/data_pesanan/hapus/' .$roq->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
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
        <form action="<?php echo base_url(). 'admin/data_pesanan/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="idUser">ID USER</label>
            </div>
            <select class="custom-select" required name="idUser" id="idUser">
              <option selected>Pilih...</option>
              <?php foreach($id_user as $rowUser): ?>
                <option value="<?= $rowUser->id ?>"><?= $rowUser->id ?></option>
              <?php endforeach ?>
            </select>
          </div>
  
          <div class="mb-3">
            <label for="nama" class="form-label">nama</label>
            <input type="text" class="form-control" required name="nama" value="" placeholder="" id="nama">
          </div>
          
          <div class="mb-3">
            <label for="alamat" class="form-label">alamat</label>
            <input type="text" class="form-control" required name="alamat" value="" placeholder="" id="alamat">
          </div>
          
          <div class="mb-3">
            <label for="nohp" class="form-label">no_hp</label>
            <input type="text" class="form-control" required name="no_hp" value="" placeholder="" id="nohp">
          </div>
          
          <div class="mb-3">
            <label for="tgl" class="form-label">tgl</label>
            <input type="date" class="form-control" required name="tgl" value="" placeholder="" id="tgl">
          </div>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="metode">Status</label>
            </div>
            <select class="custom-select" required name="metode_bayar" id="metode">
              <option selected>Metode pembayaran...</option>
              <option value="COD">COD</option>
              <option value="TRANSFER">TRANSFER</option>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="buktiBayar" class="form-label">bukti_pembayaran</label>
            <input type="file" class="form-control"  name="gambar" value="" placeholder="" id="buktiBayar">
            <small class="text-danger">*kosongkan apabila menggunakan metode pembayaran COD</small>
          </div>
          
          <div class="mb-3">
            <label for="total" class="form-label">total</label>
            <input type="text" class="form-control" required name="total" value="" placeholder="" id="total">
          </div>
          
          <div class="mb-3">
            <label for="status" class="form-label">status</label>
            <input type="text" class="form-control" required name="status" value="" placeholder="" id="status">
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