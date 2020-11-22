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
                                       <h3>Update Attendence
                                           <span class="text-success pull-right">{{ date('d F Y') }}</span>
                                       </h3>
                                       <a href="{{ route('all.attendence') }}" class="btn btn-purple pull-right">All Attendence </a>
                                    </div>
                                     <h4 class="text-danger text-center" > Update Attendence {{ $data->att_date }}</h4>
                                    <div class="panel-body">
                                      
                                        <div class="row">
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
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table  class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        <form action="{{ url('/update-attendence/') }}" method="post">
                                                            @csrf
                                                            {{ method_field('PUT') }}
                                                            @foreach($editAttendence as $employee)
                                                                    <tr>
                                                                        <td>{{ $employee->name }}</td>
                                                                    
                                                                        <td>
                                                                            <img src="{{ asset('images/employee') }}/{{ $employee->photo }}" 
                                                                            style="height: 70px; width:80px;" class="annonce-img">
                                                                            <input type="hidden" name="id[]" value="{{ $employee->id }}">
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" name="attendence[{{ $employee->id }}]" value="Present" required
                                                                            <?php if ($employee->attendence =='Present') {
                                                                                echo 'checked';
                                                                            } ?>
                                                                            > Present
                                                                            <input type="radio" name="attendence[{{ $employee->id }}]" value="Absent"
                                                                             <?php if ($employee->attendence =='Absent') {
                                                                                echo 'checked';
                                                                            } ?>
                                                                            > Absent
                                                                        </td>
                                                                        <input type="hidden" name="att_date" value="{{ date('d-m-y') }}">
                                                                        <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                                                    </tr>
                                                            @endforeach
                                                       
                                                          
                                                    </tbody>
                                                </table>
                                                     <button type="submit" class="btn btn-lg btn-success pull-right">Update</button>
                                                </form>
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