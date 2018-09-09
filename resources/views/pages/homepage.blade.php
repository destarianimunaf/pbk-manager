@extends('template')

@section('content')

@if(Auth::check())
<div class="content-wrapper">
    <section class="content-header">
      <h1>Homepage {{ ucwords($halaman) }} </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ ucwords($halaman) }}</li>
      </ol>
    </section>

     <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li>
              <i class="fa fa-info bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::now()->format('d F Y') }}</span>

                <h3 class="timeline-header"><a href="{{ URL::to('wp') }}">Jumlah Pendataan</a></h3>

                <div class="timeline-body">
        	
			      <div class="row">
			        <div class="col-md-3 col-sm-6 col-xs-12">
			          <div class="info-box">
			            <span class="info-box-icon bg-blue"><i class="fa fa-envelope"></i></span>

			            <div class="info-box-content">
                  @if (Auth::check() && Auth::user()->level == 'admin')
			              <span class="info-box-text"><a href="{{ URL::to('mailbox') }}">Kotak Masuk</a></span>
                  @else
                    <span class="info-box-text">Kotak Masuk</span>
                  @endif
			              <span class="info-box-number">{{ $jumlah_mailbox }}</span>
			            </div>
			            <!-- /.info-box-content -->
			          </div>
			          <!-- /.info-box -->
			        </div>
			        <!-- /.col -->
			        <div class="col-md-3 col-sm-6 col-xs-12">
			          <div class="info-box">
			            <span class="info-box-icon bg-blue"><i class="fa fa-list"></i></span>

			            <div class="info-box-content">
			              <span class="info-box-text">Daftar PBK</span>
			              <span class="info-box-number">{{ $jumlah_pbk }}</span>
			            </div>
			            <!-- /.info-box-content -->
			          </div>
			          <!-- /.info-box -->
			        </div>
			        <!-- /.col -->
			        <div class="col-md-3 col-sm-6 col-xs-12">
			          <div class="info-box">
			            <span class="info-box-icon bg-blue"><i class="fa fa-files-o"></i></span>

			            <div class="info-box-content">
			              <span class="info-box-text">Register</span>
			              <span class="info-box-number">{{ $jumlah_register }}</span>
			            </div>
			            <!-- /.info-box-content -->
			          </div>
			          <!-- /.info-box -->
			        </div>
			        <!-- /.col -->
			        <div class="col-md-3 col-sm-6 col-xs-12">
			          <div class="info-box">
			            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>

			            <div class="info-box-content">
			              <span class="info-box-text">Wajib Pajak</span>
			              <span class="info-box-number">{{ $jumlah_wp }}</span>
			            </div>
			            <!-- /.info-box-content -->
			          </div>
			          <!-- /.info-box -->
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->
			     </div>

            <li>
              <i class="fa fa-files-o bg-blue"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="{{ URL::to('register') }}">Register Pemindahbukuan</a></h3>

                <div class="timeline-body">
                  Terdapat {{ $jumlah_pending }} register belum di proses (pending)
                </div>
                <div class="timeline-footer">
                  <a href="{{ URL::to('register/homepage_register') }}" class="btn btn-default btn-flat btn-xs">Lihat Daftar</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->

            <li>
              <i class="fa fa-list bg-blue"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="{{ URL::to('register') }}">Daftar Pemindahbukuan</a></h3>
                
                <div class="timeline-body">
                  Terdapat {{ $jumlah_denied }} pemindahbukuan ditolak
                </div>
                <div class="timeline-footer">
                  <a href="{{ URL::to('pbk/homepage_pbk') }}" class="btn btn-default btn-flat btn-xs">Lihat Daftar</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->

            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
</div>
@endif

@if (Auth::check() == !('admin' or 'operator'))
<div class="content-wrapper">

    <section class="content-header">
      <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Login</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" onclick="window.close();"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="callout callout-info">
                            <h4>Perhatian!</h4>
                            <p>Jangan pernah membagikan Email atau Password Anda kepada orang lain.</p>
                        </div>

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
        
                        
                    </div>
                    
                </div>
            </div>
            <!-- /.box-body -->

    </section>
</div>
@endif

@stop