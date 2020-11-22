@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Salary Section !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title  ">Advance Salary</h3>
                                    
                                     <a href="{{ route('all.advance.salary') }}" class="btn btn-primary pull-right" >View Advanced Salary</a>
                                    </div>
                                    <div class="panel-body">
                                        @if(Session::has('error'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif

                                         @if(Session::has('message'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                            
                                      
                                        <form role="form" method="post" action="{{ url('/insert-advance-salary') }}" enctype="multipart/form-data">
                                           {{ csrf_field() }}
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="nid_no">Employee *</label>
                                                    @php
                                                        $emp = DB::table('employees')->get();
                                                    @endphp
                                                    <select name="employee_id" class="form-control" required>
                                                        <option value="">Select Employee ---></option>
                                                        @foreach($emp as $row)
                                                             <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                        @endforeach
                                                       
                                                      
                                                    </select>
                                                </div>
                                               <div class="form-group">
                                                    <label >Month *</label>
                                                    <select name="month" class="form-control" required>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="Augest">Augest</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label >Year *</label>
                                                    <select name="year" class="form-control">
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        
                                                    </select>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="advanced_salary">Advance Salary *</label>
                                                    <input type="text" class="form-control" id="advanced_salary" name="advanced_salary" placeholder="advanced_salary" required>
                                                </div>
                                               
                                                
                                                 <button type="submit" class="btn btn-purple waves-effect waves-light" value="submit">Submit</button>
                                                 
                                            </div>
                                          
                                           
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                        </div>

                </div>
            </div>
     </div>
     
@endsection