<!DOCTYPE html>
<html>
<head>
	<title>La Restaurant - INDEX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1cldHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">La Restaurant</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	      <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item">
	            <a class="nav-link ml-3 btn" href="<?php echo e(url('makananIndex')); ?>">Masakan <span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link ml-3 btn" href="<?php echo e(url('jenisIndex')); ?>">Jenis Masakan</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link ml-3 btn" href="<?php echo e(url('levelIndex')); ?>">Level</a>
	          </li>
	        </ul>
	        <form class="form-inline">
			  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
	      </div>
  	</nav>
	<div class="float-right mt-2">
        <a class="btn btn-info" href="<?php echo e(url('levelIndex/tambah')); ?>" role="button" data-toggle="modal" data-target=#tambahlevel>Tambah Data</a>
    </div>
	<table class=" table table-bordered">
		<thead align="center" class="thead-light">
			<tr>
				<th scope="col">ID Level</th>
				<th scope="col">Nama Level</th>
				<th scope="col">Proses</th>
			</tr>
		</thead>

		<tbody>
			<?php $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td class="text-center"><?php echo e($l->id_level); ?></td>
				<td class="text-center"><?php echo e($l->nama_level); ?></td>
				<td>
					<a class="btn btn-warning btn-center" href="<?php echo e(url('/levelIndex/ubah')); ?>/<?php echo e($l->id_level); ?>" role="button">Edit</a>
					|
					<a class="btn btn-danger btn-center" href="<?php echo e(url('/levelIndex/hapus')); ?>/<?php echo e($l->id_level); ?>" role="button">Hapus</a>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

  <div class="modal fade" id="tambahlevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Level</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- isi modal -->
  <div>
  <h3 align="center">Silakan Isi data level</h3>
  <br><br>
    <form method="POST" role="form" action="<?php echo e(url('/levelIndex/tambah')); ?>" enctype="multipart/form-data" >
      <?php echo e(csrf_field()); ?>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ID Level</label>
        <div class="col-sm-10">
          <input type="text" name="frm_id" class="form-control" id="staticEmail" required placeholder="ID Level">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Level</label>
        <div class="col-sm-10">
          <input type="text" name="frm_nama" class="form-control" id="staticEmail" required placeholder="Nama Level">
        </div>
    </div>   
    <!--akhir isi modal -->
      
            <div class="modal-footer">
              <button  type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modalEdit" class="modal fade bd-example-modal-xl">
    <div class="modal-dialog modal-l">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Edit Data Level</h3>
          <button type="button" data-dismiss="modal" class="close btn-danger" aria-label="close">
            X
          </button>
        </div>
        <div class=" modal-body">
          <form method="post" action="<?php echo e(url('/levelIndex/ubah/save')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <input id="id" class="form-control" type="hidden" name="id">
              <label for="frm_nama">nama_level</label>
              <input id="edit_nama" class="form-control" type="text" name="edit_nama">
            </div>
             <button type="reset" class="btn btn-warning float-right">Reset</button>
             <button type="submit" class="btn btn-success float-right mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html><?php /**PATH C:\xampp2\htdocs\aplikasi_restoran\resources\views/levelIndex.blade.php ENDPATH**/ ?>