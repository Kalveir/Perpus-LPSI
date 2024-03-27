@extends('.layout.main')
@section('title')
Peminjaman Buku
@endsection
@section('judul')
Daftar Peminjaman Buku
@endsection
@section('button')
<a href="{{ route('sirkulasi.tambah') }}" class="btn btn-primary">
	<i class="fas fa-plus"></i><span>Tambah Peminjaman</span>
</a>
@endsection
@section('content')
<div class="row table-responsive">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Jumlah Buku</th>
        <th>Denda</th>
        <th>Aksi</th>
      </tr>	
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
