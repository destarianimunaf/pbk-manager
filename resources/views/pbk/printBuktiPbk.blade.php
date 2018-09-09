
@include('include.css-link')
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->

  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
        <small class="pull-right">{{ Carbon\Carbon::now()->format('d/m/Y') }}</small>
          <table>
            <tr>
              <th style="width: 30%"><img src="{{ asset('img/pajak-logo.jpg') }}" height="50"></th>
              <th><br><h4><strong>Direktorat Jendral Pajak</strong></h4>
              <h5>Kantor Pelayanan Pajak Pratama</h5>
              </th>
            </tr>
          </table>
          
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        From
        <address>
          <strong>Kantor Pelayanan Pajak Pratama</strong><br>
          Jalan M. Noer Sumur Putri<br>
          Teluk Betung, Bandar Lampung<br>
          Phone: (804) 123-5432, www.pajak.go.id<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-6 invoice-col">
        To
        <address>
          <strong>{{ $pbk->register->wp->nama_wp }}</strong>, {{ $pbk->register->nama_pengaju }}<br>
          {{ $pbk->register->wp->alamat }}<br>
          Bandar Lampung, Lampung<br>
          {{ $pbk->register->cp }}
        </address>
      </div>
    </div>
    <!-- /.row -->

    <p class="text-muted well well-sm no-shadow" style="margin-top: 20px; width: 100%; font-size: 15px">
      <strong>{{ $pbk->register->wp->nama_wp }}</strong>
    </p>

    <!-- Table row -->
    <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <tr>
                  <th style="width: 50%">Data Pemindahbukuan</th>
                  <th>Keterangan Pemindahbukuan</th>
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
                  <td>Nilai Pemindahbukuan</td>
                  <td>Rp {{ number_format($pbk->register->nilai_pbk,0,',','.') }}.00,-</td>
                </tr>
                <tr>
                  <td>Tanggal Masuk</td>
                  <td>{{ $pbk->register->tanggal_masuk->format('d/m/Y') }}</td>
                </tr>
                <tr>
                  <td>Status</td>
                  @if ($pbk->status == 'denied')
                    <td style="color: red">DENIED</td>
                  @else
                    <td style="color: red">ACCEPTED</span></td>
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
      <!-- /.col -->
    </div>
    <!-- /.row -->

        @if ($pbk->status == 'denied')
          <i class="fa fa-list" style="font-size: 15px"></i>  Ditolak pada tanggal {{ $pbk->tanggal_cetak->format('d/m/Y') }}<br><br>
        @else
          <i class="fa fa-list" style="font-size: 15px"></i>  Telah Dipindahbukukan pada tanggal {{ $pbk->tanggal_cetak->format('d/m/Y') }}<br><br>
        @endif


    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Kepala Seksi Pengawasan dan Konsultasi I
          </p>
          <br>
          <br>
          <br>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Muhammad Ridwan, S.E.,M.Ap
          </p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

</body>

