@extends('.layout.main')
@section('title')
Dashboard
@endsection
@section('judul')
Dashboard
@endsection
@section('content')
	<span>{{ $pengunjung }}</span>
	<span>{{ $buku }}</span>
	<span>{{ $pinjam }}</span>
	<span>{{ $pengembalian }}</span>
	
@endsection
