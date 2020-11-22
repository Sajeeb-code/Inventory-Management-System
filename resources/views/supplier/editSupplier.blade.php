@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Supplier !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Suppliers</h3>
                                         <a href="{{ route('all.supplier') }}" class="btn btn-primary pull-right" >All Supplier</a>
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
                                       
                                        <form role="form" method="post" action="{{ url('/update-supplier/'.$edit->id) }}" enctype="multipart/form-data">
                                           {{ csrf_field() }}
                                           {{ method_field('PUT') }}
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="full name" required value="{{ $edit->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required value="{{ $edit->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone No.</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone number" required value="{{ $edit->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address"> Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"  value="{{ $edit->address }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="shop_name">Shop Name</label>
                                                    <input type="text" class="form-control" id="shop_name name="shop_name placeholder="shop_name"  value="{{ $edit->shop_name }}">
                                                </div>
                                                  <div class="form-group">
                                                    <label for="bank_name">Bank Name</label>
                                                    <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="bank_name" value="{{ $edit->bank_name }}">
                                                </div>
                                                
                                                 <button type="submit" class="btn btn-purple waves-effect waves-light" value="submit">Update Supplier</button>
                                                 
                                            </div>
                                            <div class="col-md-5">

                                                    <div class="form-group">
                                                        <label for="bank_branch">Bank Branch</label>
                                                        <input type="text" class="form-control" id="bank_branch" name="bank_branch" placeholder="bank_branch"  value="{{ $edit->bank_branch }}">
                                                     </div>
                                                     <div class="form-group">
                                                        <label for="account_holder">Account Holder Branch</label>
                                                        <input type="text" class="form-control" id="account_holder" name="account_holder" placeholder="account_holder"  value="{{ $edit->account_holder }}">
                                                     </div>
                                                     <div class="form-group">
                                                        <label for="account_no">Account No.</label>
                                                        <input type="text" class="form-control" id="account_no" name="account_no" placeholder="account_no"  value="{{ $edit->account_no }}">
                                                     </div>
                                                     <div class="form-group">
                                                      <label for="nid_no">Supplier Type</label>
                                                       <select name="type" class="form-control">
                                                           <option value="{{ $edit->type }}">{{ $edit->type }}</option>
                                                            <option value="Distributor">Distributor</option>
                                                           <option value="WholeSaler">Whole Saler</option>
                                                           <option value="Broker">Broker</option>
                                                           {{-- <option value="{{ $edit->type }}">{{ $edit->type }}</option>
                                                           {{-- <option value="{{ $edit->type }}">{{ $edit->type }}</option>
                                                           <option value="{{ $edit->type }}">{{ $edit->type }}</option> --}} --}}
                                                       </select>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="city" required value="{{ $edit->city }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file" style="cursor: pointer;">Photo</label>
                                                       <input type="file"  accept="image/*" name="photo" id="file"  onchange="loadFile(event)" >
                                                       
                                                       <img id="output" width="200" />
                                                    </div>
                                                    <div  class="form-group">
                                                        <img src="{{ asset('images/supplier') }}/{{ $edit->photo }}" style="height:80px;width:80px;">
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

