@include('include.css-link')

@extends('template')

@section('content')
    <div class="content-wrapper">
    <div class="container">
    <div class="modal-dialog">

    @if (Auth::check() == !('admin' or 'operator'))
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Login</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" onclick="window.close();"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        {{-- Menampilkan error --}}
                        @include('errors.login_error_list')

                        <div class="well">
                            {!! Form::open(['url' => 'login', 'method' => 'POST']) !!}
                                <div class="form-group has-feedback">
                                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                                    {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) !!}
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'required']) !!}
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>

                                {!! Form::submit('Login', ['class' => 'btn btn-primary btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
        
                        <div class="callout callout-info">
                            <h4>Perhatian!</h4>
                            <p>Jangan pernah membagikan Email atau Password Anda kepada orang lain.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- /.box-body -->
            @endif
        </div> 
        <!-- /.box -->
    </div>
</div>
    </div>
@stop

@include ('include.js-link')