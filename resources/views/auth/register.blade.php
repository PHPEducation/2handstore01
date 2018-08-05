@extends('client.layout.master')


@section('title', __('auth.register'))


@section('content')

<div class="login">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 bg-white mt-5 pb-4">
                <h2 class="text-center mt-4">
                    @lang('auth.register')
                </h2>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                {!! Form::open(
                    [
                        'url' => route('register'),
                        'method' => 'POST'
                    ]
                    ) 
                !!}

                    <div class="form-group row">

                        {!! Form::label(
                                __('auth.fullname'), 
                                null, 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        !!}

                        <div class="col-sm-9">
                            {!! Form::text(
                                    'name', 
                                    null, 
                                    [
                                        'placeholder' => __('auth.fullname'),
                                        'class' => 'form-control',
                                        'required'
                                    ]
                                ) 
                            !!}
                            @if ($errors->has('name'))
                            <span>
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">

                        {{ Form::label(
                                __('auth.email'), 
                                null, 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        }}

                        <div class="col-sm-9">
                            {!! Form::text(
                                    'email', 
                                    null, 
                                    [
                                        'placeholder' => __('auth.email'),
                                        'class' => 'form-control',
                                        'required'
                                    ]
                                )
                            !!}
                            @if ($errors->has('email'))
                            <span>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">

                        {{ Form::label(
                                __('auth.phone'), 
                                null, 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        }}

                        <div class="col-sm-9">
                            {!! Form::text(
                                    'phone', 
                                    null,   
                                    [
                                        'placeholder' => __('auth.phone'),
                                        'class' => 'form-control'
                                    ]
                                )
                            !!}
                            @if ($errors->has('phone'))
                            <span>
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label(
                                __('auth.password'), 
                                null, 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        }}
                        <div class="col-sm-9">
                            {!! Form::password(
                                    'password',
                                    [
                                        'placeholder' => __('auth.password'),
                                        'class' => 'form-control',
                                        'required'
                                    ]
                                ) 
                            !!}
                            @if ($errors->has('password'))
                            <span>
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label(
                                'password_confirmation',
                                __('auth.repassword'), 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        }}
                        <div class="col-sm-9">
                            {!! Form::password(
                                    'password_confirmation',
                                    [
                                        'placeholder' => __('auth.repassword'),
                                        'class' => 'form-control',
                                        'id' => 'password_confirm',
                                        'required'
                                    ]
                                ) 
                            !!}
                            @if ($errors->has('password_confirmation'))
                            <span>
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label(
                                __('auth.city'), 
                                null, 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        }}
                        <div class="col-sm-9">
                            {!! Form::select(
                                    'city',
                                    [
                                        'Ha Noi' => 'Ha Noi'
                                    ],
                                    null,
                                    [
                                        'class' => 'custom-select my-1 mr-sm-2'
                                    ]
                                ) 
                            !!}
                            @if ($errors->has('city'))
                            <span>
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-center">
                        {!! Form::button(__('auth.register'), 
                                [
                                    'class' => 'btn btn-success px-5',
                                    'type' => 'submit',
                                ]) 
                        !!}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection
