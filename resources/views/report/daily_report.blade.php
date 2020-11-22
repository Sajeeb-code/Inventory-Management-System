@extends('layouts.app')
@section( 'content')

 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                   
                                    @php
                                        $logo = DB::table('users');
                                    @endphp
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4>
                                                
                                            </div>
                                            @php
                                                $todaydate = date('d/m/y');
                                                $detailsdate = DB::table('orders')->where('order_date',$todaydate)->get();
                                            @endphp
                                            <div class="pull-right">
                                                <h4> Date <br>
                                                    <strong>{{ $todaydate }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>Customer Section</span>
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Customer Name</th>
                                                            <th>Customer Address</th>
                                                            <th>Phone</th>
                                                            <th>Payment Method</th>
                                                            <th>Total</th>
                                                            <th>Pay</th>
                                                            <th>Due</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $sl = 1;
                                                            @endphp
                                                            @foreach ($order_details as $item)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->address }}</td>
                                                                <td>{{ $item->phone }}</td>
                                                                <td>{{ $item->payment_status }}</td>
                                                                <td>{{ $item->total }}</td>
                                                                <td>{{ $item->pay }}</td>
                                                                <td>{{ $item->due }}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span>Product Section</span>
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $sl = 1;
                                                            @endphp
                                                            @foreach ($products_details as $prod)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $prod->product_name }}</td>
                                                                <td>{{ $prod->product_code }}</td>
                                                                <td>{{ $prod->quantity }}</td>
                                                                <td>{{ $prod->unitcost }}</td>
                                                                <td>{{ $prod->unitcost*$prod->quantity }}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <hr>
                                       
                                           
                                            <div class="hidden-print">
                                                 <div class="pull-right">
                                                    <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                    
                                                </div>
                                               
                                            </div>
                                       
                                    </div>
                                </div>

                            </div>

                        </div>



            </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection