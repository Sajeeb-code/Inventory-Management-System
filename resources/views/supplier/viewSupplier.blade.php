@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Suppliers !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">{{ $single->name }}'s  profile</h3>
                                         <a href="{{ route('all.supplier') }}" class="btn btn-primary pull-right">
                                            <i class="fas fa-arrow-square-left"></i>Go Back</a>
                                    </div>
                                    <div class="panel-body">
                                       
                                      
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <p>{{ $single->name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <p>{{ $single->email }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone No.</label>
                                                    <p>{{ $single->phone }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address"> Address</label>
                                                   <p>{{ $single->address }}</p>
                                                </div>
                                                
                                               
                                                
                                                 
                                                 
                                            </div>
                                            <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="experience">Company/Shop Name</label>
                                                        <p>{{ $single->shop_name }}</p>
                                                    </div>
                                                   
                                                     <div class="form-group">
                                                        <label for="nid_no">Suppliers Type</label>
                                                        <p>{{ $single->type }}</p>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                       <p>{{ $single->city }}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file" style="cursor: pointer;">Photo</label>
                                                        <img src="{{ asset('images/supplier') }}/{{ $single->photo }}" style="height:90px;width:90px">
                                                       
                                                    </div>
                                            </div>
                                           
                                        
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                        </div>

                </div>
            </div>
     </div>
    
@endsection