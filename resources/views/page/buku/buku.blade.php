@extends('.layout.main')
@section('title')
Buku
@endsection
@section('judul')
Daftar Buku Perpustakaan
@endsection
@section('button')
<form action="{{ route('buku.create') }}">
	<button type="button" class="btn btn-primary">Tambah Buku</button>	
</form>
@endsection
@section('content')
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
		   <th>No</th>
		   <th>Judul</th>
		   <th>Kategori</th>
		   <th>Rak</th>
		   <th>ISBN</th>
		   <th>Penerbit</th>
		   <th>Penulis</th>
		   <th>Tahun</th>
		</tr>	
	</thead>
	<tbody>
		@foreach($buku as $bk)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $bk->judul }}</td>
				<td>{{ $bk->kategori->nama }}</td>
				<td>{{ $bk->rak->nama }}</td>
				<td>{{ $bk->isbn }}</td>
				<td>{{ $bk->penerbit }}</td>
				<td>{{ $bk->penulis }}</td>
				<td>{{ $bk->tahun }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
