<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                {{-- @if (Auth::user()->role->nama == 'admin') --}}
                    <p>{{ Auth::user()->admin->nama }}</p>    
                {{-- @else --}}
                    {{-- <p>{{ Auth::user()->email }}</p> --}}
                {{-- @endif --}}
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-dashboard"></i><span> Dashboard</span>
                </a>
            </li>
            {{-- {{dd(Auth::user()->role->aksesRole())}} --}}
            @foreach (Auth::user()->role->aksesRole()->where('status', true) as $a)

                <?php $check = ''?>
                @if ($check != $a->detail->nama)
                    @if ($a->detail->nama == 'Lihat Order')
                        <li>
                            <a href="{{ route('order.index') }}">
                                <i class="fa fa-th"></i>
                                <span>Order</span>
                            </a>
                        </li>
                        <?php $check = $a->detail->nama?>
                    @endif
                @endif

                <?php $check = ''?>
                @if ($check != $a->detail->nama)
                    @if ($a->detail->nama == 'Menu Services')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tags"></i> <span>Services</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">  
                                <li><a href="{{ route('service.index') }}"><i class="fa fa-circle-o"></i> Service </a></li>
                                <li><a href="{{ route('produk.index') }}"><i class="fa fa-circle-o"></i> Produk </a></li>
                            </ul>
                        </li>
                        <?php $check = $a->detail->nama ?>
                    @endif
                @endif
                        
                <?php $check = ''?>     
                @if ($check != $a->detail->nama)
                    @if ($a->detail->nama == 'Lihat Cabang')
                        <li>
                            <a href="{{ route('cabang.index') }}">
                                <i class="fa fa-home"></i>
                                <span>Cabang</span>
                            </a>
                        </li>
                        <?php $check = $a->detail->nama?>
                    @endif
                @endif

                <?php $check = ''?>     
                @if ($check != $a->detail->nama)
                    @if ($a->detail->nama == 'Menu Pengguna')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Pengguna</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('anggota.index'   ) }}"><i class="fa fa-circle-o"></i> Anggota </a></li>
                                <li><a href="{{ route('akses.index') }}"><i class="fa fa-circle-o"></i> Hak Akses </a></li>
                            </ul>
                        </li>
                        <?php $check = $a->detail->nama?>
                    @endif
                @endif

                <?php $check = ''?>     
                @if ($check != $a->detail->nama)
                    @if ($a->detail->nama == 'Menu Laporan')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Laporan</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Pelayanan </a></li>
                                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons </a></li>
                            </ul>
                        </li>
                        <?php $check = $a->detail->nama?>
                    @endif
                @endif

                <?php $check = ''?>     
                @if ($check != $a->detail->nama)
                    @if ($a->detail->nama == 'Lihat Form')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Forms</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                            </ul>
                        </li>
                        <?php $check = $a->detail->nama?>
                    @endif
                @endif

                <?php $check = ''?>     
                @if ($check != $a->detail->nama)
                    @if ($a->detail->nama == 'Menu Pengaturan')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gear"></i> <span>Pengaturan</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <?php $check = $a->detail->nama?>
                    @endif
                @endif
            @endforeach
        </ul>
    </section>
</aside>