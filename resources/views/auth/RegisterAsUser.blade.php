@extends('layouts.app')
@section('mainstyle')
    @include('inc.mainstyle')
@endsection
@section('mainscript')
    @include('inc.mainscript')
@endsection
@section('back')
  style="background-image:url('{{ URL::asset('Ayat_web/img/header.jpg') }}'); background-size:cover;"
@endsection
@section('content')
<div class="container" style="margin-top:5%">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card border border-warning shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="Number" type="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('number') }}" required autofocus>

                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('City'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('City') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('ZIP') }}</label>

                            <div class="col-md-6">
                                <input id="zip" type="number" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ old('zip') }}" required autofocus>

                                @if ($errors->has('zip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control">
                                    <option>male</option>
                                    <option>female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bdate" class="col-md-4 col-form-label text-md-right">{{ __('Birth Day') }}</label>
                            <select id="y" name="year" class="form-control"style="width: 14%; margin-left: 15px;"></select>
                            <select id="m" name="month" class="form-control" style="width:14%; margin-left: 10px;"></select>
                            <select id="d" name="day" class="form-control" style="width: 14%; margin-left: 10px;"></select>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Your Biography') }}</label>
                            <textarea name="about" class="form-control" rows="5" style="width: 46%; margin-left: 2%"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('A link to your CV') }}</label>

                            <div class="col-md-6">
                                <input id="resume" type="url" class="form-control{{ $errors->has('resume') ? ' is-invalid' : '' }}" name="resume" value="{{ old('resume') }}" required autofocus>

                                @if ($errors->has('resume'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('resume') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="int" class="col-md-4 col-form-label text-md-right">{{ __('Your interests') }}</label>
                            <textarea name="interests" class="form-control" rows="2" style="width: 46%; margin-left: 2%"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="edu" class="col-md-4 col-form-label text-md-right">{{ __('Your Education information') }}</label>
                            <textarea name="education" class="form-control" rows="5" style="width: 46%; margin-left: 2%" placeholder="This Order (Start Year , End Year , Degree , institution) if there are multiple Education insert in separate lines"></textarea>
                        </div>
                        <div class="input-group">

                            <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>
                              <div class="input-group-prepend" style="margin-left: 1.5%">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="profile_picture">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                            </div>
                         </div>
                        <div class="form-group row mb-0  align-items-center justify-content-center">
                            <div class="col-md-6 offset-md-4" style="margin-bottom: 2%">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/selectBoxes.js') }}"></script>
@endsection
