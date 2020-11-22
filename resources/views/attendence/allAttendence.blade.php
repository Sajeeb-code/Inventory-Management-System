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
                                        <a href="{{ route('take.attendence') }}" class="btn btn-primary">Add New</a>
                                        <span class="pull-right">{{ date('d F Y') }}</span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Edit date</th>
                                                           
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    @php
                                                        $sl = 1;
                                                    @endphp
                                                    <tbody>
                                                       @foreach($allAttendence as $row)
                                                            <tr>
                                                                <td>{{ $sl++ }}</td>
                                                                <td>{{ $row->edit_date }}</td>
                                                                <td>
                                                                    <a href="{{ 'edit-attendence/'.$row->edit_date }}" class="btn btn-sm btn-info">Edit</a>
                                                                    <a href="{{ 'view-attendence/'.$row->edit_date }}" class="btn btn-sm btn-success">View</a>
                                                                  
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