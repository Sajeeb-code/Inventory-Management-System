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
                                    <div class="panel-heading"><h3 class="panel-title">Edit Product</h3>
                                         <span class="ml-10">{{ date(' d F Y') }}</span>
                                      <a href="{{ route('all.product') }}" class="btn btn-primary pull-right" >All Product</a>
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
                                        <form role="form" method="post" action="{{ url('/update-product/'.$editProduct->id) }}" enctype="multipart/form-data">
                                           {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label for="product_name">Product Name *</label>
                                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder=" product_name" value="{{ $editProduct->product_name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_code">Product Code *</label>
                                                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter product_code" required value="{{ $editProduct->product_code }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="product_wareHouse">Product Ware House *</label>
                                                    {{-- <input type="text" class="form-control" id="product_wareHouse" name="product_wareHouse" placeholder="product_wareHouse " required value="{{ $editProduct->product_wareHouse }}"> --}}
                                                    <textarea name="product_description" class="form-control" id="" cols="30" rows="10" required>{{ $editProduct->product_description }}</textarea>
                                                </div>
                                                
                                               <br>
                                                 <button type="submit" class="btn btn-lg btn-purple waves-effect waves-light" value="submit">Submit</button>
                                                 
                                            </div>
                                            <div class="col-md-5">

                                                    @php
                                                        $cat = DB::table('categories')->get();
                                                    @endphp
                                                
                                                    <div class="form-group">
                                                        <label >Ctegory Type *</label>
                                                       <select name="cat_id" class="form-control">
                                                           @foreach($cat as $row)
                                                                <option value="{{ $row->id }}"
                                                                    <?php if ($editProduct->cat_id==$row->id) {
                                                                        echo 'selected'; } 
                                                                    ?>
                                                                    >{{ $row->category_name }}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                    @php
                                                        $sup = DB::table('suppliers')->get();
                                                    @endphp
                                                     <div class="form-group">
                                                        <label >Supplier Type *</label>
                                                       <select name="supp_id" class="form-control">
                                                           @foreach($sup as $row)
                                                               <option value="{{ $row->id }}"
                                                                <?php if ($editProduct->supp_id==$row->id) {
                                                                   echo 'selected';
                                                                } ?>
                                                                >{{ $row->name }}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                     <div class="form-group">
                                                         <label for="buy_date">Product Buying date *</label>
                                                         <input type="date" class="form-control" id="buy_date" name="buy_date" placeholder="buy_date" required value="{{ $editProduct->buy_date }}">
                                                     </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="buying_price">Buying Price *</label>
                                                        <input type="text" class="form-control" id="buying_price" name="buying_price" placeholder="buying_price" required value="{{ $editProduct->buying_price }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selling_price">Selling Price *</label>
                                                        <input type="text" class="form-control" id="selling_price" name="selling_price" placeholder="selling_price" required value="{{ $editProduct->selling_price }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file" style="cursor: pointer;">Product Image</label>
                                                       <input type="file"  accept="image/*" name="product_image" id="file"  onchange="loadFile(event)" >
                                                        <img id="output" width="200" />
                                                       <img  width="200"  src="{{ asset('images/product') }}/{{ $editProduct->product_image }}"/>
                                                    </div>
                                            </div>
                                           
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                        </div>

                </div>
            </div>
     </div>
     <script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
@endsection