@extends('view_admin')
@section('judul', 'Hak Akses')
@section('content')
    <section class="content-header">
        <h1>Detail {{$data->nama}}</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">    
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <p class="profile-username text-center">Role</p>
                        <h3 class="text-center">{{$data->nama}}</h3>
                        <br>
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <i class="fa fa-list"></i>
                                <h3 class="box-title">List Daftar Akses</h3>
                            </div>
                            <div class="box-body">
                                <table id="dt" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        @if (count($role_akses) > 0)
                                            @foreach ($role_akses as $r)
                                                @if ($r->status == true)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{ $r->detail->nama }}</td>
                                                        <td><a href="" class="btn btn-danger btn-xs btn-poss-create delete-btn" data-id="{{$r->detail->id}}"> Hapus Akses</a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('akses.index') }}" class="btn btn-danger btn-poss-create">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#akses" data-toggle="tab">Menu Akses</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane">
                            <form action="" method="post" class="form-horizontal detail">
                                {{ csrf_field() }}
                                <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                                    <label for="nama" class="col-sm-3 control-label">Pilih Menu : </label>
                                    <div class="col-sm-9">
                                        <select class="form-control menu" style="width: 100%;" name="nama" required>
                                            <option selected> Choose One</option>
                                            @foreach ($akses as $a)
                                                <option value="{{ $a->id }}">{{ $a->nama }}</option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('nama'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" id="id_detail">
                                    <label for="id_detail" class="col-sm-3 control-label">Fitur Menu :</label>
                                    <div class="col-sm-9">
                                        <select class="form-control fitur" style="width: 100%;" name="id_detail" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" class="btn btn-danger cancel">Cancel</button>
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
            
            $('#id_detail').hide();

            $('.menu').on('change', function() {
                const ss = $(this).val();
                // console.log(ss);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/public/akses/DetailAkses/'+ss,
                    success: function (data) {
                        // console.log('masuk');
                        $('.fitur').html(data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
                $("#id_detail").show();
            });
        });

        $(".cancel").on("click", function () {
            console.log('masuk');
            $('.detail option').prop('selected', function() {
                return this.defaultSelected;
            });
            $('#id_detail').hide();
            $('.fitur option').remove();
        });

        $('.detail').on('change', function() {
            const ss    = $('.fitur').val();
            var urls    = window.location.href;
            var url     = urls+'/'+ss;
            // console.log(url);
            $('.detail').attr('action', url);
        });

        $('.delete-btn').on('click', function(e){
            e.preventDefault();

            const ss    = $(this).attr('data-id');
            var action  = window.location.href;
            var split   = action.split("/");
            var url     = "/"+split[3]+"/edit/"+split[4]+"/"+ss;

            // console.log(ss);
            // console.log(action);
            // console.log(url);

            swal({
                title: "Yakin Menghapus Akses Ini ??",
                // text: message, 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Data Belum dihapus");
            }
            });
        });
    </script>
@endpush