@include('include.css-link')

<div class="showback">
@if (isset($wp))
    {!! Form::hidden('id', $wp->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('npwp') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
<div class="form-group">
    {!! Form::open(['url' => 'wp', 'method' => 'POST']) !!}
    {!! Form::label('npwp', 'NPWP : ', ['class' => 'control-label']) !!}
    {!! Form::text('npwp', null, ['id' => 'npwp', 'class' => 'form-control']) !!}

    @if ($errors->has('npwp'))
        <span class="help-block">{{ $errors->first('npwp') }}</span>
    @endif
</div>
    
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_wp') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_wp', 'Nama Wajib Pajak Ybs:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_wp', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_wp'))
        <span class="help-block">{{ $errors->first('nama_wp') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('alamat', 'Alamat:', ['class' => 'control-label']) !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
    @if ($errors->has('alamat'))
        <span class="help-block">{{ $errors->first('alamat') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control btn-flat']) !!}
</div></div>

@include ('include.js-link')