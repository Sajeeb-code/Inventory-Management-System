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
                            <div class="col-sm-12 bg-info">
                                <h4 class="pull-left page-title text-white">POS(Point Of Sale)</h4>
                                <ol class="breadcrumb pull-right">
                                    <li class=" text-white">{{ date('d F Y') }}</li>
                                </ol>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 " style="margin-bottom:10px ">
                                <div class="portfolioFilter">
                                    <a href="#" data-filter="*" class="current">All Category</a>
                                    @foreach($categories as $row)
                                         <a href="#" >{{ $row->category_name }}</a>
                                    @endforeach
                                    
                                </div>
                        </div>
                            <br>
                        <div class="row">
                            <div class="col-lg-5">
                               
                               <div class="price_card text-center">
                                        
                                        <ul class="price-features" style="border: 1px solid green">
                                            <table class="table">
                                                <thead class="bg-danger">
                                                    <tr>
                                                        <th class="text-white">Name</th>
                                                        <th class="text-white">Qty</th>
                                                        <th class="text-white">Price</th>
                                                        <th class="text-white">Sub Total</th>
                                                        <th class="text-white">Action</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $productall = Cart::content();
                                                @endphp
                                                <tbody>
                                                    @foreach($productall as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td>
                                                                <form action="{{ url('/update-cart/'.$row->rowId) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                     {{ method_field('PUT') }}
                                                                    <input type="number" name="qty" value="{{ $row->qty }}" style="width: 40px">
                                                                    <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px">
                                                                        <i class="fas fa-check-square"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>{{ $row->price }}</td>
                                                            <td>{{ $row->price*$row->qty }}</td>
                                                            <td><a href="{{ url('/cart-remove/'.$row->rowId) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                                                         </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                           
                                        </ul>
                                        <div class="pricing-footer bg-primary">
                                            <p >Quentity: {{ Cart::count() }}</p>
                                            <p >Sub Total: {{ Cart::subtotal() }}</p>
                                           
                                            <p >Vat: {{ Cart::tax() }}</p>
                                            {{-- <p >Discount: {{ Cart::discount() }}</p> --}}
                                            <hr>
                                            <span class="name">Total: {{ Cart::total() }} Taka</span>

                                        </div>

                                <form action="{{ url('/create-invoice') }}" method="POST">
                                         @csrf
                                         <div class="panel">
                                             @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error )
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            
                                            @endif
                                            <h4>Select Customer
                                                    <a href="#" class="btn btn-sm pull-right btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#con-close-modal">Add New</a>
                                            </h4>
                                            
                                                <select name="cus_id" id="" class="form-control">
                                                    <option value="" selected disabled>select customer--</option>
                                                    @foreach($customers  as $cus)
                                                        <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                                    @endforeach
                                                
                                                </select>
                                        </div>
                                         {{-- <input type="hidden" name="cus_id" value="{{ $cus->id }}"> --}}
                                </div> <!-- end Pricing_card -->
                                            <button class="btn btn-primary waves-effect  w-md" type="submit">Create Invoice</button>
                                  </form> 
                            </div>
                            <div class="col-lg-7">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Add to Cart</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Product Code</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <form action="{{ url('/add-cart') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->product_name }}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                                    <input type="hidden" name="weight" value="{{ $product->id }}">
                                                    {{-- <input type="hidden" name="order_date" value="{{ date('d/m/y') }}"> --}}
                                                <td>
                                                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-plus-circle"></i></button>
                                                </td>
                                                <td>
                                                     {{-- <a href="#" style="font-size: 30px"></a> --}}
                                                    <img src="{{ asset('images/product') }}/{{ $product->product_image }}" style="height: 70px; width:80px;" class="annonce-img">
                                                </td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->selling_price }}</td>
                                                <td>{{ $product->product_code }}</td>
                                                <td>{{ $product->category_name }}</td>

                                                </form>
                                               
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            {{-- add customer modal --}}
            <!-- /.modal -->
            <form action="{{ url('/insert-customer') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                            <div class="modal-header"> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                <h4 class="modal-title">Add New Customer</h4> 
                            </div> 
                            <div class="modal-body">
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
                                <div class="row"> 
                                    <div class="col-md-6"> 
                                        <div class="form-group"> 
                                            <label for="field-1" class="control-label">Name *</label> 
                                            <input type="text" class="form-control" id="field-1" name="name" placeholder="John" required> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-6"> 
                                        <div class="form-group"> 
                                            <label for="field-2" class="control-label">Email </label> 
                                            <input type="email" class="form-control" id="field-2" name="email" placeholder="Doe"> 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="row"> 
                                    <div class="col-md-6"> 
                                        <div class="form-group"> 
                                            <label for="field-3" class="control-label">Address *</label> 
                                            <input type="text" class="form-control" id="field-3" name="address" placeholder="Address" required> 
                                        </div> 
                                    </div> 
                                     <div class="col-md-6"> 
                                        <div class="form-group"> 
                                            <label for="field-4" class="control-label">City </label> 
                                            <input type="text" class="form-control" id="field-4" name="city" placeholder="Dhaka" > 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="row"> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-4" class="control-label">Phone *</label> 
                                            <input type="text" class="form-control" id="field-4" name="phone" placeholder="017XXXXXXXX" required> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-5" class="control-label">Shop Name</label> 
                                            <input type="text" class="form-control" id="field-5" name="shop_name" placeholder="Shop name "> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">NID No.</label> 
                                            <input type="text" class="form-control" id="field-6" name="nid_no" placeholder="123456"> 
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row"> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-4" class="control-label">Bank Name</label> 
                                            <input type="text" class="form-control" id="field-4" name="bank_name" placeholder="Bank name"> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-5" class="control-label">Bank Branch</label> 
                                            <input type="text" class="form-control" id="field-5" name="bank_branch" placeholder="Bank Branch "> 
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Account Holder</label> 
                                            <input type="text" class="form-control" id="field-6" name="account_holder" placeholder="Holder Name"> 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="row"> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-5" class="control-label">Account No.</label> 
                                            <input type="text" class="form-control" id="field-5" name="account_no" placeholder="Account No."> 
                                        </div> 
                                    </div> 
                                   
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            <label for="field-6" class="control-label">Photo</label> 
                                            
                                            <input type="file"  accept="image/*" class="form-control" name="photo" id="field-6"  onchange="loadFile(event)" required>
                                            
                                        
                                        </div> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <div class="form-group"> 
                                            
                                            <img id="output" width="100" />
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
                            </div> 
                        </div> 
                    </div>
                </div><!-- /.modal -->
            </form>
     <script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
@endsection
