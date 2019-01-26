@extends('view_admin')
@section('judul', 'List Produk '.$service->nama)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    {{-- {{dd($service->nama)}} --}}
                    <div class="box-header">
                        <h3 class="box-title">List Produk {{ $service->nama }}</h3>
                    </div>
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->durasi }} Hari</td>
                                        <td>Rp. {{ $d->harga }} ,00</td>
                                        <td>{{ $d->service->nama }}</td>
                                        <td>
                                            <a href="{{ route('produk.edit', $d->id) }}" class="btn btn-xs btn-info"><span class="fa fa-pencil-square-o"></span> Edit</a>
                                            <form action="{{ route('produk.destroy', $d->id) }}" method="post" class="form-btn">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field('DELETE') }}
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="confirm('yakin ingin menghapus ?')"><span class="fa fa-trash"></span> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
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