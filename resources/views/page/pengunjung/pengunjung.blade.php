@extends('.layout.main')
@section('title')
Pengunjung
@endsection
@section('judul')
Daftar Pengunjung
@endsection
@section('content')
<table id="tabel_data" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Instansi</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Tujuan</th>
			<th>Tanggal</th>
		</tr>	
	</thead>
	<tbody>
    @foreach ($pengunjung as $png)
		<tr>
			<td>{{ $loop->iteration }}</td>
      <td>{{ $png->nama }}</td>
      <td>{{ $png->instansi }}</td>
      <td>{{ $png->alamat }}</td>
      <td>{{ $png->jenis_kelamin }}</td>
      <td>{{ $png->tujuan }}</td>
      <td>{{ $png->tanggal }}</td>
		</tr> 
    @endforeach
	</tbody>
</table>
@endsection
