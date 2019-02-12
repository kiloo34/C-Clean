@extends('view_admin')
@section('judul', 'Order')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Order</h3>
                        <a href="{{ route('order.create') }}" class="btn btn-m btn-primary btn-poss-create"><span class="fa fa-plus-square"></span> Tambah</a>
                    </div>
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Total Produk</th>
                                    <th>Total</th>
                                    <th>Aktor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td><a href="{{ route('order.show', $d->id) }}">{{ $d->id }}</a></td>
                                        <td><a href="{{ route('order.show', $d->id) }}">{{ count($d->order_detail) }}</a></td>
                                        <td>{{ $d->total }}</td>
                                        <td>{{ $d->admin->nama }}</td>
                                        <td>
                                            <a href="{{ route('order.edit', $d->id) }}" class="btn btn-xs btn-info"><span class="fa fa-eye"></span> Detail</a>
                                            <form action="{{ route('order.destroy', $d->id) }}" method="post" class="form-btn">
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
                                    <th>No Order</th>
                                    <th>Total Produk</th>
                                    <th>Total</th>
                                    <th>Aktor</th>
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