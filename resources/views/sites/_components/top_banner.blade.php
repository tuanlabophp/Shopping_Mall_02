<div id="top-banner-and-menu">
    <div class="container">
        
        <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="side-menu animate-dropdown">
                <div class="head"><i class="fa fa-list"></i> {{ trans('sites.all_departments') }}</div>        
                <nav class="yamm megamenu-horizontal" role="navigation">
                    <ul class="nav">
                        @foreach ($categories as $category)
                        <li class="dropdown menu-item">
                            <a href="{{ asset('page') . '/' . $category['id'] }}"  class="dropdown-toggle" data-hover="dropdown">{{ $category['name'] }}</a>
                            @if (count($category->subCategories))
                            <ul class="dropdown-menu mega-menu">
                                <li class="yamm-content">
                                    <div class="row">
                                        <div class="text-center">
                                            <ul class="list-unstyled">
                                            @foreach ($category->subCategories as $subCategory)
                                                <li><a href="{{ asset('page') . '/' . $subCategory['id'] }}">{{ $subCategory['name'] }}</a></li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>  
                            </ul>
                            @endif
                        </li><!-- /.menu-item -->
                        @endforeach
                    </ul><!-- /.nav -->
                </nav><!-- /.megamenu-horizontal -->
            </div><!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->     
        </div><!-- /.sidemenu-holder -->

            <!-- ========================================= SECTION – HERO : END 
            ========================================= -->
            <div class="slideshow-container col-md-9 col-xs-12 col-sm-8 homebanner-holder">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="{{ asset('upload/slide/iphone.jpg') }}">
                        </div>

                        <div class="item">
                          <img src="{{ asset('upload/slide/sony.jpg') }}" >
                        </div>

                        <div class="item">
                          <img src="{{ asset('upload/slide/samsung.jpg') }}" >
                        </div>

                        <div class="item">
                          <img src="{{ asset('upload/slide/oppo.jpg') }}">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">{{ trans('sites.previous') }}</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">{{ trans('sites.next') }}</span>
                    </a>
                </div>
            </div>
    </div><!-- /.container -->
    
</div><!-- /#top-banner-and-menu -->
