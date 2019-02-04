@extends('view_admin')
@section('judul', 'Tambah Akses')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Akses</h3>
        </div>
        <form action="{{ route('akses.store') }}" method="post">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Akses" name="nama">
                    @if ($errors->has('nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                    <span class="fa fa-pencil-square-o form-control-feedback"></span>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-poss-create">Submit</button>
            </div>
        </form>
    </div>
@endsection