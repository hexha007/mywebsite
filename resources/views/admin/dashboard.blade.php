@extends('admin.templet.templet')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center mb-4">Dashboard</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalUsers }}</h5>
                <p class="card-text">Jumlah total pengguna terdaftar.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Total Berita</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalBerita }}</h5>
                <p class="card-text">Jumlah total berita yang dipublikasikan.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Total Kategori</div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalKategori }}</h5>
                <p class="card-text">Jumlah total kategori yang ada.</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <h2>Recent Suggestions</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Suggestion</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentSuggestions as $suggestion)
                    <tr>
                        <td>{{ $suggestion->id }}</td>
                        <td>{{ $suggestion->name }}</td>
                        <td>{{ $suggestion->email }}</td>
                        <td>{{ strip_tags($suggestion->message) }}</td>
                        <td>{{ $suggestion->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
