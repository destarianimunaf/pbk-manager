@extends('template')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>Edit Wajib Pajak </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wajib Pajak</li>
      </ol>
    </section>

     <section class="content">
      <div class="row">

        <div class="col-xs-12">
        <div class="box">
            <div class="box-header"></div>

        <div class="box-body">
        {!! Form::model($wp, ['method' => 'PATCH', 'action' => ['WpController@update', $wp->id], 'files' => true]) !!}
            @include('wp.form', ['submitButtonText' => 'Update Wajib Pajak'])
        {!! Form::close() !!}
        </div>
    </div>
    </div>
    </div>
    </section>
    </div>
@stop