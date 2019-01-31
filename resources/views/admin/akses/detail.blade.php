@extends('view_admin')
@section('judul', 'Hak Akses')
@section('content')
    <section class="content-header">
        <h1>Detail {{$data->nama}}</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4">    
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center">Role</h3>
                        <p class="text-center">{{$data->nama}}</p>
                        <br>
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <i class="fa fa-list"></i>
                    
                                <h3 class="box-title">List Daftar Akses</h3>
                            </div>
                            <div class="box-body">
                                <ul>
                                    @if (count($role_akses) > 0)
                                        @foreach ($role_akses as $r)
                                            <li>{{ $r->akses->nama }}</li>
                                            @if (count($status) > 0)
                                                @foreach ($status as $s)
                                                    @if ($s->id_akses == $r->akses->id)
                                                        <ul>
                                                            <li>{{ $s->detail->nama }}</li>
                                                        </ul>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('akses.index') }}" class="btn btn-danger btn-poss-create">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#menu" data-toggle="tab">Menu</a></li>
                        <li><a href="#akses" data-toggle="tab">Menu Akses</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="menu">
                            <form action="" method="post" class="form-horizontal akses">
                                {{ csrf_field() }}
                                {{-- {{dd($role_akses->id_akses)}} --}}
                                <div class="form-group has-feedback {{ $errors->has('id_akses') ? 'has-error' : '' }}">
                                    <label for="id_akses" class="col-sm-2 control-label">Menu </label>
                                    <div class="col-sm-10">
                                        <select class="form-control id_akses" style="width: 100%;" name="id_akses" required>
                                            <option selected> Choose One</option>
                                            @foreach ($akses as $a)
                                                {{-- @if ($a->id) --}}
                                                <option value="{{ $a->id }}">{{ $a->nama }}</option> 
                                                {{-- @endif --}}
                                            @endforeach     
                                        </select>
                                        @if ($errors->has('id_akses'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('id_akses') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                        <button type="submit" class="btn btn-success btn-poss-create">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="akses">
                            <form action="" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                                    <label for="nama" class="col-sm-2 control-label">Pilih Menu : </label>
                                    <div class="col-sm-10">
                                        <select class="form-control menu" style="width: 100%;" name="nama" required>
                                            <option selected> Choose One</option>
                                            {{-- @foreach ($akses as $a)
                                                <option value="{{ $a->id }}">{{ $a->nama }}</option> 
                                            @endforeach      --}}
                                        </select>
                                        @if ($errors->has('nama'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" id="fitur">
                                    <label for="kabupaten" class="col-sm-2 control-label">Fitur Menu :</label>
                                    <div class="col-sm-10">
                                        <select class="form-control fitur" style="width: 100%;" name="kabupaten" required>
                                            <option selected> Choose One</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                        <button type="submit" class="btn btn-success btn-poss-create">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(function() {
            $('#fitur').hide();

            $('.menu').on('change', function() {
                const ss = $(this).val();
                console.log(ss);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/akses/DetailAkses/'+ss,
                    success: function (data) {
                        console.log('masuk');
                        $('.fitur').html(data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
                $("#fitur").show();
            })

            $('.id_akses').on('change', function() {
                const ss    = $(this).val();
                var urls    = window.location.href;
                console.log(ss);
                console.log(urls);
                var url     = urls+'/'+ss;
                console.log(url);
                $('.akses').attr('action', url);
            })
        });
    </script>
@endpush