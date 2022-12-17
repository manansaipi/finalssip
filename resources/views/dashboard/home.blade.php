@extends('dashboard.layouts.main')

@section('page_content')
<?php
$canceled = $canceled_tickets;
$waiting = $waiting_tickets;
$inProgress = $inProgress_tickets;
$solved = $solved_tickets;



$totalTicket = count($canceled) + count($waiting) + count($inProgress) + count($solved);

$percentageCanceledTicket = round(count($canceled) / $totalTicket * 100);
$percentageWaitingTicket = round(count($waiting) / $totalTicket * 100);
$percentageInProgressTicket = round(count($inProgress) / $totalTicket * 100);
$percentageSolvedTicket = round(count($solved) / $totalTicket * 100);



?>
    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                        <h1 class="h3 mb-0 text-gray-800">Hallo {{ Auth::user()->username }} !</h1>
                        <a href="/dashboard/myticket" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-fw fa-wrench grey-200"></i> Report Porblem</a>
                    </div>
                                
                                
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                           <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Canceled Ticket <span
                                            class="float-right">
                                            
                                            @if ($percentageCanceledTicket !== 100)
                                            {{ $percentageCanceledTicket . "%" }}      
                                            @else
                                            All Ticket are Canceled                                       
                                            @endif
                                            
                                            </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $percentageCanceledTicket }}%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Waiting Ticket <span
                                            class="float-right">
                                            
                                             @if ($percentageWaitingTicket !== 100)
                                            {{ $percentageWaitingTicket . "%" }}      
                                            @else
                                            All Ticket are Waiting                                      
                                            @endif
                                            
                                            </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percentageWaitingTicket }}%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                   
                                    <h4 class="small font-weight-bold">In Progress Ticket <span
                                            class="float-right">
                                            
                                            @if ($percentageInProgressTicket !== 100)
                                            {{ $percentageInProgressTicket . "%" }}      
                                            @else
                                            All Ticket are In Progress                                       
                                            @endif
                                            
                                            </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentageInProgressTicket }}%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Solved Ticket <span
                                            class="float-right">
                                            
                                            @if ($percentageSolvedTicket !== 100)
                                            {{ $percentageSolvedTicket . "%" }}      
                                            @else
                                            Complete!                                          
                                            @endif
                                            
                                            </span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentageSolvedTicket }}%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Ticket Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- JavaScript code for creating the pie chart -->
                 <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie  ">
                                     <canvas id="myChart" style="margin-left: auto;
  margin-right: auto;"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                     <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Canceled
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Waiting
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> In Progress
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Solved
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
              
                    <!-- Content Row -->
                 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection

@section('custom_script')
                   
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
              const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Solved Ticket", "In Progress Ticket", "Waiting Ticket", "Canceled Ticket"],
                        datasets: [{
                            label: 'Total',
                            data: [ {{ count($solved) }},{{ count($inProgress) }},{{ count($waiting)}}, {{ count($canceled) }}],
                            backgroundColor:[
                                '#1cc88a',
                                '#36b9cc',
                                '#f6c23e',
                                '#e74a3b',
                                ],
                            borderWidth: 1,
                    }]
                    },
                    options: {
                    plugins: {
                    legend: {
                        display: false,
                    },
                    },
                    
                    }
                });
               </script>

     <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
@endsection