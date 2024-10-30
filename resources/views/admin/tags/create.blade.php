@extends('admin.templet.templet')

@section('content')

<div class="pagetitle">
    <h1>Tags</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Tags</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<div class="card">
    <div class="card-header">
        <h5>Create Tags</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admintags.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_tag">Nama Tag</label>
            <input type="text" name="nama_tag" class="form-control" value="{{ old('nama_tag') }}">
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>

    </div>
</div>


@endsection
