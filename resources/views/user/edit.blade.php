@extends('template')

@section('main')
    <div id="user">
        <h2>Edit User</h2>

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
            @include('user.form', ['submitButtonText' => 'Update User'])
        {!! Form::close() !!}
    </div>
@stop


@extends('template')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>Edit {{ ucwords($halaman) }} </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ ucwords($halaman) }}</li>
      </ol>
    </section>

     <section class="content">
      <div class="row">

      <div class="col-xs-12">
        <div class="box">
           <div class="box-header"></div>

	        <div class="box-body">
	        <div id="user">
	        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
	            @include('user.form', ['submitButtonText' => 'Update User'])
	        {!! Form::close() !!}
	        </div>
    	   </div>
        </div>
    </div>
    </div>
    </section>
    </div>
@stop