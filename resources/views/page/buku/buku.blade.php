@extends('.layout.main')
@section('title')
Buku
@endsection
@section('judul')
Daftar Buku Perpustakaan
@endsection
@section('button')
<a href="{{ route('buku.create') }}" class="btn btn-outline-primary">
	<i class="fas fa-plus"></i><span>Tambah Buku</span>
</a>
@endsection
@section('content')
<div class="row table-responsive">
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
				 <th>Aksi</th>
			</tr>	
		</thead>
		<tbody>
			@foreach($buku as $bk)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>
						<img src="{{ asset('storage/sampul/' . $bk->sampul) }}"
						width="100px"
						height="auto"
						alt="sampul_buku">
						
					</td>
					<td>{{ $bk->judul }}</td>
					<td>{{ $bk->kategori->nama }}</td>
					<td>{{ $bk->rak->nama }}</td>
					<td>{{ $bk->isbn }}</td>
					<td>{{ $bk->penerbit }}</td>
					<td>{{ $bk->penulis }}</td>
					<td>{{ $bk->tahun }}</td>
					<td>
						<div class="d-flex center-content-between">
							<form action="{{ route('buku.info',$bk->id) }}">
								@csrf
								<button class="btn btn-outline-primary"><i class="fas fa-info"></i></button>
							</form>
							<form action="{{ route('buku.destroy',$bk->id) }}" method="POST">
								@csrf
								@method('DELETE')
								<button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
							</form>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
