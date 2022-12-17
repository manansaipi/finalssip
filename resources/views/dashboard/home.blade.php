@extends('dashboard.layouts.main')

@section('page_content')
<?php
if (! function_exists('divnum')) {

        function divnum($numerator, $denominator)
        {
            return $denominator == 0 ? 0 : ($numerator / $denominator);
        }

    }
//all ticket
$canceled = $canceled_tickets;
$waiting = $waiting_tickets;
$inProgress = $inProgress_tickets;
$solved = $solved_tickets;

$totalTicket = count($canceled) + count($waiting) + count($inProgress) + count($solved);


$percentageCanceledTicket = round(divnum(count($canceled), $totalTicket) * 100);
$percentageWaitingTicket = round(divnum(count($waiting), $totalTicket) * 100);
$percentageInProgressTicket = round(divnum(count($inProgress), $totalTicket) * 100);
$percentageSolvedTicket = round(divnum(count($solved), $totalTicket) * 100);



//myTicket
$canceledMy = $canceled_ticketsMy;
$waitingMy = $waiting_ticketsMy;
$inProgressMy = $inProgress_ticketsMy;
$solvedMy = $solved_ticketsMy;

$totalTicketMy = count($canceledMy) + count($waitingMy) + count($inProgressMy) + count($solvedMy);


$percentageCanceledTicketMy = round(divnum(count($canceledMy),$totalTicketMy) * 100)  ;
$percentageWaitingTicketMy = round(divnum(count($waitingMy), $totalTicketMy) * 100);
$percentageInProgressTicketMy = round(divnum(count($inProgressMy), $totalTicketMy) * 100);
$percentageSolvedTicketMy = round(divnum(count($solvedMy), $totalTicketMy) * 100);


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
                                        @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                             TOTAL NUMBER OF TICKET </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTicket }}</div>
                                        @else
                                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                             TOTAL OF MY TICKET </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTicketMy }}</div>
                                        @endif
                                          
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                                 @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                    <a href="dashboard/tickets"><h6 class="m-0 font-weight-bold text-primary">Tickets</h6></a>
                                    @else
                                    <a href="dashboard/myticket"><h6 class="m-0 font-weight-bold text-primary">My Tickets</h6></a>

                                    @endif
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Canceled Ticket <span
                                            class="float-right">
                                            @can('is_notEmployee')
                                                @if ($percentageCanceledTicket != 100)
                                                {{ $percentageCanceledTicket . "%" }}      
                                                @else
                                                Canceled!                                       
                                                @endif
                                            @endcan

                                            @can('employee')
                                                @if ($percentageCanceledTicketMy != 100)
                                                {{ $percentageCanceledTicketMy . "%" }}      
                                                @else
                                                Canceled!                                       
                                                @endif
                                            @endcan
                                            
                                            </span></h4>
                                    <div class="progress mb-4">
                                 @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$percentageCanceledTicket}}%"aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                 
                                    @else
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$percentageCanceledTicketMy}}%"aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    @endif  
                                    </div>
                                   
                                    <h4 class="small font-weight-bold">Waiting Ticket <span
                                            class="float-right">
                                            
                                            @can('is_notEmployee')
                                                @if ($percentageWaitingTicket != 100)
                                                {{ $percentageWaitingTicket . "%" }}      
                                                @else
                                                Waiting!                                      
                                                @endif
                                            @endcan
                                            @can('employee')
                                                @if ($percentageWaitingTicketMy != 100)
                                                {{ $percentageWaitingTicketMy . "%" }}      
                                                @else
                                                Waiting!                                      
                                                @endif
                                            @endcan
                                            
                                            </span></h4>
                                    <div class="progress mb-4">
                                    @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                         <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percentageWaitingTicket }}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    @else
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percentageWaitingTicketMy }}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    @endif
                                       
                                    </div>
                                   
                                    <h4 class="small font-weight-bold">In Progress Ticket <span
                                            class="float-right">
                                            @can('is_notEmployee')
                                                @if ($percentageInProgressTicket != 100)
                                                {{ $percentageInProgressTicket . "%" }}      
                                                @else
                                                In Progress!                                       
                                                @endif
                                            @endcan
                                           @can('employee')
                                                @if ($percentageInProgressTicketMy != 100)
                                                {{ $percentageInProgressTicketMy . "%" }}      
                                                @else
                                                In Progress!                                       
                                                @endif
                                           @endcan
                                            
                                            </span></h4>
                                    <div class="progress mb-4">
                                    @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                         <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentageInProgressTicket }}%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    @else
                                         <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percentageInProgressTicketMy }}%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    @endif
                                       
                                    </div>
                                    <h4 class="small font-weight-bold">Solved Ticket <span
                                            class="float-right">
                                            
                                             @can('is_notEmployee')
                                                @if ($percentageSolvedTicket != 100)
                                                {{ $percentageSolvedTicket . "%" }}      
                                                @else
                                                Complete!                                       
                                                @endif
                                            @endcan
                                           @can('employee')
                                                @if ($percentageSolvedTicketMy != 100)
                                                {{ $percentageSolvedTicketMy . "%" }}      
                                                @else
                                                Complete!                                       
                                                @endif
                                           @endcan
                                            
                                            </span></h4>
                                    <div class="progress">
                                       @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                         <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentageSolvedTicket }}%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    @else
                                         <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentageSolvedTicketMy }}%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    @endif
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
                                    @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                    <a href="dashboard/tickets"><h6 class="m-0 font-weight-bold text-primary">Ticket Sources</h6></a>
                                    @else
                                         
                                    <a href="dashboard/myticket"><h6 class="m-0 font-weight-bold text-primary">My Ticket Sources</h6></a>
                                         
                                    @endif
                                   
                                   
                                </div>

                                <!-- JavaScript code for creating the pie chart -->
                 <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie  ">
                                    @if ($totalTicket == 0 || $totalTicketMy == 0 )
                                          <div style="height: 90px" class="align-middle"></div>
                                    @else
                                    <canvas id="myChart" style="margin-left: auto;
                                    margin-right: auto;"></canvas>
                                    </div>
                                    @endif
                                    
                                    <div class="mt-4 text-center small">
                                    @if ($totalTicket == 0 || $totalTicketMy == 0 )
                                        @if ($totalTicket == 0)
                                            No ticket!
                                        @else
                                          You don't have any ticket
                                        @endif
                                    @else
                                         @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                        @if (count($canceled) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-danger"></i> Canceled
                                                </span>
                                        @else
                                            
                                        @endif
                                    @else
                                          @if (count($canceledMy) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-danger"></i> Canceled
                                                </span>
                                        @else
                                            
                                        @endif
                                    @endif
                                           
                                    @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                        @if (count($waiting) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-warning"></i> Waiting
                                                </span>
                                        @else
                                            
                                        @endif
                                    @else
                                          @if (count($waitingMy) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-warning"></i> Waiting
                                                </span>
                                        @else
                                            
                                        @endif
                                    @endif
                                    @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                        @if (count($inProgress) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-info"></i> In Progress
                                                </span>
                                        @else
                                            
                                        @endif
                                    @else
                                          @if (count($inProgressMy) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-info"></i> In Progress
                                                </span>
                                        @else
                                            
                                        @endif
                                    @endif
                                    @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                                        @if (count($solved) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-success"></i> Solved
                                                </span>
                                        @else
                                            
                                        @endif
                                    @else
                                          @if (count($solvedMy) != 0)
                                                <span class="mr-2">
                                                    <i class="fas fa-circle text-success"></i> Solved
                                                </span>
                                        @else
                                            
                                        @endif
                                    @endif
                                    @endif
                                   
                                        
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
           
                   @if (auth()->user()->position->name == "CEO" || auth()->user()->position->name == "IT Employee")
                    <script>
                        const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Solved Ticket", "In Progress Ticket", "Waiting Ticket", "Canceled Ticket"],
                        datasets: [{
                            label: 'Total',
                            data: 
                            [ {{ count($solved) }},{{ count($inProgress) }},{{ count($waiting)}}, {{ count($canceled) }}],
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

                   @else
                        <script>
                        const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Solved Ticket", "In Progress Ticket", "Waiting Ticket", "Canceled Ticket"],
                        datasets: [{
                            label: 'Total',
                            data: 
                            [ {{ count($solvedMy) }},{{ count($inProgressMy) }},{{ count($waitingMy)}}, {{ count($canceledMy) }}],
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
                   @endif
  
     <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
@endsection