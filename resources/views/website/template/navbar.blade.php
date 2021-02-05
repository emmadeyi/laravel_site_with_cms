<?php
use App\Models\Project;
use App\Models\Equipment;
?>
<!-- Navigation Bar-->
<div class="tagline hidden-md">
    <div class="container">
        <div class="float-left">
            <div class="phone">
                <i class="fas fa-phone"></i>  +234 701 414 8410
            </div>
        </div>
        <div class="float-right">
            <ul class="top_socials">
                <li><a href="mailto:uyoyomaritime@gmail.com"><i class="fa fa-envelope"></i></a></li>         
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>

<!-- Navigation Bar-->
<header id="topnav" class="defaultscroll fixed-top navbar-sticky sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a href="{{route('index')}}" class="logo">
                <img src="{{asset('template/img/logo/uyoyo.jpeg')}}" alt="missing_logo" height="60">
                {{-- Uyoyo Maritime --}}
            </a>
        </div>
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li>
                    <a href="{{route('index')}}">Home</a>
                </li>

                <li class="has-submenu">
                    <a href="#">About</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{route('about')}}">About Us</a></li>    
                        @if (Equipment::where('is_published', '1')->count() > 0)                                   
                            <li><a href="{{route('equipment')}}">Managed Fleet</a></li>  
                        @endif                              
                        <li><a href="javascript:void(0)">Gallery</a></li>    
                    </ul>  
                </li>

                <li class="has-submenu">
                    <a href="{{route('services')}}">Services</a>
                </li>
                @if (Project::where('is_published', '1')->count() > 0)                    
                    <li class="has-submenu">
                        <a href="{{route('projects')}}">Projects</a>
                    </li>
                @endif

                <li class="has-submenu">
                    <a href="#contact-us">Contact</a>
                </li>                        
            </ul>
            <!-- End navigation menu-->
        </div>
    </div>
</header>
<!-- End Navigation Bar-->