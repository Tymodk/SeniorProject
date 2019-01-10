@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Aanmelden') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-mailadres') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary kdg">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>

                <p class="p-2 pt-5"><a href="https://mega.nz/?fbclid=IwAR0mqX_cYgy7S1QQv-dy9Y7UiJ-zmV37BEAqNlF4LSiK7rqrclSnMekYQkw#!bSwRDCCC!xrkZNKBex2fmHAizOkuhxvqf6hlPzT_HD_7BZGfNBPc" target="_blank">Gelieve dit programma te downloaden voor het scannen te laten werken</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
