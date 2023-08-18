@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sports News</h1>
  </div>
  <div class="table-responsive">
    <a href="/dashboard/sports/create" class="btn btn-primary mb-2">Create New Post</a>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sports as $sport)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $sport->title }}</td>
          <td>{{ $sport->category->name }}</td>
          <td>
            <a href="/dashboard/sports/{{ $sport->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/sports/{{ $sport->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/sports/{{ $sport->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure delete?')"><span data-feather="x-circle"></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection