@extends('view_admin')
@section('judul', 'Tambah Cabang')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Cabang</h3>
        </div>
        {{-- {{!! dd($data->districts->name) !!}} --}}
        <form action="{{ route('cabang.store') }}" method="post">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                    <label for="nama">Nama Cabang</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nama" placeholder="Nama Cabang" name="nama">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    </div>
                    @if ($errors->has('nama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="provinsi">Provinsi </label>
                            <select class="form-control provinsi" style="width: 100%;" name="provinsi" required>
                                <option selected> Provinsi</option>
                                @foreach ($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option> 
                                @endforeach     
                            </select>
                            @if ($errors->has('nama'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3" id="kabupaten">
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten </label>
                            <select class="form-control kabupaten" style="width: 100%;" name="kabupaten" required>
                                <option selected> Kabupaten</option>  
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3" id="kecamatan">
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan </label>
                            <select class="form-control kecamatan" style="width: 100%;" name="kecamatan" required>
                                <option selected> Kecamatan</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3" id="desa">
                        <div class="form-group">
                            <label for="desa">Desa </label>
                            <select class="form-control desa" style="width: 100%;" name="desa" required>
                                <option selected> Desa</option> 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback {{ $errors->has('alamat') ? 'has-error' : '' }}">
                    <label for="alamat">Alamat </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat Cabang" name="alamat">
                        <span class="input-group-addon"><i class="fa fa-thumb-tack"></i></span>
                    </div>
                    @if ($errors->has('alamat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alamat') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('no_telp') ? 'has-error' : '' }}">
                    <label for="no_telp">No Telepon</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="no_telp" placeholder="ex : 08......." name="no_telp">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    </div>
                    @if ($errors->has('no_telp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('no_telp') }}</strong>
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
            $(".provinsi").select2();
            $(".kabupaten").select2();
            $(".kecamatan").select2();
            $(".desa").select2();

            $("#kabupaten").hide();
            $("#kecamatan").hide();
            $("#desa").hide();

            $(".provinsi").on('change', function () {
                const ss = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/cabang/kabupaten/'+ss,
                    success: function (data) {
                        console.log('masuk');
                        $('.kabupaten').html(data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
                $("#kabupaten").show();
            });

            $(".kabupaten").on('change', function () {
                const ss = $(this).val();
                console.log(ss);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/cabang/kecamatan/'+ss,
                    success: function (data) {
                        console.log('masuk');
                        $('.kecamatan').html(data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
                $("#kecamatan").show();
            });
            
            $(".kecamatan").on('change', function () {
                const ss = $(this).val();
                console.log(ss);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/cabang/desa/'+ss,
                    success: function (data) {
                        console.log('masuk');
                        $('.desa').html(data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
                $("#desa").show();
            });
        });
    </script>
@endpush