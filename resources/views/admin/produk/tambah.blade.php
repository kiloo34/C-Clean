@extends('view_admin')
@section('judul', 'Tambah Produk')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Produk</h3>
        </div>
        <form action="{{ route('produk.store') }}" method="post">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Produk" name="nama" required>
                    <span class="fa fa-pencil-square-o form-control-feedback"></span>
                    @if ($errors->has('nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('durasi') ? 'has-error' : '' }}">
                    <label>Durasi</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="durasi" placeholder="Durasi" name="durasi" required>
                        <span class="input-group-addon"> Hari</span>
                    </div>
                    @if ($errors->has('durasi'))
                        <span class="help-block">
                            <strong>{{ $errors->first('durasi') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('harga') ? 'has-error' : '' }}">
                    <label>Harga</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="uang" placeholder="Harga" name="harga" required>
                        <span class="input-group-addon"><strong>/ kg</strong></span>
                    </div>
                    @if ($errors->has('harga'))
                        <span class="help-block">
                            <strong>{{ $errors->first('harga') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('service') ? 'has-error' : '' }}">
                    <label>Service</label>
                    <select class="form-control service" style="width: 100%;" name="service">
                        <option value="">Pilih Salah Satu</option> 
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option> 
                        @endforeach    
                    </select>
                    @if ($errors->has('service'))
                        <span class="help-block">
                            <strong>{{ $errors->first('service') }}</strong>
                        </span>
                    @endif 
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-poss-create">Submit</button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $(".service").select2()
        });
    </script>
@endpush