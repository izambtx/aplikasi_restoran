<!DOCTYPE html>
<html>
<head>
	<title>La Restaurant - INDEX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1cldHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
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
	            <a class="nav-link ml-3 btn" href="{{url('makananIndex')}}">Masakan <span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link ml-3 btn" href="{{url('jenisIndex')}}">Jenis Masakan</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link ml-3 btn" href="{{url('levelIndex')}}">Level</a>
	          </li>
	        </ul>
	        <form class="form-inline">
			  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
	      </div>
  	</nav>
	<div class="float-right mt-2">
        <a class="btn btn-info" href="{{url('makananIndex/tambah')}}" role="button" data-toggle="modal" data-target=#tambahmasakan>Tambah Data</a>
    </div>
	<table class=" table table-bordered">
		<thead align="center" class="thead-light">
			<tr>
				<th scope="col">ID Masakan</th>
				<th scope="col">Nama</th>
				<th scope="col">Harga</th>
				<th scope="col">Status</th>
				<th scope="col">Jenis Masakan</th>
				<th scope="col">Proses</th>
			</tr>
		</thead>

		<tbody>
			@foreach($makanan as $m)
			<tr>
				<td>{{ $m->id_makanan }}</td>
				<td>{{ $m->nama_makanan }}</td>
				<td>{{ $m->harga_makanan }}</td>
				<td>{{ $m->status_makanan }}</td>
				<td>{{ $m->macam_makanan }}</td>
				<td>
					<a class="btn btn-warning" href="{{url('/makanan/edit')}}/{{ $m->id_makanan }}" role="button">Edit</a>
					|
					<a class="btn btn-danger" href="{{url('/makanan/hapus')}}/{{ $m->id_makanan }}" role="button">Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

  <div class="modal fade" id="tambahmasakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Masakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- isi modal -->
  <div>
  <h3 align="center">Silakan Isi data Masakan</h3>
  <br><br>
    <form method="POST" role="form" action="{{url('/makanan/tambah')}}" enctype="multipart/form-data" >
      {{csrf_field()}}
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nama Masakan</label>
        <div class="col-sm-10">
          <input type="text" name="frm_nama" class="form-control" id="staticEmail" required placeholder="Nama Masakan">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail2" class="col-sm-2 col-form-label">Harga Masakan</label>
        <div class="col-sm-10">
          <input type="text" required name="frm_harga" class="form-control" id="staticEmail2" placeholder="Harga Masakan">
        </div>
    </div>
        <div class="form-group row">
        <label for="staticEmail2" class="col-sm-2 col-form-label">Status Masakan</label>
        <div class="col-sm-10">
          <input type="text" required name="frm_status" class="form-control" id="staticEmail2" placeholder="Status Masakan">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail2" class="col-sm-2 col-form-label">Jenis Masakan</label>
        <select class="col-sm-10 form-control" required name="frm_jen" id="staticEmail2">
        @foreach($makanan as $jen)
          <option value="{{$jen->id_jenis}}">{{$jen->macam_makanan}}</option>
        @endforeach
        </select>
    </div>
    <!--
    <div class="form-group row">
        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
          <input type="file" required name="frm-img" class="form-control-file" id="gambar">
        </div>
    </div>
    <br>
 akhir isi modal -->
      
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
</body>
</html>