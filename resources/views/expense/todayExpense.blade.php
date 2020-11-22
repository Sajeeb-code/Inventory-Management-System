@extends('layouts.app')
@section( 'content')
 <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
      <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        @php
                            $date = date('d/m/Y');
                            $expense = DB::table('expenses')->where('date',$date)->sum('expense_amount');
                        @endphp
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="color: red; text-align:center">Total Expense {{ $expense }} Taka</h3>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       <h3>Todays Expense
                                           <a href="{{ route('add.expense') }}" class="btn btn-primary pull-right">Add New</a>
                                       </h3>
                                        
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Expense Details</th>
                                                            <th>Expense Amount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                       @foreach($today as $row)
                                                            <tr>
                                                                <td>{{ $row->expense_details }}</td>
                                                                <td>{{ $row->expense_amount }}</td>
                                                               
                                                                <td>
                                                                    
                                                                    <a href="{{ 'edit-today-expense/'.$row->id }}" class="btn btn-sm btn-info">Edit</a>
                                                                    <a href="{{ ('delete-today-expense/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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