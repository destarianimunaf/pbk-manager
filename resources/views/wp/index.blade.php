@extends('template')

@section('css-add')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css') }}">
@stop
    
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>Wajib Pajak </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wajib Pajak</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        @include('_partial.flash_message')

        <div class="box">
          <div class="box-header">    
        </div>
      
            <!-- /.box-header -->
        <div class="box-body">
          
          @if(Auth::check() && Auth::user()->level == 'admin')
          <div class="col-xs-6">  
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Import Data</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <h5>File input (.csv, .xls,.xlsx)</h5>
                        <input type="file" name="import_file" />
                        </div>
                    <div class="tombol-nav">
                        <button class="btn btn-block btn-default btn-flat"><i class="fa fa-cloud-upload "></i> Import Data</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          <div class="col-xs-6">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Export Data</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#csv" data-toggle="tab">.csv</a>
                                </li>
                                <li><a href="#xls" data-toggle="tab">.xls</a>
                                </li>
                                <li><a href="#xlsx" data-toggle="tab">.xlsx</a>
                                </li>
                                <li><a href="#pdf" data-toggle="tab">print pdf</a>
                                </li>
                            </ul>
                                                        <div class="tab-content">
                                <div class="tab-pane fade in active" id="csv">
                                    <h6>Export to .xls</h6>
                                    <a href="{{ URL::to('downloadExcel/csv') }}" class="btn btn-block btn-default btn-flat" ><i class="fa fa-cloud-download"></i> Eksport Data (.csv)</a>
                                </div>
                                <div class="tab-pane fade" id="xls">
                                    <h6>Export to .xls</h6>
                                    <a href="{{ URL::to('downloadExcel/xls') }}" class="btn btn-block btn-default btn-flat" ><i class="fa fa-cloud-download"></i> Eksport Data (.xls)</a>
                                </div>
                                <div class="tab-pane fade" id="xlsx">
                                    <h6>Export to .xlsx</h6>
                                    <a href="{{ URL::to('downloadExcel/xlsx') }}" class="btn btn-block btn-default btn-flat" ><i class="fa fa-cloud-download"></i> Eksport Data (.xlsx)</a>
                                </div>
                                <div class="tab-pane fade" id="pdf">
                                    <h6>Print as PDF</h6>
                                    <a href="{{ URL::to('pdf') }}" target="_blank" class="btn btn-block btn-default btn-flat" ><i class="fa fa-cloud-download"></i> Print as PDF</a>
                                </div>
                            </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
      @endif

            <div class="container"></div>

              <table id="wpTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NPWP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        @if(Auth::check() && Auth::user()->level == 'admin')
                          <th>Action</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($wp_list as $wp) 
                      <tr>
                      <td>{{ $wp->npwp }}</td>
                        <td>{{ $wp->nama_wp }}</td>
                        <td>{{ $wp->alamat }}</td>
                        @if(Auth::check() && Auth::user()->level == 'admin')
                          <td>
                                  <div class="box-button">
                                      {{ link_to('wp/' . $wp->id . '/edit', '', ['class' => 'fa fa-edit btn btn-warning btn-sm btn-flat', 'title' => 'Edit']) }}
                                  </div>

                                                              <div class="box-button"> 
          {!! Form::open(['method' => 'DELETE', 'action' => ['WpController@destroy', $wp->id]]) !!}
          {!! Form::button('', ['id' => 'delete','class' =>'fa fa-trash btn btn-danger btn-sm btn-flat', 'type' => 'submit', 'title' => 'Hapus']) !!}
          {!! Form::close() !!}
        </div>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          </div>
          </section>

    </div>
@stop

@section('js-add')
    <script>
        $(function() {
            $('#wpTable').DataTable();
               $(document).on('click', '#delete', function(){
              var c = confirm("Apakah anda ingin menghapus data?");
              if(c == false) {
                return false;
            }
    });
          })
    </script>
@stop