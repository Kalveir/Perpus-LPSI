@extends('.layout.main')
@section('title')
Buku
@endsection
@section('judul')
Daftar Buku Perpustakaan
@endsection
@section('button')
<a href="{{ route('buku.create') }}" class="btn btn-primary">
	<i class="fas fa-plus"></i><span>Tambah Buku</span>
</a>
@endsection
@section('content')
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
		   <th>No</th>
			 <th>Sampul</th>
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
				<td>{{ $bk->sampul }}</td>
				<td>{{ $bk->judul }}</td>
				<td>{{ $bk->kategori->nama }}</td>
				<td>{{ $bk->rak->nama }}</td>
				<td>{{ $bk->isbn }}</td>
				<td>{{ $bk->penerbit }}</td>
				<td>{{ $bk->penulis }}</td>
				<td>{{ $bk->tahun }}</td>
				<td>
					<form action="{{ route('buku.info') }}">
						<button class="btn btn-primary-outline"><i class="fas fa-info"></i></button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
