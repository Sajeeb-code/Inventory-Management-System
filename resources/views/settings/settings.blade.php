@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Settings !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update settings</h3>
                                     
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
                                        <form role="form" method="post" action="{{ url('/update-website-setting/'.$settings->id) }}" enctype="multipart/form-data">
                                           {{ csrf_field() }}
                                           {{ method_field('PUT') }}
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label for="company_name">Company Name</label>
                                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder=" company_name" value="{{ $settings->company_name }}" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_email">Email address</label>
                                                    <input type="email" class="form-control" id="company_email" name="company_email" placeholder="Enter email" required value="{{ $settings->company_email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_phone">Phone No.</label>
                                                    <input type="text" class="form-control" id="company_phone"company_ name="company_phone" placeholder="phone number" required value="{{ $settings->company_phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_address">Company Address</label>
                                                    <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Address" required value="{{ $settings->company_address }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_zipcode">Company zipcode</label>
                                                    <input type="text" class="form-control" id="company_zipcode" name="company_zipcode" placeholder="zipcode" required value="{{ $settings->company_zipcode }}">
                                                </div>
                                                
                                                 <button type="submit" class="btn btn-purple waves-effect waves-light" value="submit">Submit</button>
                                                 
                                            </div>
                                            <div class="col-md-5">
                                                     <div class="form-group">
                                                        <label for="company_city">Company city</label>
                                                        <input type="text" class="form-control" id="company_city" name="company_city" placeholder="city" required value="{{ $settings->company_city }}">
                                                    </div>
                                                   <div class="form-group">
                                                        <label for="company_country">Country</label>
                                                        <input type="text" class="form-control" id="company_country" name="company_country" placeholder="country" required value="{{ $settings->company_country }}">
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="file" style="cursor: pointer;">Photo</label>
                                                       <input type="file"  accept="image/*" name="company_logo" id="file"  onchange="loadFile(event)" >
                                                       
                                                       <img id="output" width="200" />
                                                    </div>
                                                    <div  class="form-group">
                                                        <img src="{{ asset('images/company') }}/{{ $settings->company_logo }}" style="height:80px;width:80px;">
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