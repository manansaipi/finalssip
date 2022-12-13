
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
                                    <h6 class="theme-color lead"></h6>
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
                                               
                                                    <a href=""><button type="button" class="btn btn-primary">Edit User</button></a>

                                                

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="media">
                                                <label>ID</label>
                                                   
                                                <p>{{ $user->id }}</p>
                                                   
                                            </div>
                                            <div class="media">
                                                <label>Country</label>
                                                <p>{{ $user->country }}</p>
                                            </div>
                                            <div class="media">
                                                <label>Instagram</label>
                                                <p>@ {{ $user->instagram }}</p>
                                            </div>
                                            <div class="media">
                                                <label>GitHub</label>
                                                <p>@ {{ $user->github }}</p>
                                            </div>
                                            <div class="media">
                                                
                                                    <input type="hidden" id="id" value="" />
                                                    <input type="hidden" id="name" value="" />
                                                    <button id="deleteBtn" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-icon-split">
                                                        <span class="text">Delete User</span></button>
                                              
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-avatar">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

            </div>
            </section>
@endsection
