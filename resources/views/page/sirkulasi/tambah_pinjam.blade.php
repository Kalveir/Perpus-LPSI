@extends('.layout.main')
@section('title')
Tambah Peminjaman
@endsection
@section('judul')
Tambah Peminjaman
@endsection
@section('content')
<form action="#" method="POST">
  @csrf
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Peminjam : </label>
          <input class="form-control" type="text" placeholder="Nama Peminjam" autofocus name="nama" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Pinjam : </label>
          <input class="form-control" type="date" placeholder="Tanggal Pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Lama Peminjaman :</label>
          <input class="form-control" type="number" placeholder="Lama Pinjam" name="lama" required>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tableModal"
      title="Open User Selection Modal"><i class="fas fa-book-medical"></i>
       Pilih Buku
      </button>
      <div class="table-responsive">
        <br>
          <table class="table table-bordered table-striped" id="mainTable">
              <thead class="thead-grey">
                  <tr>
                      <th>No.</th>
                      <th>Buku</th>
                      <th>Penulis</th>
                      <th>Tahun</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody style="width: 200px;" id="tabelutama" name="data_tabel">
                  <!-- Main table content will be populated dynamically -->
              </tbody>
          </table>
      </div>
        <div class="col-md-4">
          <button class="btn btn-block btn-primary" type="submit">Simpan</button>
        </div>
    </div>
  </div>
</form>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="tableModal"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tableModalLabel">Pemilihan Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Tahun Terbit</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $bk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bk->judul }}</td>
                                    <td>{{ $bk->penulis }}</td>
                                    <td>{{ $bk->tahun }}</td>
                                    <td>{{ $bk->jumlah }}</td>
                                    <td>
                                        <button class="btn btn-success"
                                            onclick="pilihData('{{ $bk->id }}//{{ $bk->judul }}//{{ $bk->penulis }}//{{ $bk->tahun }}')">Pilih</button>
                                            <input type="hidden" name="data[{{ $bk->id }}][id]" value="{{ $bk->id }}">    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
