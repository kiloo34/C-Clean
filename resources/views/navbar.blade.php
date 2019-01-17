<!-- Navigation -->
<div class="my-nav">
    <nav class="navbar navbar-custom navbar-fixed-top mnav" role="navigation">
        <div class="container">
            <div class="navbar-header mnav">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars fa-2x"></i> </button>
                <a class="navbar-brand page-scroll mnav" href="##"><i class="fa fa-pied-piper-alt"></i> C'Clean <i class="fa fa-pied-piper-pp"></i> </a> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            @if (Route::has('login'))
                <div style="" aria-expanded="true" class="navbar-collapse navbar-right navbar-main-collapse mnav collapse in">
                    @auth
                        <ul class="nav navbar-nav mnav">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden mnav"> <a href="#page-top"></a> </li>
                            <li class=""> <a href="#home">Home</a> </li>
                            <li class=""> <a href="#about">About</a> </li>
                            <li class=""> <a href="#service">Service</a> </li>
                            <li class=""> <a href="#product">Product</a> </li>
                            <li class=""> <a href="#portfolio">Portfolio</a> </li>
                            <li class=""> <a href="#contact">Contact</a> </li>
                            <li>
                                <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    @else
                        <ul class="nav navbar-nav mnav">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden mnav"> <a href="#page-top"></a> </li>
                            <li class=""> <a href="#home">Home</a> </li>
                            <li class=""> <a href="#about">About</a> </li>
                            <li class=""> <a href="#service">Service</a> </li>
                            <li class=""> <a href="#product">Product</a> </li>
                            <li> <a href="{{ route('login') }}">Login</a> </li>
                            <li> <a href="{{ route('register') }}">Register</a> </li>
                        </ul>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
</div>