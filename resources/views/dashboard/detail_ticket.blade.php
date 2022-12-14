
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
                                    <h3 class="dark-color">Detail Ticket</h3>
                                    <h6 class="theme-color lead"></h6>
                                    <p>{{ $ticket->body }}</p>
                                    <div class="row about-list">
                                        <div class="col-md-6">
                                            <div class="media">
                                                <label>Problem</label>
                                                <p>{{ $ticket->ticket_title }}</p>
                                            </div>
                                            <div class="media">
                                                <label>No Ticket</label>
                                                <p>{{ $ticket->id }}</p>
                                            </div>
                                            <div class="media">
                                                <label>Status</label>
                                                <p><span class="badge badge-<?php 
                                            switch ($ticket->status_ticket){
                                                    case 0 :
                                                    echo "warning";
                                                    break;
                                                    case 1 :
                                                    echo "info";
                                                    break;
                                                    case 2 :
                                                    echo "success";
                                                    break;
                                                    default:
                                                    echo "danger";
                                                    break;
                                            } ?> m-0">
                                            <?php
                                            switch ($ticket->status_ticket){
                                                    case 0 :
                                                    echo "Waiting";
                                                    break;
                                                    case 1 :
                                                    echo "In Progrees";
                                                    break;
                                                    case 2 :
                                                    echo "Solved";
                                                    break;
                                                    default:
                                                    echo "Canceled";
                                                    break;
                                            } ?> </span></p>
                                            </div>
                                            
                                            <div class="media">
                                                    @if (auth()->user()->id == $ticket->creator_id && $ticket->status_ticket == 0)
                                                    <a data-toggle="modal" data-target="#edit" class="btn btn-primary btn-icon-split">
                                                      <span class="text">Edit Ticket</span>
                                                    </a>
                                                        
                                                    @elseif(auth()->user()->position->name === "CEO" && auth()->user()->id != $ticket->creator_id || auth()->user()->position->name === "IT Employee"  && auth()->user()->id != $ticket->creator_id)
                                                       
                                                        @if ($ticket->status_ticket === 0) 
                                                        <button id="confirmBtn" data-toggle="modal" data-target="#confirm" class="btn btn-primary btn-icon-split">
                                                            <span class="text">Confirm Ticket</span></button>
                                                   
                                                       @elseif ($ticket->status_ticket === 1) 
                                                   
                                                      
                                                        <button id="solvedBtn" data-toggle="modal" data-target="#solved" class="btn btn-success btn-icon-split">
                                                            <span class="text">Solved Ticket</span></button>
                                                        @else
                                                        
                                                            <a data-toggle="modal" data-target="#delete" class="btn btn-danger btn-icon-split" href="" class="btn btn-danger btn-icon-split">
                                                                <span class="text">Delete Ticket</span>
                                                            </a>
                                                       
                                                        @endif
                                                    @endif
                                            </div>

                                    <?php if ($ticket->status_ticket == '2'): ?>
                                        <h6 class="dark-color"><hr></h6>
                                        <div>
                                            <label for="">Name</label>
                                            <p>{{ $ticket->solvedby->name }}</p>
                                        </div>
                                        <div>
                                            <label for="">Feedback</label>
                                            <p>{{ $ticket->feedback }}</p>
                                        </div>
                                    <?php endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="media">
                                                <label>Creator</label>
                                                   
                                                <p>{{ $ticket->creator->name }}</p>
                                            </div>
                                            <div class="media">
                                                <label>ID</label>
                                                <p>{{ $ticket->creator->id }}</p>
                                            </div>
                                            <div class="media">
                                                <label>Date</label>
                                                <p> {{ $ticket->created_at }}</p>
                                            </div>
                                            
                                            <div class="media">
                                                
                                                    <input type="hidden" id="id" value="" />
                                                    <input type="hidden" id="name" value="" />
                                                    @if (auth()->user()->id == $ticket->creator_id && $ticket->status_ticket == 0)
                                                    <button data-toggle="modal" data-target="#cancel" class="btn btn-danger btn-icon-split">
                                                        <span class="text">Cancel ticket</span></button>
                                                    @endif
                                              
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

            {{-- Modal DELETE --}}
             <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Ticket ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Delete Ticket" below to delete ticket.</div>
                    {{-- <form class="form" action="" method="post" enctype="multipart/form-data"> --}}
                        <div class="modal-footer">
                            <input type="hidden" id="idUsr" name="idUsr">
                             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <form action="/dashboard/tickets/{{ $ticket->id }}" method="post">
                                @method('delete')
                                @csrf
                                    <button class="btn btn-danger"" name="deleteButtn" id="deleteButton">Delet Ticket</button>
                            </form>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal EDIT TICKET--}}
    <form method="post" action="/dashboard/tickets/{{ $ticket->id }}">
    @method('put')
            @csrf
            <div class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Report Problem</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row">
                            <div class="form-group">
                                <label><b>Complaint</b></label>
                                <input class="form-control @error('ticket_title') is-invalid @enderror" type="text" name="ticket_title" required autofocus value="{{ old('ticket_title', $ticket->ticket_title) }}"/>
                                <div class="inavlid-feedback">
                                @error('ticket_title')
                                {{ $message }}
                                @enderror
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><b>Description</b></label>
                                <textarea class="form-control @error('body') is-invalid @enderror" rows="3" name="body" required>{{ old('body', $ticket->body) }}</textarea>
                                @error('body')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <input class="" type="file" name="image" /> --}}

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary"  type="submit" id="submit" name="submit" >Edit Ticket</button>
                </div>
               
            </div>
        </div>
    </div>
    </form>

    {{-- MODAL CONFIRM TICKET --}}
    <form action="/dashboard/tickets/{{ $ticket->id }}" method="post">
       @method('put')
            @csrf 
        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Ticket ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Confirm" below to confirm the ticket. </div>
                            <div class="modal-footer">
                                <form class="form" action="" method="post" enctype="multipart/form-data">

                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit" name="confirmBtn" id="confirmBtn">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </form>

    {{-- MODAL SOLVED TICKET --}}
    <form action="/dashboard/tickets/{{ $ticket->id }}" method="post">
       @method('put')
            @csrf 
    <div class="modal fade" id="solved" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Solved Ticket ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Solved" below if the problem has been solved. </div>
                        <form class="form" action="" method="post" enctype="multipart/form-data">
                            <div class="col">
                                <div class="form-group">
                                    <label><b>Feedback</b></label>
                                    <textarea class="form-control" rows="3" name="feedback" placeholder="Add feedback" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-success" type="submit" name="solvedBtn" id="solvedBtn">Solved</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- MODAL CANCEL TICKET --}}
    <form action="/dashboard/tickets/{{ $ticket->id }}" method="post">
       @method('put')
            @csrf 
    <div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Ticket ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Cancel Ticket" below to Cancel the ticket. </div>
                <div class="modal-footer">
                        <input type="hidden" name="status_ticket" value="3">
                        
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit" name="cancelButton" id="cancelButton" >Cancel Ticket</button>
                </div>
            </div>
        </div>
    </div> 
    </form>
@endsection
