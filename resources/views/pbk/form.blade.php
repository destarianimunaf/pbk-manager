<div class="showback">
    @if (isset($pbk))
        {!! Form::hidden('id', $pbk->id) !!}
    @endif

    @if ($errors->any())
        <div class="form-group {{ $errors->has('id_register') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('id_register', 'No. PEM :', ['class' => 'control-label']) !!}
        @if(count($register_list) > 0)
            {!! Form::select('id_register', $register_list, null, ['class' => 'form-control', 'id' => 'id_register', 'placeholder' => 'Pilih No. PEM']) !!}
        @else
            <p>Tidak ada pilihan No. PEM</p>
        @endif
        @if ($errors->has('id_register'))
            <span class="help-block">{{ $errors->first('id_register') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('nomor_pbk') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('nomor_pbk', 'No. PBK:', ['class' => 'control-label']) !!}
        {!! Form::text('nomor_pbk', null, ['class' => 'form-control']) !!}
        @if ($errors->has('nomor_pbk'))
            <span class="help-block">{{ $errors->first('nomor_pbk') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('status') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('status', 'Status Proses:', ['class' => 'control-label']) !!}
        <div class="radio">
            <label>{!! Form::radio('status', 'done') !!} Sudah Dipindahbukukan</label>
        </div>
        <div class="radio">
            <label>{!! Form::radio('status', 'denied') !!} Ditolak</label>
        </div>
        @if ($errors->has('status'))
            <span class="help-block">{{ $errors->first('status') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('tanggal_cetak') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('tanggal_cetak', 'Tanggal Cetak:', ['class' => 'control-label']) !!}
        {!! Form::date('tanggal_cetak', !empty($pbk) ? $pbk->tanggal_cetak: \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'tanggal_cetak']) !!}
        @if ($errors->has('tanggal_cetak'))
            <span class="help-block">{{ $errors->first('tanggal_cetak') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('lokasi_map') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('lokasi_map', 'Lokasi Map :', ['class' => 'control-label']) !!}
        {!! Form::text('lokasi_map', null, ['class' => 'form-control']) !!}
        @if ($errors->has('lokasi_map'))
            <span class="help-block">{{ $errors->first('lokasi_map') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('reason') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('reason', 'Keterangan Bukti :', ['class' => 'control-label']) !!}
        {!! Form::text('reason', null, ['class' => 'form-control']) !!}
        @if ($errors->has('reason'))
            <span class="help-block">{{ $errors->first('reason') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('pos') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('pos', 'Keterangan Lain:', ['class' => 'control-label']) !!}
        <div class="radio">
            <label>{!! Form::radio('pos', 'kirim') !!} Kirim Berkas</label>
        </div>
        <div class="radio">
            <label>{!! Form::radio('pos', 'ambil') !!} Tidak Dikirim</label>
        </div>
        @if ($errors->has('pos'))
            <span class="help-block">{{ $errors->first('pos') }}</span>
        @endif
    </div>
    
    @if ($errors->any())
        <div class="form-group {{ $errors->has('scanregister') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('scanpbk', 'Attachment:') !!}
        {!! Form::file('scanpbk') !!}
        @if ($errors->has('scanpbk'))
            <span class="help-block">{{ $errors->first('scanpbk') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>