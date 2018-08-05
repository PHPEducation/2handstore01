@extends('client.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 bg-white mt-5 pb-4">
                {!! Form::open(['method' => 'POST', 'url' => route('register.resendEmail'), 'class' => 'form-horizontal mt-4']) !!}
                <div class="form-group row">
                    {!! Form::label('email', 'Email:', ['class' => 'col-form-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('email', null, ['class' => 'form-control', 'required', 'type' => 'email', 'placeholder' => __('input your email')]) !!}
                        @if($errors->has('email'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                    {!! Form::submit(__('resend verify email'), array('class' => 'btn btn-success')) !!}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection