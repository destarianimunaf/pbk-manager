@extends('template')

@section('css-add')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css') }}">
@stop
    
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>Pemindahbukuan ({{ ucwords($halaman) }}) </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ ucwords($halaman) }}</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
        @include('_partial.flash_message')

         <div class="box">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="pbkTable" class="table">
                <thead>
                    <tr>
                        <th>No. PEM</th>
                        <th>No. PBK</th>
                        <th>Nama Pengaju</th>
                        <th>Tanggal Cetak</th>
                        <th>Status</th>
                        <th><i class=" fa fa-edit"></i> Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($pbk_list as $pbk)
                      <tr>
                        <td>PEM: {{ $pbk->register->nomor_pem }}\324\III\2017</td>
                        <td>PBK: {{ $pbk->nomor_pbk }}\I\WPJ.28\KP.0503\2017</td>
                        <td>{{ $pbk->register->nama_pengaju }}</td>
                        <td>{{ $pbk->tanggal_cetak->format('d-m-Y') }}</td>
                        @if ($pbk->status == 'denied')
                            <td>Denied</td>
                        @else
                            <td>Accepted</td>
                        @endif

                        <td>
                            <div class="box-button">
                                {{ link_to('pbk/' . $pbk->id, '', ['class' => 'fa fa-eye btn btn-success btn-sm btn-flat', 'title' => 'Detail']) }}
                            </div>
                            @if(Auth::check() && Auth::user()->level == 'admin')
                                <div class="box-button">
                                    {{ link_to('pbk/' . $pbk->id . '/edit', '', ['class' => 'fa fa-edit btn btn-warning btn-sm btn-flat', 'title' => 'Edit']) }}
                                </div>
                                <div class="box-button"> 
                                  {!! Form::open(['method' => 'DELETE', 'action' => ['PbkController@destroy', $pbk->id]]) !!}
                                  {!! Form::button('', ['id' => 'delete','class' =>'fa fa-trash btn btn-danger btn-sm btn-flat', 'type' => 'submit', 'title' => 'Hapus']) !!}
                                  {!! Form::close() !!}
                                </div>
                            @endif
                            </div>
                        </td>
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
            $('#pbkTable').DataTable();
               $(document).on('click', '#delete', function(){
              var c = confirm("Apakah anda ingin menghapus data?");
              if(c == false) {
                return false;
            }
    });
          })
    </script>
@stop