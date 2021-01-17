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
                                    <div class="panel-heading"><h3 class="panel-title">Edit Employee</h3>
                                    <a href="{{ route('all.employee') }}" class="btn btn-primary pull-right" >All Employee</a>
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
                                        <form role="form" method="post" action="{{ url('/update-employee/'.$edit->id) }}" enctype="multipart/form-data">
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
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required value="{{ $edit->address }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="experience">Experience</label>
                                                    <input type="text" class="form-control" id="experience" name="experience" placeholder="yes,2 years / No" required value="{{ $edit->experience }}">
                                                </div>
                                                
                                                 <button type="submit" class="btn btn-purple waves-effect waves-light" value="submit">Submit</button>
                                                 
                                            </div>
                                            <div class="col-md-5">
                                                     <div class="form-group">
                                                        <label for="nid_no">NID NO.</label>
                                                        <input type="text" class="form-control" id="nid_no" name="nid_no" placeholder="national id no" required value="{{ $edit->nid_no }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salary">Salary</label>
                                                        <input type="text" class="form-control" id="salary" name="salary" placeholder="salary" required value="{{ $edit->salary }}">
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
                                                        <img src="{{ asset('images/employee') }}/{{ $edit->photo }}" style="height:80px;width:80px;">
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