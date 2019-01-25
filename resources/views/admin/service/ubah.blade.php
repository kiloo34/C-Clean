@extends('view_admin')
@section('judul', 'Perbarui Service')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Perbarui Service</h3>
        </div>
        {{-- {{dd($data->id)}} --}}
        <form action="{{ route('service.update', $data->id) }}" method="post">
            <div class="box-body">
                {{ method_field('PUT') }}
                {{ csrf_field('PUT') }}
                <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{$data->nama}}" name="nama">
                    @if ($errors->has('nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                    <span class="fa fa-pencil-square-o form-control-feedback"></span>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('service.index') }}" class="btn btn-danger"><span class="fa fa-backward"></span>  Cancel</a>
                <button type="submit" class="btn btn-primary btn-poss-create" onclick="confirm('Apakah Data yang Anda Masukan Sudah Benar ?')"><span class="fa fa-upload"></span> Submit</button>
            </div>
        </form>
    </div>
@endsection