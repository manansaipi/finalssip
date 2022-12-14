@extends('dashboard.layouts.main')

@section('custom_styles')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('page_content')
    <!-- Begin Page Content -->
    
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">My Ticket</h1>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif (session()->has('deleted'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('deleted') }}
                        </div>
                    @endif

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <br>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Ticket</th>
                                            <th>Problem</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Ticket</th>
                                            <th>Problem</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php global $number; ?>
                                        @forelse ($tickets as $ticket)
                                        <tr>
                                            <td><?= $number+=1 ?></td>
                                            <td>{{ $ticket->id }}</td>
                                            <td>{{ $ticket->ticket_title }}</td>
                                            <td>{{ $ticket->updated_at }}</td>
                                            <td><span class="badge badge-<?php 
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
                                            } ?> </span></td>
                                           <td style="text-align: center;">
                                                    <a href="/dashboard/myticket/{{ $ticket->id }}" class="btn btn-<?php 
                                            switch ($ticket->status_ticket){
                                                    case 2 :
                                                    echo "success";
                                                    break;
                                                    default:
                                                    echo "info";
                                                    break;
                                            } ?> btn-icon-split btn-sm">
                                                        <span class="text">
                                                        <?php 
                                            switch ($ticket->status_ticket){
                                                    case 2 :
                                                    echo "See Feedback";
                                                    break;
                                                    default:
                                                    echo "Detail";
                                                    break;
                                            } ?>
                                                        </span>
                                                    </a>
                                                </td>
                                        </tr>
                                       
                                            
                                        @empty
                                             <tr><td colspan="6" style="text-align: center;">You don't have any ticket</td></tr>
                                        @endforelse
                                         
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTicket">Add Ticket</button>
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- /.container-fluid -->

            </div>

            {{-- Modal ADD TICKET --}}
            <form method="post" action="/dashboard/tickets">
            @csrf
            <div class="modal fade" id="addTicket" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input class="form-control @error('ticket_title') is-invalid @enderror" type="text" name="ticket_title" required autofocus value="{{ old('ticket_title') }}"/>
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
                                <textarea class="form-control @error('body') is-invalid @enderror" rows="3" name="body" required value="{{ old('body') }}"></textarea>
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
                    <button class="btn btn-primary"  type="submit" id="submit" name="submit" >Add</button>
                </div>
               
            </div>
        </div>
    </div>
    </form>
            <!-- End of Main Content -->
@endsection

@section('custom_script')
     <!-- Page level plugins -->
  
@endsection