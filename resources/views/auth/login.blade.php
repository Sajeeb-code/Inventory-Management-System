@extends('layouts.app')

@section('content')

 <div class="wrapper-page" >
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>POS System</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- email --}}
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control  @error('email') is-invalid @enderror input-lg " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                        </div>
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>



                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

 --}}

                        {{-- passworod --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('password') is-invalid @enderror input-lg" name="password" required autocomplete="current-password" type="password" required="" placeholder="Password">
                        </div>
                         @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right ">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}


                        {{-- remember me --}}
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input class="form-check-input" id="checkbox-signup" type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="form-check-label" for="remember">
                                     {{ __('Remember Me') }}
                                </label>
                            </div>
                            
                        </div>
                    </div>


                         {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}


                        {{-- login --}}
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit"> {{ __('Login') }}</button>
                        </div>
                        
                    </div>



                     {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}



                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a  href="{{ route('password.request') }}">
                               
                           </i> Forgot your password?</a>
                        </div>
                        {{-- <div class="col-sm-5 text-right">
                            <a href="register.html">Create an account</a>
                        </div> --}}
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>
@endsection
