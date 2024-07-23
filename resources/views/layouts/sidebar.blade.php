<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('dashboard.index') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#usertab" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>User management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="usertab" class="collapse ">
                        <ul class="nav">
                            @if (auth()->user()->role == 'admin')
                                <li><a href="{{ route('user.index') }}" class=""><i class="lnr lnr-user"></i><span>data Client</span></a></li>
                            @endif
                            @if (auth()->user()->role == 'client')
                                <li><a href="{{ route('boking.keluar_index',auth()->user()->client->id) }}" class=""><i class="lnr lnr-exit"></i><span>Sewa Berjalan</span></a></li>
                                <li><a href="{{ route('boking.masuk_index',auth()->user()->client->id) }}" class=""><i class="lnr lnr-enter"></i><span>Sewa pengembalian</span></a></li>
                            @endif
                        </ul>
                    </div>
                </li>

                @if (auth()->user()->role == 'admin')
                    <li><a href="{{ route('histori.index') }}" class=""><i class="lnr lnr-book"></i><span>History recap</span></a></li>
                @endif

                {{-- <li>
                    <a href="#historytab" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>History</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="historytab" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ route('history.keluar') }}" class=""><i class="lnr lnr-license"></i> <span>riwayat peminjaman</span></a></li>
                        </ul>
                    </div>
                </li> --}}
                @if (auth()->user()->role == 'admin')
                    <li><a href="{{ route('mobil.index') }}"><i class="lnr lnr-car"></i> <span>Data Mobil</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
