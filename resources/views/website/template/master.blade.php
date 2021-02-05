<!DOCTYPE html>
<html lang="en">
<!-- business-4.html 42:40-->

@include('website.template.header')

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>

        @include('website.template.navbar')

        @yield('content')     

        <!-- FOOTER START -->
        @include('website.template.footer')
        <!-- FOOTER END -->

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> 
            <i class="mdi mdi-chevron-up"> </i> 
        </a>
        <!-- Back to top --> 

        @include('website.template.scripts')
    </body>


<!-- business-4.html 42:42-->
</html>