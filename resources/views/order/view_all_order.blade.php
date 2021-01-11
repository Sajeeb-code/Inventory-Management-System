@extends('layouts.app')
@section( 'content')
 <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
      <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h2>All Order List</h2>
                                        <h5 class="pull-right">{{ date(' d F Y') }}</h5>
                                    </div>
                                    @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <th>Order Date</th>
                                                            <th>Quantity</th>
                                                            <th>Total</th>
                                                            <th>Payment Status</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                       @foreach($pendingOrder as $row)
                                                            <tr>
                                                                <td>{{ $row->name }}</td>
                                                                <td>{{ $row->order_date }}</td>
                                                                <td>{{ $row->total_products}}</td>
                                                                <td>{{ $row->total }}</td>
                                                                <td>{{ $row->payment_status }}</td>
                                                               
                                                                <td>
                                                                  <a href="{{ ('view-order/'.$row->o_id) }}" class="btn btn-sm btn-danger" id="delete">Details</a>
                                                                </td>
                                                            </tr>
                                                       @endforeach
                                                           
                                                        
                                                        
                                                       
                                                      
                                                        
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>

    <script src="{{ asset('/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
@endsection