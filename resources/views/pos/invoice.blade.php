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
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    @php
                                        $logo = DB::table('users');
                                    @endphp
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="images/logo_dark.png" alt="velonic"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong>{{ date('d F Y') }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong> Name : {{ $customer->name }}</strong><br>
                                                      E-mail : {{ $customer->email }} <br>
                                                      Address: {{ $customer->address }}<br>
                                                      City: {{ $customer->city }}<br>
                                                      <abbr title="Phone">Phone:</abbr>{{$customer->phone}}
                                                      <br>
                                                      Shop Name : {{ $customer->shop_name }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ date('d,F y') }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
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
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                                $sl = 1;
                                                            @endphp
                                                            @foreach ($contents as $item)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->qty }}</td>
                                                                <td>{{ $item->price }}</td>
                                                                <td>{{ $item->price*$item->qty }}</td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>
                                                <p class="text-right">Discout:  {{ Cart::discount() }}</p>
                                                <p class="text-right">VAT:  {{ Cart::tax() }}</p>
                                                <hr>
                                                <h3 class="text-right">Total  {{ Cart::total() }} </h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn pull-right btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#con-close-modal">Submit</a>
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
 <!-- /.modal -->
            <form action="{{ url('/make-invoice') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                <h4 class="modal-title">Invoice of {{ $customer->name }}</h4> 
                                <h5 class="pull-right text-danger">Total {{ Cart::total() }}</h5>
                                <span class=" text-info">{{ date('d,F Y') }}</span>
                            </div> 
                            <div class="modal-body">
                                 @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error )
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            
                                        @endif
                                        @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                
                                 
                                <div class="row"> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-4" class="control-label">Payment *</label> 
                                            <select name="payment_status" id="" class="form-control">
                                                <option value="HandCash">Hand Cash</option>
                                                <option value="Chack">Chack</option>
                                                <option value="Card">Card</option>
                                            </select>
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-5" class="control-label">Pay</label> 
                                            <input type="text" class="form-control" id="field-5" name="pay" placeholder="pay amount "> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Due</label> 
                                            <input type="text" class="form-control" id="field-6" name="due" placeholder="due amount" > 
                                           
                                        </div> 
                                    </div> 
                                </div>
                                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                <input type="hidden" name="order_date" value="{{ date('d/m/y') }}">
                                <input type="hidden" name="order_status" value="pending">
                                <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                                <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                                <input type="hidden" name="total" value="{{ Cart::total() }}">
 
                            </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
                            </div> 
                        </div> 
                    </div>
                </div><!-- /.modal -->
            </form>
@endsection