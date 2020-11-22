@extends('layouts.app')
@section( 'content')
 <link href="{{ asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
      <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                      @php
                            $month = 'May';
                            $thismonthxpense = DB::table('expenses')->where('month',$month)->sum('expense_amount');
                      @endphp
                        <!-- Page-Title -->
                        <div>
                            <a href="{{ route('january.expense') }}" class="btn btn-primary">January</a>
                            <a href="{{ route('february.expense') }}" class="btn btn-success">February</a>
                            <a href="{{ route('march.expense') }}" class="btn btn-danger">March</a>
                            <a href="{{ route('april.expense') }}" class="btn btn-info">April</a>
                            <a href="{{ route('may.expense') }}" class="btn btn-primary">May</a>
                            <a href="{{ route('june.expense') }}" class="btn btn-info">June</a>
                            <a href="{{ route('july.expense') }}" class="btn btn-warning">July</a>
                            <a href="{{ route('auguest.expense') }}" class="btn btn-success">Auguest</a>
                            <a href="{{ route('september.expense') }}" class="btn btn-danger">September</a>
                            <a href="{{ route('october.expense') }}" class="btn btn-light">October</a>
                            <a href="{{ route('november.expense') }}" class="btn btn-pink">November</a>
                            <a href="{{ route('december.expense') }}" class="btn btn-success">December</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       <h3 class="text-danger">{{ $month }} Total Expense
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
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       @foreach($this_Monthexpense as $row)
                                                            <tr>
                                                                <td>{{ $row->expense_details }}</td>
                                                                <td>{{ $row->expense_amount }}</td>
                                                                <td>{{ $row->date }}</td>
                                                            </tr>
                                                       @endforeach
                                                            
                                                    </tbody>
                                                </table>
                                                
                                                 <h3 style="color: red; text-align:center"> Total {{ $month }} Expenses = {{ $thismonthxpense }} Taka</h3>
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