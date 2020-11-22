@extends('layouts.app')
@section( 'content')
<div class="content-page">
                <!-- Start content -->
            <div class="content">
                <div class="container">
                     <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">POS</a></li>
                                    
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Import Product</h3>
                                        <a href="{{ route('export') }}" class="btn btn-primary pull-right" >Download Xlsx File</a>
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
                                        <form role="form" method="post" action="{{ route('import') }}" enctype="multipart/form-data">
                                           {{ csrf_field() }}
                                            <div class="col-md-8">
                                                 <div class="form-group">
                                                    <label for="import_product">Xlsx file import</label>
                                                    <input type="file" name="import_product"  >
                                                </div>
                                                
                                                  <button type="submit" class="btn btn-success waves-effect waves-light" value="submit">Upload</button>
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
   
@endsection