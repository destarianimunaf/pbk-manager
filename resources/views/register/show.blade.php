@extends('template')

@section('css-add')
    <link rel="stylesheet" href="{{asset('plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css') }}">
@stop

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>Detail {{ ucwords($halaman) }} </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ ucwords($halaman) }}</li>
      </ol>
    </section>

     <section class="content">
      <div class="row">

        <div class="col-xs-12">
        
        @if ($register->keterangan == 'proses')
            <div class="callout callout-info">
                <h4>Pemindahbukuan sedang di proses</h4>
                <p>Deadline akan jatuh pada tanggal {{ $register->tanggal_masuk->addDays(30)->format('d-m-Y') }}</p>
            </div>
        @else
            <div class="callout callout-danger">
              <h4>Pending, belum terproses!</h4>
              <p>Deadline akan jatuh pada tanggal {{ $register->tanggal_masuk->addDays(30)->format('d-m-Y') }}</p>
            </div>
        @endif

        <div class="box box-default">
            <div class="box-body">
            Register Pemindahbukuan a.n <strong>{{ $register->wp->nama_wp }}</strong>
            </div>
        </div>

        <div class="box">
            <table class="table">
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>{{ $register->tanggal_masuk->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>NPWP</th>
                    <td>{{ $register->wp->npwp }}</td>
                </tr>
                <tr>
                    <th>No. PEM</th>
                    <td>PEM : {{ $register->nomor_pem }}\324\III\2017</td>
                </tr>
                <tr>
                    <th>Nama Pengaju</th>
                    <td>{{ $register->nama_pengaju }}</td>
                </tr>
                <tr>
                    <th>Jenis Pajak</th>
                    <td>{{ $register->jenis_pajak }}</td>
                </tr>
                <tr>
                    <th>Masa/Tahun Pajak</th>
                    <td>{{ $register->masa }}</td>
                </tr>
                <tr>
                    <th>Besaran Bayar/Setoran</th>
                    <td>Rp {{ number_format($register->setor,0,',','.') }}.00,-</td>
                </tr>
                <tr>
                    <th>Besaran yang diajukan</th>
                    <td>Rp {{ number_format($register->nilai_pbk,0,',','.') }}.00,-</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $register->cp }}</td>
                </tr>
                <tr>
                    <th>Keterangan Proses</th>
                    @if ($register->keterangan == 'proses')
                        <td><span class="label label-success label-mini">{{ $register->keterangan }}</span></td>
                    @else
                        <td><span class="label label-warning label-mini">{{ $register->keterangan }}</span></td>
                    @endif
                </tr>
                <tr>
                    <th>Scan Permohonan</th>
                    <td>
                        @if (isset($register->scanregister) == '.jpg')
                            <a id="example7" href="{{ asset('scanregister/' . $register->scanregister) }}" title="Register Pemindahbukuan"  ><img src="{{ asset('scanregister/' . $register->scanregister) }}" height=original width="210" alt="" /></a>
                        @else
                            <a id="example7" href="{{ asset('scanregister/nopict.png') }}" title="Register Pemindahbukuan"  ><img src="{{ asset('scanregister/nopict.png') }}" alt="" /></a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>


    </section>
    </div>
@stop

@section('js-add')
    <script>
        $(function() {
            $("example7").fancybox({
                'titlePosition' : 'inside'
            });
        });
    </script>
@stop