@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Employee !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                    
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Customer</h3>
                                        <a href="{{ route('all.customer') }}" class="btn btn-primary pull-right" >All Customer</a>
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
                                        <form role="form" method="post" action="{{ url('/insert-customer') }}" enctype="multipart/form-data">
                                           {{ csrf_field() }}
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label for="name">Full Name *</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="full name" required >
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone No. *</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address"> Address *</label>
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                                                </div>
                                               
                                                
                                                
                                                  <button type="submit" class="btn btn-purple waves-effect waves-light" value="submit">Submit</button>
                                            </div>
                                            <div class="col-md-5">

                                                    <div class="form-group">
                                                        <label for="shop_name">Shop Name</label>
                                                        <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Shop name" >
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="city" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file" style="cursor: pointer;">Photo</label>
                                                       <input type="file"  accept="image/*" name="photo" id="file"  onchange="loadFile(event)" >
                                                       
                                                       <img id="output" width="200" />
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