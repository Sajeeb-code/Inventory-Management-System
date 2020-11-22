@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Expense !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                    
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Expense
                                         <a href="{{ route('today.expense') }}" class="btn btn-primary pull-right space" >Today</a>
                                         &nbsp;<a href="{{ route('month.expense') }}" class="btn btn-success pull-right" >Month</a>
                                    </h3>
                                    
                                    </div>
                                    <div class="panel-body">
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
                                        <form role="form" method="post" action="{{ url('/insert-expense') }}" >
                                           {{ csrf_field() }}
                                            <div class="col-md-8">
                                                 <div class="form-group">
                                                    <label for="expense_details">Expense Details</label>
                                                    <textarea name="expense_details" id="expense_details" cols="10" rows="6" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="expense_amount">Amount</label>
                                                    <input type="text" class="form-control" id="expense_amount" name="expense_amount" placeholder="Enter amount">
                                                </div>
                                                 <div class="form-group"> 
                                                    <input type="hidden" class="form-control"  name="date" value="{{ date('d/m/Y') }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control"  name="month" value="{{ date('F') }}">
                                                    <input type="hidden" class="form-control"  name="year" value="{{ date('Y') }}">
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