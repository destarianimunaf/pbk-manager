<div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-blue">
                    {{ date('F, dS Y') }}
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{ date('H:i') }}</span>

                <h3 class="timeline-header">Create an email</h3>

                <div class="timeline-body">
                @if (isset($mailbox))
                    {!! Form::hidden('id', $mailbox->id) !!}
                @endif

                @if ($errors->any())
                    <div class="form-group {{ $errors->has('tanggal_kirim') ? 'has-error' : 'has-success' }}">
                @else
                    <div class="form-group">
                @endif
                    {!! Form::label('tanggal_kirim', 'Date :', ['class' => 'control-label']) !!}
                    {!! Form::date('tanggal_kirim', \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'tanggal_kirim']) !!}
                    @if ($errors->has('tanggal_kirim'))
                        <span class="help-block">{{ $errors->first('tanggal_kirim') }}</span>
                    @endif
                </div>

                @if ($errors->any())
                    <div class="form-group {{ $errors->has('pengirim') ? 'has-error' : 'has-success' }}">
                @else
                    <div class="form-group">
                @endif
                    {!! Form::label('pengirim', 'From :', ['class' => 'control-label']) !!}
                    {!! Form::text('pengirim', null, ['class' => 'form-control', 'placeholder' => 'operator@gmail.com']) !!}
                    @if ($errors->has('pengirim'))
                        <span class="help-block">{{ $errors->first('pengirim') }}</span>
                    @endif
                </div>

                @if ($errors->any())
                    <div class="form-group {{ $errors->has('penerima') ? 'has-error' : 'has-success' }}">
                @else
                    <div class="form-group">
                @endif
                    {!! Form::label('penerima', 'To :', ['class' => 'control-label']) !!}
                    {!! Form::text('penerima', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('penerima'))
                        <span class="help-block">{{ $errors->first('penerima') }}</span>
                    @endif
                </div>

                @if ($errors->any())
                    <div class="form-group {{ $errors->has('judul') ? 'has-error' : 'has-success' }}">
                @else
                    <div class="form-group">
                @endif
                    {!! Form::label('judul', 'Subject :', ['class' => 'control-label']) !!}
                    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('judul'))
                        <span class="help-block">{{ $errors->first('judul') }}</span>
                    @endif
                </div>

                @if ($errors->any())
                    <div class="form-group {{ $errors->has('isi_pesan') ? 'has-error' : 'has-success' }}">
                @else
                    <div class="form-group">
                @endif
                    {!! Form::label('isi_pesan', 'Pesan :', ['class' => 'control-label']) !!}
                    {!! Form::textarea('isi_pesan', '' , ['class' => 'form-control', 'placeholder' => 'Tulis pesan disini...']) !!}
                    @if ($errors->has('isi_pesan'))
                        <span class="help-block">{{ $errors->first('isi_pesan') }}</span>
                    @endif
                </div>

                @if ($errors->any())
                    <div class="form-group {{ $errors->has('scanregister') ? 'has-error' : 'has-success' }}">
                @else
                    <div class="form-group">
                @endif
                    {!! Form::label('attach', 'Attachment:') !!}
                    {!! Form::file('attach') !!}
                    @if ($errors->has('attach'))
                        <span class="help-block">{{ $errors->first('attach') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::submit($submitButtonText, ['class' => 'btn btn-block btn-default btn-flat']) !!}
                </div>
            
                <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->