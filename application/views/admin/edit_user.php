<div class="container_fluid px-4">
	<h3><i class="fas fa-edit"></i>EDIT DATA USER</h3>

		<form method="post" action="<?php echo base_url().'index.php/admin/data_user/edit/'.$user->id ?>">

			<div class="mb-3">
			  <label for="exampleInputnama" class="form-label">nama</label>
			  <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" placeholder="" id="exampleInputnama">
			</div>
			
			<div class="mb-3">
			  <label for="exampleInputusername" class="form-label">username</label>
			  <input type="text" class="form-control" name="username" value="<?= $user->username ?>" placeholder="" id="exampleInputusername">
			</div>
			ss
			
			<div class="mb-3">
			  <label for="exampleInputno_hp" class="form-label">no_hp</label>
			  <input type="text" class="form-control" name="no_hp" value="<?= $user->no_hp ?>" placeholder="" id="exampleInputno_hp">
			</div>
			
			<div class="mb-3">
			  <label for="exampleInputalamat" class="form-label">alamat</label>
			  <input type="text" class="form-control" name="alamat" value="<?= $user->alamat ?>" placeholder="" id="exampleInputalamat">
			</div>
			
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">pilih status...</label>
			  </div>
			  <select class="custom-select" name="status" id="inputGroupSelect01">
			    <option selected><?= $user->status ?></option>
			    <option value="admin">admin</option>
			    <option value="uaser">user</option>
			  </select>
			</div>

			<button type="submit" name="btn-edit" class="btn btn-primary btn-sm mt-3">Simpan</button>
			
		</form>
	
</div>