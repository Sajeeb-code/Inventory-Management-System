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
                                       <a href="{{ route('add.product') }}" class="btn btn-primary">Add New Product</a>
                                       <a href="{{ route('export') }}" class="btn btn-success " >Download Xlsx File</a>
                                        <h5 class="pull-right">{{ date(' d F Y') }}</h5>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Product Description</th>
                                                            
                                                            <th>Image</th>
                                                            <th>Selling Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                       @foreach($allProducts as $product)
                                                            <tr>
                                                                <td>{{ $product->product_name }}</td>
                                                                <td>{{ $product->product_code }}</td>
                                                                <td>{{ $product->product_description }}</td>
                                                                
                                                                <td>
                                                                    <img src="{{ asset('images/product') }}/{{ $product->product_image }}" style="height: 70px; width:80px;" class="annonce-img">
                                                                </td>
                                                                <td>{{ $product->selling_price }}</td>
                                                                <td>
                                                                    <a href="{{ 'view-product/'.$product->id }}" class="btn btn-sm btn-primary">Details</a>
                                                                    <a href="{{ 'edit-product/'.$product->id }}" class="btn btn-sm btn-info">Edit</a>
                                                                    <a href="{{ ('delete-product/'.$product->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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