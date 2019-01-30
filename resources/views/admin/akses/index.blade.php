@extends('view_admin')
@section('judul', 'Hak Akses')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">    
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><i class="fa fa-user"></i> Anggota</a></li>
                            <li class="active"><a href="{{ route('akses.index') }}"><i class="fa fa-key"></i> Hak Akses<span class="label label-primary pull-right"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Nama Akses Sistem</h3>
                        <a href="{{ route('akses.create') }}" class="btn btn-m btn-primary btn-poss-create"><span class="fa fa-plus-square"></span> Tambah</a>
                    </div>
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Akses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->nama }}</a></td>
                                        <td>
                                            <a href="{{ route('akses.show', $d->id) }}" class="btn btn-xs btn-info"><span class="fa fa-eye"></span> Detail</a>
                                            <form action="{{ route('akses.destroy', $d->id) }}" method="post" class="form-btn">
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
                                    <th>No</th>
                                    <th>Nama Akses</th>
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