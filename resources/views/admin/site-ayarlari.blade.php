@extends('layouts.master')
@section('icerik')
    <!-- Page Header -->
    <header class="masthead mavi-back">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Site Ayarları</h1>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header text-center">{{ __('Site Ayarları') }}</div>

                    <div class="card-body">
                        {!! Form::open(["url" => "/site-ayarlari/guncelle", "method" => "put"]) !!}
                        @foreach($ayarlar as $ayar)
                            {!! Form::bsText($ayar->name,trans("formlar.".$ayar->name),$ayar->value ) !!}
                        @endforeach
                        {!! Form::bsSubmit("KAYDET") !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
