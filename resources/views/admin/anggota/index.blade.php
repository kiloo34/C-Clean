@extends('view_admin')
@section('judul', 'Anggota')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">    
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Sub Menu</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="{{ route('anggota.index') }}"><i class="fa fa-user"></i> Anggota</a></li>
                            <li><a href="{{ route('akses.index') }}"><i class="fa fa-key"></i> Hak Akses<span class="label label-primary pull-right"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Data anggota</h3>
                        <a href="{{ route('anggota.create') }}" class="btn btn-m btn-primary btn-poss-create"><span class="fa fa-plus-square"></span> Tambah</a>
                    </div>
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>Cabang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($data as $d)
                                {{-- {{dd($d->alamat->nama)}} --}}
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->jk }}</td>
                                        <td>
                                        @if (isset($d->no_telp))
                                            {{ $d->no_telp }}
                                        @else
                                        -
                                        @endif
                                        </td>
                                        <td>{{ $d->alamat->nama }} {{ $d->alamat->desa->name }} {{ $d->alamat->kecamatan->name }} {{ $d->alamat->kabupaten->name }}</td>
                                        <td>{{ $d->user->role->nama }}</td>
                                        <td>{{ $d->cabang->nama }}</td>
                                        <td>
                                            <a href="{{ route('anggota.edit', $d->id) }}" class="btn btn-xs btn-info"><span class="fa fa-pencil-square-o"></span> Edit</a>
                                            <form action="{{ route('anggota.destroy', $d->id) }}" method="post" class="form-btn">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field('DELETE') }}
                                                <button type="submit" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>Cabang</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection