<!--<div class="off-canvas position-right" id="offCanvas" data-off-canvas data-transition="push">
    <a href="#" class="close-button off-canvas-menu-icon-close" data-close="offCanvas">
        <span aria-hidden="true">&times;</span>
    </a>

    <ul class="vertical menu" data-dropdown-menu>
        {{ menu('primary', 'voyager-frontend::partials.menu-left') }}
    </ul>

    <hr>

    <ul class="vertical menu">
        @include('voyager-frontend::partials.menu-right')
    </ul>

    <hr>

    <ul class="menu social-icons align-center">
        {{ menu('social', 'voyager-frontend::partials.social') }}
    </ul>
</div>

<div class="off-canvas-content" data-off-canvas-content>
    <div class="header-site-search" data-toggle-search>
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell medium-8 medium-offset-2">
                    @include('voyager-frontend::partials.search-box')
                </div>
            </div>
        </div>
    </div>

    <div class="top-bar">
        <div class="top-bar-left">
            <a href="#" class="off-canvas-menu-icon float-right hide-for-medium" data-open="offCanvas">
                <i class="fas fa-bars"></i> <span>Menu</span>
            </a>

            <a href="#" class="search-icon-mobile float-right hide-for-medium" data-toggle-search-trigger>
                <i class="fas fa-search"></i>
            </a>

            <div class="header-logo float-left">
                <a href="{{ url('/') }}">
                    <img src="{{ url('/') }}/images/logo.png" alt="{{ setting('site.title') }}" title="{{ setting('site.title') }}" />
                </a>
            </div>

            <ul class="dropdown menu show-for-medium" data-dropdown-menu>
                {{ menu('primary', 'voyager-frontend::partials.menu-left') }}
            </ul>  /.menu 
        </div>

        <div class="top-bar-right show-for-medium">
            <ul class="dropdown menu" data-dropdown-menu>
                @include('voyager-frontend::partials.menu-right')
            </ul>
        </div>
    -->
<div id="preloader"></div>
        <!-- Start of Header 
        ============================================= -->
        <header>
            <div class="header-top-bg">
                <div class="container">
                    <div class="row">
                        <div class="header-top">
                            <div class="head-top-info pull-left">
                                <ul class="top-info">
                                    <li><img src="/theme/img/call.png" alt="image">05. 256. 8942</li>
                                    <li><img src="/theme/img/inbox.png" alt="image">info@fundme.com</li>
                                </ul>
                            </div>
                            <!-- /head-top-info -->
                            <div class="header-social pull-right">
                                <div class="social">
                                    <ul class="social-list">
                                        {{ menu('social', 'voyager-frontend::partials.social') }}
                                    </ul>
                                </div>
                            </div>
                            <!-- /header-social -->
                        </div><!-- /header-top -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </div>
            <div class="menu-bar">
                <div class="container">
                    <div class="row">
                        <nav class="navbar">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/') }}/storage/{{ setting('site.logo') }}" alt="{{ setting('site.title') }}" title="{{ setting('site.title') }}"></a>
                            </div>
                            
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    {{ menu('primary', 'voyager-frontend::partials.menu-left') }}
                                </ul>
<!--                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="cause.html">Causes</a>
                                        <ul class="menu-dropdown">
                                            <li><a href="cause.html">Causes</a></li>
                                            <li><a href="cause-single.html">Causes Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="event.html">Events</a>
                                        <ul class="menu-dropdown">
                                            <li><a href="event.html">Events</a></li>
                                            <li><a href="event-single.html">Events Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog-archive.html">Blog</a>
                                        <ul class="menu-dropdown">
                                            <li><a href="blog-archive.html">Blog Archive</a></li>
                                            <li><a href="blog-single.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul class="menu-dropdown">
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="about-us.html">About-us</a></li>
                                        </ul>
                                    </li>
                                </ul>-->
                            </div><!-- /.navbar-collapse -->
                            <div class="home-donate donate-btn-1 text-uppercase">
                                <a href="/donate-blood">donate now</a>
                            </div>
                            <div id="sb-search" class="sb-search " >
                                    <form action="#" method="post">
                                       <input class="sb-search-input " onkeyup="buttonUp();" placeholder="Enter Your Search Word..." type="search" value="" name="search" id="search">
                                     <input class="sb-search-submit" type="submit"  value="">
                                     <span class="sb-icon-search"><i class="ti-search"></i></span>
                                        </form>
                            </div>
                        </nav>
                        <div class="wrap">
                            <!--MENU-->
                            <div id="main-menu">
                                <div class="menu-btn">
                                    <div class="menu-btn-line menu-btn-line-1"></div>
                                    <div class="menu-btn-line menu-btn-line-2"></div>
                                    <div class="menu-btn-line menu-btn-line-3"></div>
                                </div>
                                <div class="moduletable_menu">

                                    <ul class="nav menu">
                                        <li><a href="home-1.html">Home</a></li>
                                        <li><a href="about-us.html">About</a></li>
                                        <li><a href="blog-archive.html">Blog</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                        <li><a href="cause.html">Cause</a></li>
                                        <li><a href="cause-single.html">Cause Details</a></li>
                                        <li><a href="event.html">Event</a></li>
                                        <li><a href="event-single.html">Event Single</a></li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="contact.html">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END menu -->
                        </div><!--/wrap  -->
                    </div><!--/row  -->
                </div><!--/container  -->
            </div><!--/menu-bar  -->
        </header>
        <!-- End of Header 
        ============================================= -->