@extends('template')

@section('css-add')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css') }}">
@stop
    
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>{{ ucwords($halaman) }} </h1>
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

              <table id="mailboxTable" class="table">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Pengirim</th>
                        <th>Subyek</th>
                        @if(Auth::check() && Auth::user()->level == 'admin')
                          <th>Tanggal Terima</th>
                        @elseif(Auth::check() && Auth::user()->level == 'operator')
                          <th>Tanggal Kirim</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($mailbox_list as $mailbox)
                      <tr>
                        <td>
                          <button class="fa fa-trash btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#myModal"></button>

                        </td>
                        <td><a href="{{ URL::to('mailbox/' . $mailbox->id)}}">{{ $mailbox->pengirim}}</a></td>
                        <td><a href="{{ URL::to('mailbox/' . $mailbox->id)}}">{{ $mailbox->judul}}</a></td>
                        <td>{{ $mailbox->tanggal_kirim }}</td>
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
            $('#mailboxTable').DataTable();
               $(document).on('click', '#delete', function(){
              var c = confirm("Apakah anda ingin menghapus data?");
              if(c == false) {
                return false;
            }
    });
          })
    </script>
@stop