@extends('view_admin')
@section('judul', 'Tambah Order')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Form Tambah Order</h3>
                    </div>
                    <div class="box-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6" id="service">
                                    <div class="form-group has-feedback {{ $errors->has('peran') ? 'has-error' : '' }}">
                                        <label for="peran">Pilih Service :</label>
                                        <select class="form-control service" style="width: 100%;" name="service" required>
                                            <option value={{false}} selected> Choose One</option>
                                            @foreach ($service as $s)
                                                <option value="{{ $s->id }}">{{ $s->nama }}</option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('peran'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('peran') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6" id="produk">
                                    <div class="form-group">
                                        <label for="produk">Daftar Produk :</label>
                                        <select class="form-control produk" style="width: 100%;" name="produk" required>
                                            {{-- <option selected> Choose One</option>  --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-poss-create add">Tambah</button>
                        </form>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                <i class="fa fa-globe"></i> C'Clean.
                                <small class="pull-right">{{$dt->toDayDateTimeString()}}</small>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped cart">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart">
                                        <?php $no=1 ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-6" style="float: right;">
                            <p class="lead">Total Belanja</p>
                            <div class="table-responsive">
                                <table class="table">
                                <tr>
                                    <th>Total :</th>
                                    <td class="total-all">0</td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(function () {
            $('#produk').hide();
            $('.service').on('change', function() {
                const id = $(this).val();
                // var url = '/order/getProduk/'+id;
                // console.log(url);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/order/getProduk/'+id,
                    success: function (data) {
                        $('.produk').html(data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
                $('#produk').show();
            });

            $(".add").click(function(){
                const id1 = $('.service').val();
                const id2 = $('.produk').val();

                // var id = $('.produk').val();
                $.each($(".produk option:selected"), function(){            
                    $('.produk-'+id2).css({
                        'display':'none'
                    });
                    // console.log(id2);
                    $('.produk').val('');
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'GET',
                    dataType: "json",
                    url: '/order/getDetailProduk/'+id1+'/'+id2,
                    success: function(data) {
                        $('#cart').append("<tr><td><?php echo $no++; ?></td><td>"+data.nama+"</td><td id='uang' class='hrg-"+data.id+"' data-harga='"+data.harga+"'>"+data.harga+"</td><td onkeyup=hitungttl("+data.id+")><div class='col-xs-5'><input class='form-control ttl-"+data.id+"' type=text name=total value='0' placeholder=' satuan Per Kg'></div></td><td class='total-"+data.id+"' id='total'>0</td><td id=action><button class='btn btn-danger btn-xs' id='delete-"+data.id+"'><i class='fa fa-trash' aria-hidden=true></i></button></td></tr>");
                    },
                    error: function(data) {
                        console.log(data);  
                    }
                });
            });
        });

        var at = 0;
        // var y = 0;
        function hitungttl(data) {
            var x = $('.hrg-'+data).data('harga');
            var y = $('.ttl-'+data).val()
            var z = x * y;
            // console.log(x, y, z);
            $('.total-'+data).html(z);

            
            // if (typeof(y) != 0 && y !== "") {
            //     at += z;
            //     $('.total-all').html(at);
            // } else {
                // at += z;
            //     at = 0;
            //     console.log(at);
            //     $('.total-all').html(0);
            // }
            // console.log(at);

            // $('.total-all').each(function() {
            //     var harga 
            //     var ttl = $('.total-'+data).html();
            //     console.log(harga);
            //     $('.total-all').html(harga);
            // });
        }

        var rowCount = $('tbody #cart tr').length;
        var array = $('.total');
        console.log(array);
        for (let i = 0; i < array.length; i++) {
            const element = z += array[i];
            console.log(element);
        }

        // var MyRows = $('table .cart').find('#cart').find('tr');
            
        // MyIndexValue = 0;

        // for (var i = 0; i < MyRows.length; i++) {
        //     console.log(MyRows[i]);
        //     var MyIndexValue = $(MyRows[i]).find('td:eq(0)').html();
        //     MyIndexValue += MyRows[i];
        //     console.log(MyIndexValue);
        //     $('.total-all').html(MyIndexValue);
        // }

        // console.log(sa);

        // var price = parseInt($(this).siblings().find('.price').text()); 
        // priceTotal += price;
        // $('#cartTotal').text("Total: €" + priceTotal);
    </script>
@endpush