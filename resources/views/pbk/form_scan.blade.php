<div class="showback">
    @if (isset($pbk))
        {!! Form::hidden('id', $pbk->id) !!}
    @endif

    @if ($errors->any())
        <div class="form-group {{ $errors->has('scanpbk') ? 'has-error' : 'has-success' }}">
    @else
        <div class="form-group">
    @endif
        {!! Form::label('scanpbk', 'Scan Bukti Pemindahbukuan :', ['class' => 'control-label']) !!}
        {!! Form::open(array('url' => 'scanpbk', 'method' => 'POST', 'files' => 'true')) !!}
        {!! Form::file('image[]', array('multiple' =>true)) !!}
        @if ($errors->has('scanpbk'))
            <span class="help-block">{{ $errors->first('scanpbk') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', array('class' => 'btn btn-primary form-control')) !!}
        {!! Form::close() !!}
    </div>
</div>