@extends('website.template.master')

@section('content')

<!-- HOME START-->
<section class="bg-half" style="background-image: url({{asset('./template/img/home/bg/08.jpg')}}); 
background-position: center; background-size:cover;">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="page-next-level text-white">
                            <h4 class="text-uppercase">Equipment/ Managed Fleets</h4>
                            <div class="page-next"> <a href="{{route('index')}}">Home</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<a href="#">Managed Fleets</a></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HOME END--> 

<!--  -->
<section class="section">
    <div class="container">
        <div class="row"> 
            @if ($equipmentCount > 0)
                @foreach ($equipments as $equipment)                
                    <div class="col-md-4">
                        <!-- POST START -->
                        <article class="post blog-post">
                            <div class="post-preview">
                                <a href="#"><img src="{{asset('./storage/'.$equipment->thumbnail)}}" alt="" class="img-fluid mx-auto d-block"></a>
                            </div>

                            <div class="post-header">
                                <h4 class="post-title"><a href="#"> {{$equipment->name}}</a></h4>
                                <div class="post-content">
                                    <p class="text-muted">{{ \Illuminate\Support\Str::words($equipment->description, 15, $end='...') }}</p>
                                </div>

                                <span class="bar"></span>

                                <div class="post-footer">
                                    <div class="post-more"><a href="{{url('equipment/' . $equipment->slug)}}" >Read More <i class="mdi mdi-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </article>
                        <!-- POST END -->
                    </div>
                @endforeach
            @else
                <p class="text-muted">No equipment Uploaded</p>
            @endif
            
        </div>
        <!-- Pagination-->
        <div class="row mt-4 justify-content-center">
            {{ $equipments->links() }}
        </div>
        <!-- Pagination end-->
    </div>
</section>
<!--  -->

<!-- COUNTER START -->
<section>
    <div class="container">
        <div class="row" id="counter">            
        </div>
    </div>
</section>
<!-- COUNTER END -->
@include('website.clients_logo')
@endsection