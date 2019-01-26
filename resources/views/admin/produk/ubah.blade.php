@extends('view_admin')
@section('judul', 'Ubah '. $produk->nama)
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Ubah Produk</h3>
        </div>
        <form action="{{ route('produk.update', $produk->id) }}" method="post">
            <div class="box-body">
                {{ method_field('PUT') }}
                {{ csrf_field('PUT') }}
                <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" value="{{ $produk->nama }}" name="nama" required>
                    <span class="fa fa-pencil-square-o form-control-feedback"></span>
                    @if ($errors->has('nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Durasi</label>
                    <div class="input-group has-feedback {{ $errors->has('durasi') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" id="durasi" value="{{ $produk->durasi }}" name="durasi" required>
                        <span class="input-group-addon"> Hari</span>
                        @if ($errors->has('durasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('durasi') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <div class="input-group has-feedback {{ $errors->has('harga') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" id="harga" value="{{ $produk->harga }}" name="harga" required>
                        <span class="input-group-addon"><strong>/ kg</strong></span>
                        @if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Service</label>
                    <select class="form-control service" disabled style="width: 100%;" name="service" required>
                        <option value="{{ $produk->service->id }}" selected>{{ $produk->service->nama }}</option>
                    </select>
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