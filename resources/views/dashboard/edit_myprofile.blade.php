
@extends('dashboard.layouts.main')

@section('page_content')
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
          <div class="container">
            <div class="row flex-lg-nowrap">
              <div class="col-12 col-lg-auto mb-3" style="width: 210px;">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title font-weight-bold">Support</h6>
                    <p class="card-text">Get fast, free help from our friendly assistants.</p>
                    <a href="/dashboard/myticket"><button type="button" class="btn btn-primary">Report Problem</button></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="row">
                  <div class="col mb-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="e-profile">
                          <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                              <div class="mx-auto" style="width: 140px;">
                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                  <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">
                                  @if (auth()->user()->image)
                                      <img class="img-preview" src="http://finalssip.test/storage/{{auth()->user()->image}}"  width="140" height="140">
                                  @else
                                     <img class="img-preview img-fluid">
                                  @endif
                                  </span>
                                </div>
                              </div>
                            </div>
                          
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                              <div class="text-center text-sm-left mb-2 mb-sm-0">
                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ auth()->user()->name }}</h4>
                                <p class="mb-0">{{ "@".auth()->user()->username }}</p>
                                <div class="text-muted"><small></small>
                                </div>
                               <form action="/dashboard/users/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                      @csrf 
                                  <div class="mt-2">
                                    <input class="btn btn-primary" type="file" id="image" name="image" onchange="previewImage()"/>
                                    <i class="fa fa-fw fa-camera"></i>
                                    @error('image')
                                    <p style="color: red; font-style: italic;">{{ $message }}</p>
                                    @enderror
                                    <span>Change Photo</span>
                                  </div>
                              </div>
                              <div class="text-center text-sm-right">
                                <span class="badge badge-secondary">{{ auth()->user()->position->name }}</span>
                                <div class="text-muted"><small></small></div>
                              </div>
                            </div>
                          </div>
                          <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                          </ul>
                          <div class="tab-content pt-3">
                            <div class="tab-pane active">

                              <div class="row">
                                <div class="col">
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control @error('name')is-invalid"@enderror type="text" name="name" placeholder="Full Name" value="{{ old('name',  auth()->user()->name) }}" required>
                                        @error('name')
                                        <p style="color: red; font-style: italic;">
                                        {{ $message }}
                                        </p>

                                        @enderror
                                        
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control @error('username')is-invalid"@enderror" type="text" name="username" placeholder="Username" value="{{old('username',  auth()->user()->username)}}" required>
                                     @error('username')
                                        <p style="color: red; font-style: italic;">
                                        {{ $message }}
                                        </p>
                                        @enderror
                                          {{-- <p style="color: red; font-style: italic;">Username already taken !</p> --}}
                                      
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                      
                                          {{-- <label for="position">Position :</label>
                                          <select ty name="position" id="position">
                                          @foreach ($positions as $position)
                                          @if (auth()->user()->position->id == $position->id)
                                              <option value="{{ $position->id }}" selected>{{ $position->name }}</option>
                                          @else
                                              <option value="{{ $position->id }}">{{ $position->name }}</option>
                                          @endif
                                          @endforeach
                                            
                                          </select> --}}
                                      
                                        <div class="form-group">
                                          <label for="country">Country</label>
                                          <select id="country" name="country" class="form-control">
                                            @foreach ($countries as $country)
                                          @if (auth()->user()->country->id == $country->id)
                                              <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                          @else
                                              <option value="{{ $country->id }}">{{ $country->name }}</option>
                                          @endif
                                          @endforeach
                                            
                                          </select>
                                          <label for="age">Age</label>
                                          <select id="age" name="age" class="form-control">
                                            
                                         <?php global $age; ?>
                                          @for ($age = 10; $age < 40; $age++)
                                          @if (auth()->user()->age == $age)
                                              <option value="{{ $age }}" selected>{{ $age }}</option>
                                          @else
                                              <option value="{{ $age }}">{{ $age }}</option>
                                          @endif
                                          @endfor
                                            
                                         
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Instagram</label>
                                        <input class="form-control" type="text" name="instagram" placeholder="@instagram" value="@if(auth()->user()->instagram == NULL)@else {{ old('instagram',"@".auth()->user()->instagram) }} @endif">
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>GitHub</label>
                                        <input class="form-control" type="text" name="github" placeholder="@github" value="@if(auth()->user()->github == NULL)@else {{ old('github',"@".auth()->user()->github) }} @endif">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label for="birthday">Birthday:</label>
                                        <input type="date" id="birthday" value="{{ old('birthday', auth()->user()->birthday) }}" name="birthday" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>About</label>
                                        <textarea class="form-control" rows="5" name="bio" placeholder="My Bio">{{ old('bio', auth()->user()->bio) }}</textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col mb-3">
                                      <div class="form-group">
                                      </div>
                                    </div>
                                     <div class="row">
                                      <div class="col d-flex justify-content-end">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#confirm">Save Changes</button>
                                      </div>
                                  </div>
                                </div>
                              </div>
                             
                              {{-- <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                  <div class="mb-2"><b>Change Password</b></div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Current Password</label>
                                        <input class="form-control" name="password" type="password" placeholder="Current Password">
                                      
                                          <p style="color: red; font-style: italic;">Incorect Password</p>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" placeholder="New Password" name="password1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                        <input class="form-control" type="password" placeholder="Confirm Password" name="password2">
                                      </div>
                                   
                                        <p style="color: red; font-style: italic;">Password not match !</p>
                                   
                                        <p style="color: red; font-style: italic;">Minimum 5 characters and 1 uppercase</p>
                                   
                                        <p style="color: red; font-style: italic;">Minimum 1 uppercase</p>
                                     
                                        <p style="color: red; font-style: italic;">Minimum 5 characters</p>
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                  <div class="mb-2"><b></b></div>
                                  <div class="row">
                                    <div class="col">
                                    </div>
                                  </div>
                                </div>
                              </div> --}}
                              
                              </div>       
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-3 mb-3">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="px-xl-3">
                          <button class="btn btn-block btn-secondary" data-toggle="modal" data-target="#logoutModal">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span> 
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

           {{-- MODAL CONFIRM CHANGES --}}
    
        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Save Changes ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Save" below to save changes. </div>
                            <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                  <button class="btn btn-primary" type="submit" name="confirmBtn" id="confirmBtn">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
     
@endsection

@section('custom_script')
   
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
