@extends('view_admin')
@section('judul', 'Cabang')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Cabang</h3>
                        <a href="{{ route('cabang.create') }}" class="btn btn-m btn-primary btn-poss-create"><span class="fa fa-plus-square"></span> Tambah</a>
                    </div>
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Cabang</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->alamat->nama }} {{ $d->alamat->desa->name }}, {{ $d->alamat->kecamatan->name }}, {{ $d->alamat->kabupaten->name }}</td>
                                        <td>{{ $d->no_telp }}</td>
                                        <td>
                                            <a href="{{ route('cabang.edit', $d->id) }}" class="btn btn-xs btn-info"><span class="fa fa-pencil-square-o"></span> Edit</a>
                                            <form action="{{ route('cabang.destroy', $d->id) }}" method="post" class="form-btn">
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
                                    <th>Nama Cabang</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
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