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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Ticket</th>
                                            <th>Problem</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th>Action</th>
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
                                                    default:
                                                    echo "";
                                            } ?>   m-0">Waiting</span></td>
                                           <td style="text-align: center;">
                                                    <a href="/dashboard/users/{{ $ticket->id }}" class="btn btn-info btn-icon-split btn-sm">
                                                        <span class="text">Detail</span>
                                                    </a>
                                                  
                                                        <a href="" class="btn btn-primary btn-icon-split btn-sm">
                                                            <span class="text">Edit</span>
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