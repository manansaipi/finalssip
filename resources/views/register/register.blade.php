<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <title>Document</title>
</head>
<body>
 <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="/register" method="post">
                  @csrf
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required value="{{ old('name') }}" type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" />
                      <label class="form-label" for="form3Example1c">Your Name</label>

                      @error('name')
                       <div class="invalid-feedback">
                       {{ $message }}
                        </div>
                      @enderror
                    </div> 
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required value="{{ old('username') }}" type="text" id="username" name="username" class="form-control  @error('username') is-invalid @enderror" " />
                      <label class="form-label" for="form3Example1c">Username</label>

                          @error('username')
                       <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                      @enderror
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required value="{{ old('email') }}" type="email" id="email" name="email" class="form-control  @error('email') is-invalid @enderror"" />
                      <label class="form-label" for="form3Example3c">Your Email</label>

                          @error('email')
                       <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                      @enderror
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="password" id="password" name="password" class="form-control  @error('password') is-invalid @enderror"" />
                      <label class="form-label" for="form3Example4c">Password</label>

                          @error('password')
                       <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                      @enderror
                      
                    </div>
                  </div>

                  {{-- <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div> --}}

                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>
               
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
   
          </div>
          
        </div>
         <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/"
                                    class="link-danger">Login here</a></p>
      </div>
    </div>
  </div>
</section>
</body>
</html>