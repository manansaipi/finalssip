@extends('dashboard.layouts.main')

@section('custom_styles')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('page_content')
    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Table of Employee</h1>
                   
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Country</th>
                                            <th>Age</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Country</th>
                                            <th>Age</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php global $number; ?>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id  }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->position->name }}</td>
                                            <td>{{ $user->country->name }}</td>
                                            <td>{{ $user->age }}</td>
                                           <td style="text-align: center;">
                                                    <a href="/dashboard/users/{{ $user->id }}" class="btn btn-info btn-icon-split btn-sm">
                                                        <span class="text">Detail</span>
                                                    </a>
                                                    @if (auth()->user()->position->name == "CEO" && auth()->user()->id != $user->id)
                                                        <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-primary btn-icon-split btn-sm">
                                                            <span class="text">Edit</span>
                                                        </a>
                                                    @elseif(auth()->user()->id == $user->id)
                                                        <a href="/dashboard/myprofile" class="btn btn-primary btn-icon-split btn-sm">
                                                            <span class="text">Edit</span>
                                                        </a>
                                                  @endif
                                                      
                                             
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

             @yield('edit_user')
            <!-- End of Main Content -->
@endsection

@section('custom_script')
     <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
@endsection