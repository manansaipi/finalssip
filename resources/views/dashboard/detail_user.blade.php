
@extends('dashboard.layouts.main')

@section('custom_styles')
    <link href="/css/detail.css" rel="stylesheet">
@endsection



@section('page_content')

                <section class="section about-section gray-bg" id="about">
                    <div class="container">
                        <div class="row align-items-center flex-row-reverse">
                            <div class="col-lg-6">
                                <div class="about-text go-to">
                                    <h3 class="dark-color">About Me</h3>
                                    <h6 class="theme-color lead">{{ $user->position->name }}</h6>
                                    <p>{{ $user->bio }}</p>
                                    <div class="row about-list">
                                        <div class="col-md-6">
                                            <div class="media">
                                                <label>Name</label>
                                                <p>{{ $user->name }}</p>
                                            </div>
                                            <div class="media">
                                                <label>Position</label>
                                                <p>{{ $user->position->name }}</p>
                                            </div>
                                            <div class="media">
                                                <label>Birthday</label>
                                                <p>{{ $user->birthday }}</p>
                                            </div>
                                            <div class="media">
                                                <label>Age</label>
                                                <p>{{ $user->age }} Yr</p>
                                            </div>
                                            <div class="media">
                                               @if (auth()->user()->position->name === "CEO" && auth()->user()->id !== $user->id)
                                                    <a href="/dashboard/users/{{ $user->id }}/edit"><button type="button" class="btn btn-primary">Edit User</button></a>
                                               @elseif(auth()->user()->id === $user->id)
                                                    <a href="/dashboard/myprofile"><button type="button" class="btn btn-primary">Edit Profile</button></a>
                                                @endif
                                                

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="media">
                                                <label>ID</label>
                                                   
                                                <p>{{ $user->id }}</p>
                                                   
                                            </div>
                                            <div class="media">
                                                <label>Country</label>
                                                <p>{{ $user->country->name }}</p>
                                            </div>
                                            <div class="media">
                                                <label>Instagram</label>
                                                <p>{{ "@".$user->instagram }}</p>
                                            </div>
                                            <div class="media">
                                                <label>GitHub</label>
                                                <p>{{ "@".$user->github }}</p>
                                            </div>
                                            <div class="media">
                                                
                                                    <input type="hidden" id="id" value="" />
                                                    <input type="hidden" id="name" value="" />
                                               @if (auth()->user()->position->name === "CEO" && auth()->user()->id !== $user->id)
                                                    <button id="deleteBtn" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-icon-split">
                                                        <span class="text">Delete User</span></button>
                                                @endif

                                              
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-avatar">
                                  @if ($user->image)
                                     <img src="http://finalssip.test/storage/{{$user->image}}"  width="500" height="500">
                                  @else
                                    <img style="object-fit: cover;" src="/img/undraw_profile.svg" width="500" height="500">
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

            </div>
            </section>

               {{-- Modal DELETE --}}
             <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Delete User" below to delete user.</div>
                    {{-- <form class="form" action="" method="post" enctype="multipart/form-data"> --}}
                        <div class="modal-footer">
                            <input type="hidden" id="idUsr" name="idUsr">
                             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <form action="/dashboard/users/{{ $user->id }}" method="post">
                                @method('delete')
                                @csrf
                                    <button class="btn btn-danger"" name="deleteButtn" id="deleteButton">Delet User</button>
                            </form>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
