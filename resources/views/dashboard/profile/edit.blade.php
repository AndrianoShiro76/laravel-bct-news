@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit My Profile </h1>
  </div>
  <div class="row responsive justify-content-evenly">
    {{-- Left Side --}}
    {{-- <div class="col-md-5"> --}}
      <form action="/dashboard/profile/{{ auth()->user()->username }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
      {{-- Name --}}
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', auth()->user()->name) }}">
        @error('name')
          {{ $message }}
        @enderror
      </div>
      {{-- Username --}}
      {{-- <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="username" class="form-control" id="username" name="username" value="{{ old('username', auth()->user()->username) }}">
      </div> --}}
      {{-- Gender --}}
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" name="gender" value="{{ old('gender', auth()->user()->gender) }}">
          <option selected>Open this select menu</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      {{-- Age --}}
      <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="text" class="form-control" id="age" name="age" value="{{ old('age', auth()->user()->age) }}">
      </div>
      {{-- email --}}
      {{-- <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}">
      </div>
    </div> --}}

    {{-- Right Side --}}
    {{-- <div class="col-md-5"> --}}
      {{-- Handphone --}}
      <div class="mb-3">
        <label for="handphone" class="form-label">No. Handphone</label>
        <input type="text" class="form-control" id="handphone" name="handphone" value="{{ old('handphone', auth()->user()->handphone) }}">
      </div>
      {{-- Photo --}}
      <div class="mb-3">
        <label for="image" class="form-label">Photo Profile</label>
        <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}" >
        @if (auth()->user()->image)
          <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-fluid img-preview mb-3 col-sm-5 d-block">
        @else
          <img class="img-fluid img-preview mb-3 col-sm-5">
        @endif
          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
      </div>
      {{-- School --}}
      <div class="mb-3">
        <label for="school" class="form-label">School</label>
        <select class="form-select" name="school" value="{{ old('school', auth()->user()->school) }}">
          <option selected>Open this select menu</option>
          <option value="senior high">Senior High</option>
          <option value="bachelor">Bachelor</option>
          <option value="master">Master</option>
        </select>
      </div>
      {{-- Country --}}
      <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <input type="text" class="form-control" id="country" name="country" value="{{ old('country', auth()->user()->country) }}">
      </div>
      <button type="submit" class="btn btn-primary my-2">Update Profile</button>
      <a href="/dashboard/profile/{{ auth()->user()->username }}/edit" class="btn btn-primary mb-2">Reset</a>
    {{-- </div> --}}
    </form>    
        
  </div>

<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

@endsection