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
                                        <a href="{{ route('add.advance.salary') }}" class="btn btn-primary">Add New</a>
                                    </div>
                                     @if(Session::has('message'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Photo</th>
                                                            <th>Salary</th>
                                                            <th>Advanced</th>
                                                            <th>Month</th>
                                                            <th>Year</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                       @foreach($salary as $row)
                                                            <tr>
                                                                <td>{{ $row->name }}</td>
                                                                <td> <img src="{{ asset('images/employee') }}/{{ $row->photo }}"
                                                                     style="height: 70px; width:80px;" class="annonce-img"></td>
                                                                <td>{{ $row->salary }}</td>
                                                                <td>{{ $row->advanced_salary }}</td>
                                                                <td>{{ $row->month }}</td>
                                                                <td>{{ $row->year }}</td>
                                                                
                                                                <td>
                                                                    
                                                                    <a href="{{ ('delete-advanced-salary/'.$row->id) }}" class="btn btn-md btn-danger" id="delete">Delete</a>
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