@extends('template')

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
        <div class="col-md-12">
          <div class="box">

          <div class="box-body">
              <table class="table table-bordered">
                <tr>
                    <th style="width: 400px">Cetak Bukti Pemindahbukuan</th>
                    <td>
                      <a href="{{ URL::to('printBuktiPbk/' .$pbk->id) }}" target="_blank" class="btn btn-app">
                        <i class="fa fa-print"></i> Cetak
                      </a>
                    </td>
                </tr>
              </table>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 400px">Data Wajib Pajak</th>
                  <th>Keterangan WP</th>
                </tr>
                <tr>
                  <td>NPWP</td>
                  <td>{{ number_format($pbk->register->wp->npwp,0,'.','.') }}</td>
                </tr>
                <tr>
                  <td>Nama Wajib Pajak</td>
                  <td>{{ $pbk->register->wp->nama_wp }}</td>
                </tr>
                <tr>
                  <td>Alamat WP</td>
                  <td>{{ $pbk->register->wp->alamat }}</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 400px">Data Pemindahbukuan</th>
                  <th>Keterangan Pbk</th>
                </tr>
                <tr>
                  <td>No. PEM</td>
                  <td>PEM: {{ $pbk->register->nomor_pem }}\324\III\{{ date('Y') }}</td>
                </tr>
                <tr>
                  <td>No. PBK</td>
                  <td>PBK: {{ $pbk->nomor_pbk }}\I\WPJ.28\KP.0503\{{ date('Y') }}</td>
                </tr>
                <tr>
                  <td>Nama Pengaju</td>
                  <td>{{ $pbk->register->nama_pengaju }}</td>
                </tr>
                <tr>
                  <td>Jenis Pajak</td>
                  <td>{{ $pbk->register->jenis_pajak }}</td>
                </tr>
                <tr>
                  <td>Masa/Tahun Pajak</td>
                  <td>{{ $pbk->register->masa }}</td>
                </tr>
                <tr>
                  <td>Besaran Bayar/Setoran</td>
                  <td>Rp {{ number_format($pbk->register->setor,0,',','.') }}.00,-</td>
                </tr>
                <tr>
                  <td>Nilai yang diajukan</td>
                  <td>Rp {{ number_format($pbk->register->nilai_pbk,0,',','.') }}.00,-</td>
                </tr>
                <tr>
                  <td>Tanggal Masuk</td>
                  <td>{{ $pbk->register->tanggal_masuk->format('d-m-Y') }}</td>
                </tr>
                <tr>
                  <td>Tanggal Cetak</td>
                  <td>{{ $pbk->tanggal_cetak->format('d-m-Y') }}</td>
                </tr>
                <tr>
                  <td>Keterangan Bukti (Dikirim/Diambil) </td>
                  @if ($pbk->pos == 'kirim')
                    <td><i class="fa fa-bus"></i> Dikirim</td>
                  @else
                    <td><i class="glyphicon glyphicon-envelope"></i> Diambil</td>
                  @endif
                </tr>
                <tr>
                  <td>Status</td>
                  @if ($pbk->status == 'denied')
                    <td><span class="label label-danger label-mini">DENIED</span></td>
                  @else
                    <td><span class="label label-success label-mini">ACCEPTED</span></td>
                  @endif
                </tr>

                @if ($pbk->status == 'denied')
                    <tr>
                      <td>Keterangan</td>
                      <td>{{ $pbk->reason }}</td>
                    </tr>
                @endif
              </table>
            </div>

            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                    <th style="width: 400px;">Scan Permohonan dan Bukti Pemindahbukuan</th>
                    <td>
                      @if (isset($pbk->register->scanregister))
                        <a id="example7" href="{{ asset('scanregister/' . $pbk->register->scanregister) }}" title="Register Pemindahbukuan"  ><img src="{{ asset('scanregister/' . $pbk->register->scanregister) }}" height=original width="210" alt="" /></a>
                      @else
                        <a id="example7" href="{{ asset('scanregister/nopict.png') }}" title="Register Pemindahbukuan"  ><img src="{{ asset('scanregister/nopict.png') }}" alt="" /></a>
                        @endif
                    </td>

                    <td>

                    @if (isset($pbk->scanpbk))
                      <ul class="mailbox-attachments clearfix">
                        <li>
                          <span class="mailbox-attachment-icon"><i class="fa fa-image"></i></span>

                          <div class="mailbox-attachment-info">
                            <a href="{{ asset('uploadsPbk/' . $pbk->scanpbk) }}" class="mailbox-attachment-name" target="_blank"><i class="fa fa-paperclip"></i> {{ $pbk->scanpbk}}</a>
                            <span class="mailbox-attachment-size">
                            (Download Here)
                            <a target="_blank" href="{{ asset('uploadsPbk/'. $pbk->scanpbk) }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                          </span>
                    @endif
                    </td>
                </tr>
              </table>
            </div>

          </div>
          <!-- /.box -->
        </section>

    </section>
    </div>
@stop