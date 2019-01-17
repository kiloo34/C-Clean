<!-- Intro Header -->
<div class="bg-cover-color"></div>
<header>
    {{-- <div align="center"><img src="http://lorempixel.com/1440/1280/sports" class="img-responsive"></div> --}}
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            {{-- <div class="gradasi"> --}}
                <div class="item active">
                    <img src="{{ asset('dist/img/1.jpg') }}" class="uk" alt="">
                    <div class="carousel-caption">
                        ...  
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('dist/img/2.jpg') }}" class="uk" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('dist/img/3.jpg') }}" class="uk" alt="..."> 
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
            {{-- </div> --}}
        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>