@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Category !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Category</h3>
                                         <a href="{{ route('all.category') }}" class="btn btn-primary pull-right" >All Category</a>
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
                                        <form role="form" method="post" action="{{ url('/update-category/'.$editCategory->id) }}" >
                                           {{ csrf_field() }}
                                           {{ method_field('PUT') }}
                                            <div class="col-md-5">
                                                 <div class="form-group">
                                                    <label for="category_name">Full Name</label>
                                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder=" category_name" required value="{{ $editCategory->category_name }}">
                                                </div>
                                                
                                                 <button type="submit" class="btn btn-purple waves-effect waves-light" value="submit">Update Category</button>
                                                 
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