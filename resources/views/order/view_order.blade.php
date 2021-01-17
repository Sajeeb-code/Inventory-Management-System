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
                                   
                                    
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                @php
                                                     $cname = DB::table('settings')->first();
                                                @endphp
                                                <img src="{{ asset('images/company') }}/{{ $cname->company_logo }}" style="height: 60px; width:100px;" class="annonce-img">
                                                <h2 class="text-right text-uppercase">{{ $cname->company_name }}</h2>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Order Date <br>
                                                    <strong>{{ $order->order_date }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong> Name : {{ $order->name }}</strong><br>
                                                      E-mail : {{ $order->email }} <br>
                                                      Address: {{ $order->address }}<br>
                                                      City: {{ $order->city }}<br>
                                                      Phone{{$order->phone}}
                                                      <br>
                                                      Shop Name : {{ $order->shop_name }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong> Date: </strong> {{ date('d,F y') }}</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
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
                                                            @foreach ($orderDetails as $item)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $item->product_name }}</td>
                                                                <td>{{ $item->product_code }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>{{ $item->unitcost }}</td>
                                                                <td>{{ $item->unitcost * $item->quantity }}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <br>
                                             {{-- intval(str_replace(",", "", "3,100.00")); --}}
                                            <div class="col-md-9">
                                                <h3>Payment Status: {{ $order->payment_status }}</h3>
                                                <h4>Pay Amount: {{ $order->pay }}</h4>
                                                <h4>Due amount: {{  intval(str_replace(",", "", $orderSubTotal->sub_total)) - (int)$order->pay }} </h4>
                                            </div>
                                            <div class="col-md-3 ">
                                                <h3><p class="text-right"><b>Total:</b> {{ $order->sub_total }}</p></h3>
                                                {{-- <p class="text-right">VAT:  {{ $order->vat }}</p> --}}
                                               
                                                {{-- <h3 class="text-right">Total  {{ $order->total }} </h3> --}}
                                            </div>
                                        </div>
                                        <hr>
                                         @if( $order->order_status == 'success')
                                            
                                            <div class="hidden-print">
                                                 <div class="pull-right">
                                                    <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                    {{-- <a href="{{ url('orderList_pdf/pdf') }}" class="btn pull-right btn-primary waves-effect waves-light"
                                                    ><i class="far fa-file-pdf"></i> PDF</a> --}}
                                                </div>
                                               
                                            </div>
                                         @endif
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