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
            @if (count($user_list) > 0)
              <table id="registerTable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <?php $i = 0; ?>
                <?php foreach($user_list as $user): ?>
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->level }}</td>
                    <td>
                        <div class="box-button">
                            {{ link_to('user/' . $user->id . '/edit', '', ['class' => 'fa fa-edit btn btn-warning btn-sm btn-flat', 'title' => 'Edit']) }}
                        </div>
                            <div class="box-button"> 
          {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) !!}
          {!! Form::button('', ['id' => 'delete','class' =>'fa fa-trash btn btn-danger btn-sm btn-flat', 'type' => 'submit', 'title' => 'Hapus']) !!}
          {!! Form::close() !!}
        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        @else
            <p>Tidak ada data user.</p>
        @endif
    </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
    </div>
    </div>
    </section>
    
    <div class="container">
        <div class="pull-left"> 
            <a href="user/create" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah User</a>
        </div>
    </div>
</div>

@stop

@section('js-add')
    <script>
        $(function() {
            $('#registerTable').DataTable();
               $(document).on('click', '#delete', function(){
              var c = confirm("Apakah anda ingin menghapus data?");
              if(c == false) {
                return false;
            }
    });
          })
    </script>
@stop

