@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">
      <main class="form-registration">
          <h1 class="h3 mb-3 fw-normal text-center">Create your BCT account</h1>
          <small class="d-block text-center mt-3">Already an account? <a href="/login">Login now.</a></small>
            <form action="/register" method="post">
              @csrf
                {{-- Name --}}
                <div class="form-floating mb-4">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name">
                  <label for="name">Name</label>
                  @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
  
                {{-- Username --}}
                <div class="form-floating mb-4">
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username">
                  <label for="username">Username</label>
                  @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                
                {{-- Email --}}
                <div class="form-floating mb-4">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com">
                  <label for="email">Email address</label>
                  @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>

                {{-- Image --}}
                {{-- <div class="form-floating mb-3">
                  <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                  <label for="image" class="form-label image">Photo</label>
                  <img class="img-fluid img-preview mb-3 col-sm-5">
                </div> --}}
  
                {{-- Password --}}
                <div class="form-floating mb-4">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password">
                  <label for="password">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
            
              {{-- Register Buttton --}}
              <div class="terms">
                <p>By clicking 'Register', you agree to the Terms of Use and you acknowledge that you have read our Privacy Policy. You further acknowledge that CNN and WarnerMedia affiliates may use your email address for marketing, ads and other offers.</p>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
            
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017–2021</p>
        </main>
    </div>
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