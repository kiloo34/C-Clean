<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C'Clean | @yield('judul') </title>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
</head>

<body class="body">
    
    <!-- Navigation -->
    @include('navbar')

    <div class="page">
        @yield('content')
    </div>

    {{-- <!-- Home Block -->
    <div id="home">
        <div class="pad-top"></div>
        <div class="container">
            <div class="text-center">
                <h3>Responsive Design</h3>
                <h4> Clean and responsive design. </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate.  </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About Block -->
    <div id="about">
        <div class="pad-top"></div>
        <div class="container">
            <div class="text-center">
                <h3>About about about</h3>
                <h4>And now a heading four</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate.  </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Block -->
    <div id="service">
        <div class="pad-top"></div>
        <div class="container">
            <div class="text-center">
                <h3>Our Services</h3>
                <h4>Yep, a subheading</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate.  </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Block -->
    <div id="product">
        <div class="pad-top"></div>
        <div class="container">
            <div class="text-center"> <h3>Products</h3>
                <h4>An h4 sub-heading</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Block -->
    <div id="portfolio">
        <div class="pad-top"></div>
        <div class="container">
            <div class="text-center">
                <h3>Our Portfolio</h3>
                <h4>You got it, a sub-heading</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Block -->
    <div id="contact">
        <div class="pad-top"></div>
        <div class="container">
            <div class="text-center"> <h3>Contact Us -- Our Details</h3>
                <h4>sub-heading</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur venenatis ligula vitae luctus. Nullam risus diam, aliquam sit amet sagittis non, vehicula vel justo. Curabitur tristique vehicula malesuada. Proin varius ex et odio efficitur finibus. Donec pretium risus vitae lacus feugiat dictum. Mauris consectetur lectus et libero blandit, eu ultrices nulla rutrum. Suspendisse vitae massa erat. In hac habitasse platea dictumst. Duis sollicitudin luctus hendrerit. Proin nec massa vel felis dictum accumsan et vulputate. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="pad-top"></div> --}}

    <!--footer-->
    @include('footer1')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
    <!-- Mynav Bar Script -->
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="js/demo3/mynavbar.js"></script>  --}}
    {{-- <script src="js/smoothscroll.js"></script>  --}}
    
</body>
</html>