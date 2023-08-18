@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Profile </h1>
  </div>
  <div class="responsive">
    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="row">
      <div class="col-md-3">
        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="" style="max-height: 400px">
      </div>
      <div class="col-md-5">
        <ul>
          <li>
            <p>Name : {{ auth()->user()->name }} </p>
          </li>
          <li>
            <p>Username : {{ auth()->user()->username }} </p>
          </li>
          <li>
            <p>Gender : {{ auth()->user()->gender }} </p>
          </li>
          <li>
            <p>Age : {{ auth()->user()->age }} </p>
          </li>
          <li>
            <p>Email : {{ auth()->user()->email }} </p>
          </li>
          <li>
            <p>No Handphone : {{ auth()->user()->handphone }} </p>
          </li>
          <li>
            <p>School : {{ auth()->user()->school }} </p>
          </li>
          <li>
            <p>Country : {{ auth()->user()->country }} </p>
          </li>
        </ul>
      </div>
    </div>
    <a href="/dashboard/profile/{{ auth()->user()->username }}/edit" class="btn btn-primary mb-2">Edit Profile</a>
  </div>
@endsection