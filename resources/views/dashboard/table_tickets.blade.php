@extends('dashboard.layouts.main')

@section('custom_styles')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('page_content')
    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Table of Employee</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
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
                                        @foreach ($tickets as $ticket)
                                        <tr>
                                            <td><?= $number+=1 ?></td>
                                            <td>{{ $ticket->id }}</td>
                                            <td>{{ $ticket->name }}</td>
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
                                                    <a href="/dashboard/users/{{ $ticket->id }}" class="btn btn-<?php 
                                            switch ($ticket->status_ticket){
                                                    case 0 :
                                                    echo "primary";
                                                    break;
                                                    case 1 :
                                                    echo "success";
                                                    break;
                                                    case 2 :
                                                    echo "danger";
                                                    break;
                                                    default:
                                                    echo "danger";
                                                    break;
                                            } ?> btn-icon-split btn-sm">
                                                        <span class="text">
                                                        <?php 
                                            switch ($ticket->status_ticket){
                                                    case 0 :
                                                    echo "Confirm";
                                                    break;
                                                    case 1 :
                                                    echo "Solved";
                                                    break;
                                                    case 2 :
                                                    echo "Delete";
                                                    break;
                                                    default:
                                                    echo "Delete";
                                                    break;
                                            } ?>
                                                        </span>
                                                    </a>
                                                </td>
                                        </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

@section('custom_script')
     <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
@endsection