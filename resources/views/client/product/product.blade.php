@extends('client.layout.master')

@section('css')

<link rel="stylesheet" href="{{ asset('css/product.css') }}">

@endsection


@section('title', 'Demo')


@section('content')

<div class="container">
    <div class="product-top">
        <div class="product-top-left">
            <div class="product-images">
                <div class="product-slideshow">
                    <img id="show" src="{{ asset('images/productImage1.jpeg') }}" alt="product image 1">
                    <div class="product-slideshow-dots">
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="product-carousel owl-carousel owl-theme">
                    <a href="javascript:void(0)" class="item">
                        <img class="item-thumb" src="{{ asset('images/productImage1.jpeg') }}" alt="product image 1">
                    </a>
                </div>
            </div>
        </div>
        <div class="product-top-right">
            <div class="product-detail">
                <div class="product-title">
                    <h1>Bộ Bàn Phím Giả Cơ và Chuột Chuyên Game LIMEIDE GTX300 2017 Led 7 Màu (Màu Trắng)</h1>
                </div>
                <div class="product-price">
                    <span class="newprice">
                        <strong>500.000 đ</strong>
                    </span>
                </div>
            </div>
            <div class="product-detail">
                <div class="product-title">
                    <h1>
                        <label>{{ __('Contact') }} :</label>
                        <span class="text-danger"><strong>{{ $product->user->phone }}</strong></span>
                    </h1>
                </div>
            </div>
            <div class="product-detail">
                <div class="shipping">
                    {!! 
                        Form::open([
                            'class' => 'form-inline'
                        ]) 
                    !!}
                        {!! 
                            Form::label(
                                'shipping', 
                                __('client.product.shipto'), 
                                [
                                    'class' => 'control-label'
                                ]
                            ) 
                        !!}
                        
                        {!! 
                            Form::select(
                                'shipping', 
                                [
                                    'Ha Noi',
                                    'Ho Chi Minh'
                                ], 
                                null, 
                                [
                                    'class' => 'form-control col-md-4 ml-2'
                                ]
                            ) 
                        !!}

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="product-detail">
                <div class="product-order">
                    <a href="#" class="btn btn-primary col-md-4">
                        <i class="fas fa-comments"></i>
                        @lang('client.product.contact')
                    </a>
                    <a href="#" class="btn btn-success col-md-4">
                        <i class="fas fa-shopping-cart"></i>
                        @lang('client.product.buynow')
                    </a>
                    <button class="btn btn-secondary report ml-5" type="button" data-toggle="modal" data-target="#report-modal">{{ __('Report') }}</button>
                </div>
            </div>
            <div class="product-infor">
                <table>
                    <tr>
                        <td class="product-infor-lable">@lang('client.category.category')</td>
                        <td class="product-infor-value">
                            <a href="#">Demo</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="product-infor-lable">
                            @lang('client.product.brand')
                        </td>
                        <td class="product-infor-value">
                            <a href="#">Demo</a>
                        </td>
                    </tr>
                </table>
                <div class="product-description">
                    <span>@lang('client.product.description')</span>
                    <p class="product-description-content mb-0">
                        Demo
                    </p>
                    <span class="show-more">
                        <a href="javascript:void(0)">
                            @lang('client.product.showmore')
                        </a>
                    </span>
                </div>
            </div>
            <div class="product-owner">
                <div class="avatar">
                    <img src="{{ asset('images/img_avatar.png') }}" alt="avatar">
                </div>
                <div class="owner-infor">
                    <div>
                        <label for="owner-name">
                            @lang('client.product.postedby')
                        </label>
                        <span name="owner-name">
                            <a href="#">Nguyen Van Nam</a>
                        </span>
                    </div>
                    <div>
                        <label for="owner-address">
                            @lang('client.product.address')
                        </label>
                        <span name="owner-address">Hà Đông, Hà Nội</span>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="comment-section mt-3">
        <h2 class="text-primary">
            @lang('client.product.comment')
        </h2>
        <div class="comments">
            <div class="comment">
                <div class="avatar"><img alt="avatar" src="{{ asset('images/img_avatar.png') }}"></div>
                <div class="comment-content">
                    <div class="commnet-owner">
                        <a href="#">Nguyen Van Nam</a>
                    </div>
                    <p>afsadjflasd jfajsdfajsfd;asdf ;asjdf;ajsdf;asdjf a;sf</p>
                </div>
                <div class="reply">
                    <a href="#">
                        <i class="fas fa-reply"></i>
                        @lang('client.product.reply')
                    </a>
                </div>
            </div>
            <div class="comment reply-comment">
                <div class="avatar">
                    <img alt="avatar" src="{{ asset('images/img_avatar.png') }}">
                </div>
                <div class="comment-content">
                    <div class="commnet-owner">
                        <a href="#">Nguyen Van Nam</a>
                    </div>
                    <p>afsadjflasd jfajsdfajsfd;asdf ;asjdf;ajsdf;asdjf a;sf</p>
                </div>
                <div class="reply">
                    <a href="#">
                        <i class="fas fa-reply"></i>
                        @lang('client.product.reply')
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-editor">
        <form action="#">
            <div class="form-group">
                <textarea name="comment" class="form-control" rows="5" placeholder="@lang('client.product.comment')"></textarea>
                <button class="btn btn-primary mt-2" type="submit">
                    @lang('client.product.comment')
                </button>
            </div>
        </form>
    </div>
    <div class="box suggested mt-3">
        <div class="box__title">
            @lang('client.product.related')
        </div>
        <div class="products suggested-carousel owl-carousel owl-theme">
            <a href="#" class="item">
                <img src="{{ asset('images/productImage1.jpeg') }}" alt="">
                <p>Ten san pham 1</p>
                <div class="item__foot">
                    <b>100.000.000 VND</b>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span>(10000)</span>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="modal fade" id="report-modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Report') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    {!! Form::label(__('Type'), null, ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::select('type', trans('message.type'), null, [
                            'id' => 'type',
                            'class' => 'form-control'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label(__('Description'), null, ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-12">
                        {!! Form::textarea('content', null, [
                                'id' => 'report-content',
                                'class' => 'form-control',
                                'rows' => '3'
                            ]
                        ) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="report('{{ route('client.report.store', ['id' => $product->id]) }}')" 
                    data-dismiss="modal" data-toggle="modal" data-target="#message">{{ __('Submit') }}</button>
                <button class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="message">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ __('Sent') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>{{ __('Your Report Have Been Sent') }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
          </div>
        </div>
      </div>
@endsection
