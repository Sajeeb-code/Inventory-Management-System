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
                                        <a href="{{ route('add.employee') }}" class="btn btn-primary">Add New</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                       @foreach($employees as $employee)
                                                            <tr>
                                                                <td>{{ $employee->name }}</td>
                                                                <td>{{ $employee->email }}</td>
                                                                <td>{{ $employee->phone }}</td>
                                                                <td>{{ $employee->address }}</td>
                                                                <td>
                                                                    <img src="{{ asset('images/employee') }}/{{ $employee->photo }}" style="height: 70px; width:80px;" class="annonce-img">
                                                                </td>
                                                                <td>
                                                                    <a href="{{ 'view-employee/'.$employee->id }}" class="btn btn-sm btn-primary">Details</a>
                                                                    <a href="{{ 'edit-employee/'.$employee->id }}" class="btn btn-sm btn-info">Edit</a>
                                                                    <a href="{{ ('delete-employee/'.$employee->id) }}" class="btn btn-md btn-danger" id="delete">Delete</a>
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

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>

    <script src="{{ asset('/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
@endsection