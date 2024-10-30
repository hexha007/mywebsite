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
        <a href="{{ route('admintags.create') }}" class="btn btn-primary mb-3">Create Tag</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="card-body">


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Tag</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->nama_tag }}</td>
                    <td>
                        <a href="{{ route('admintags.edit', $tag->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admintags.destroy', $tag->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        

    </div>
</div>

<div class="d-flex justify-content-center">
    {!! $tags->links('pagination::bootstrap-5') !!}
</div>
@endsection
