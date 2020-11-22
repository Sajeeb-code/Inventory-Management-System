@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Product !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Product details
                                         <a href="{{ route('import.product') }}" class="btn btn-danger pull-right" >Import Product</a>
                                           <a href="{{ route('all.product') }}" class="btn btn-primary pull-right" >All Product</a>
                                    </h3>
                                        <span class="ml-10">{{ date(' d F Y') }}</span>
                                    
                                     
                                    </div>
                                    <div class="panel-body">
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label for="product_name">Product Name </label>
                                                    <p>{{ $viewProducts->product_name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_code">Product Code </label>
                                                    <p>{{ $viewProducts->product_code }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_wareHouse">Product Ware House </label>
                                                    <p>{{ $viewProducts->product_wareHouse }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_route"> Product Route </label>
                                                   <p>{{ $viewProducts->product_route }}</p>
                                                </div>
                                                 <div class="form-group">
                                                        <label >Ctegory Type </label>
                                                       <p>{{ $viewProducts->category_name }}</p>
                                                 </div>
                                                 <div class="form-group">
                                                    <label >Supplier Name </label>
                                                    <p>{{ $viewProducts->name }}</p>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-5">
                                                     
                                                     <div class="form-group">
                                                         <label for="buy_date">Product Buying date </label>
                                                        <p>{{ $viewProducts->buy_date }}</p>
                                                     </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="expire_date">Expire Date </label>
                                                        <p>{{ $viewProducts->expire_date }}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="buying_price">Buying Price </label>
                                                        <p>{{ $viewProducts->buying_price }}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selling_price">Selling Price </label>
                                                       <p>{{ $viewProducts->selling_price }}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file" style="cursor: pointer;">Product Image</label><br>
                                                        <img src="{{ asset('images/product') }}/{{ $viewProducts->product_image }}" style="height:90px;width:90px">
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