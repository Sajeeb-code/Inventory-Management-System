@extends('layouts.app')

@section('content')
    
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-info"><i class="fas fa-user-friends"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        @php
                                            $employees = DB::table('employees')->get();
                                           
                                        @endphp
                                        <span class="counter">{{ $employees->count('name') }}</span>
                                       Number Of Employee
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-purple"><i class="fas fa-people-carry"></i></span>
                                    @php
                                        $suppliers = DB::table('suppliers')->get();
                                    @endphp
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{ $suppliers->count('name') }}</span>
                                        Number of Supplier
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-success"><i class="fas fa-users-class"></i></i></span>
                                    @php
                                        $customer = DB::table('customers')->get();
                                    @endphp
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{ $customer->count('name') }}</span>
                                       Number Of Customer
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="fas fa-align-justify"></i></span>
                                    @php
                                        $category = DB::table('categories')->get();
                                    @endphp
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter">{{ $category->count('category_name') }}</span>
                                       Number Of Category
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End row-->



                        <span class="text-danger"><b>Employee</b></span>
                       <div class="row port">
                           @php
                               $employee_section = DB::table('employees')->get();
                           @endphp
                           @foreach ($employee_section as $emp)
                            <div class="portfolioContainer">
                                <div class="col-sm-6 col-lg-3 col-md-4 webdesign illustrator">
                                    <div class="gal-detail thumb">
                                        
                                        <a href="{{ asset('images/employee') }}/{{ $emp->photo }}" class="image-popup" title="Screenshot-1">
                                            <img src="{{ asset('images/employee') }}/{{ $emp->photo }}" 
                                            class="thumb-img" alt="work-thumbnail"
                                            style="height: 120px;width:160px; border-radius: 50%;">
                                        </a>
                                        <h4>{{ $emp->name }}</h4>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> <!-- End row -->

                        <br><hr>



                        <span class="text-danger"><b>Suppliers</b></span>
                       <div class="row port">
                           @php
                               $supplier_sec = DB::table('suppliers')->get();
                           @endphp
                           @foreach ($supplier_sec as $supp)
                            <div class="portfolioContainer">
                                <div class="col-sm-6 col-lg-3 col-md-4 webdesign illustrator">
                                    <div class="gal-detail thumb">
                                        
                                        <a href="{{ asset('images/supplier') }}/{{ $supp->photo }}" class="image-popup" title="Screenshot-1">
                                            <img src="{{ asset('images/supplier') }}/{{ $supp->photo }}" 
                                            class="thumb-img" alt="work-thumbnail"
                                            style="height: 120px;width:160px;border-radius: 50%;">
                                        </a>
                                        <h4>{{ $supp->name }}</h4>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> <!-- End row -->

                        <br><hr>



                        <span class="text-danger"><b>Products</b></span>
                       <div class="row port">
                           @php
                               $products = DB::table('products')->get();
                           @endphp
                           @foreach ($products as $item)
                            <div class="portfolioContainer">
                                <div class="col-sm-6 col-lg-3 col-md-4 webdesign illustrator">
                                    <div class="gal-detail thumb">
                                        
                                        <a href="{{ asset('images/product') }}/{{ $item->product_image }}" class="image-popup" title="Screenshot-1">
                                            <img src="{{ asset('images/product') }}/{{ $item->product_image }}" 
                                            class="thumb-img" alt="work-thumbnail"
                                            style="height: 120px;width:160px;">
                                        </a>
                                        <h4>{{ $item->product_name }}</h4>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection
