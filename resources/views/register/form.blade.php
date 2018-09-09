<div class="showback">
    @if (isset($register))
        {!! Form::hidden('id', $register->id) !!}
    @endif

    @if ($errors->any())
        <div class="form-group {{ $errors->has('tanggal_masuk') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('tanggal_masuk', 'Tanggal Masuk:', ['class' => 'control-label']) !!}
        {!! Form::date('tanggal_masuk', !empty($register) ? $register->tanggal_masuk: \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'tanggal_masuk']) !!}
        @if ($errors->has('tanggal_masuk'))
            <span class="help-block">{{ $errors->first('tanggal_masuk') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group chzn-select {{ $errors->has('id_wp') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group chzn-select">
    @endif
        {!! Form::label('id_wp', 'NPWP :', ['class' => 'control-label']) !!}
        @if(count($list_wp) > 0)
            {!! Form::select('id_wp', $list_wp, null, ['class' => 'form-control', 'id' => 'id_wp', 'placeholder' => 'Pilih NPWP']) !!}
        @else
            <p>Tidak ada pilihan NPWP</p>
        @endif
        @if ($errors->has('id_wp'))
            <span class="help-block">{{ $errors->first('id_wp') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('nomor_pem') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('nomor_pem', 'No. PEM :', ['class' => 'control-label']) !!}
        {!! Form::text('nomor_pem', null, ['class' => 'form-control']) !!}
        @if ($errors->has('nomor_pem'))
            <span class="help-block">{{ $errors->first('nomor_pem') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('nama_pengaju') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('nama_pengaju', 'Nama Pengaju :', ['class' => 'control-label']) !!}
        {!! Form::text('nama_pengaju', null, ['class' => 'form-control']) !!}
        @if ($errors->has('nama_pengaju'))
            <span class="help-block">{{ $errors->first('nama_pengaju') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('jenis_pajak') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('jenis_pajak', 'Jenis Pajak :', ['class' => 'control-label']) !!}
        {!! Form::text('jenis_pajak', null, ['class' => 'form-control']) !!}
        @if ($errors->has('jenis_pajak'))
            <span class="help-block">{{ $errors->first('jenis_pajak') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('masa') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('masa', 'Masa/Tahun Pajak :', ['class' => 'control-label']) !!}
        {!! Form::text('masa', null, ['class' => 'form-control']) !!}
        @if ($errors->has('masa'))
            <span class="help-block">{{ $errors->first('masa') }}</span>
        @endif
    </div>


    @if ($errors->any())
        <div class="form-group {{ $errors->has('setor') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('setor', 'Nilai Besaran Setoran (Rp) :', ['class' => 'control-label']) !!}
        {!! Form::text('setor', null, ['class' => 'form-control']) !!}
        @if ($errors->has('setor'))
            <span class="help-block">{{ $errors->first('setor') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('nilai_pbk') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('nilai_pbk', 'Nilai Besaran Pbk (Rp) :', ['class' => 'control-label']) !!}
        {!! Form::text('nilai_pbk', null, ['class' => 'form-control']) !!}
        @if ($errors->has('nilai_pbk'))
            <span class="help-block">{{ $errors->first('nilai_pbk') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('cp') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('cp', 'Contact Person:', ['class' => 'control-label']) !!}
        {!! Form::text('cp', null, ['class' => 'form-control']) !!}
        @if ($errors->has('cp'))
            <span class="help-block">{{ $errors->first('cp') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('scanregister') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('scanregister', 'Scan Permohonan:') !!}
        {!! Form::file('scanregister') !!}
        @if ($errors->has('scanregister'))
            <span class="help-block">{{ $errors->first('scanregister') }}</span>
        @endif
    </div>

    @if ($errors->any())
        <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('keterangan', 'Keterangan Proses:', ['class' => 'control-label']) !!}
        <div class="radio">
            <label>{!! Form::radio('keterangan', 'proses') !!} On Process</label>
        </div>
        <div class="radio">
            <label>{!! Form::radio('keterangan', 'pending') !!} Pending</label>
        </div>
        @if ($errors->has('keterangan'))
            <span class="help-block">{{ $errors->first('keterangan') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>