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
                            <h4 class="text-uppercase">Projects</h4>
                            <div class="page-next"> <a href="{{route('index')}}">Home</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<a href="#">Projects</a></div>
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
            @if ($projectCount > 0)
                @foreach ($projects as $project)                
                    <div class="col-md-4">
                        <!-- POST START -->
                        <article class="post blog-post">
                            <div class="post-preview">
                                <a href="#"><img src="{{asset('./storage/'.$project->thumbnail)}}" alt="" class="img-fluid mx-auto d-block"></a>
                            </div>

                            <div class="post-header">
                                <h4 class="post-title"><a href="#"> {{$project->title}}</a></h4>
                                <ul class="post-meta">
                                    <li><i class="mdi mdi-calendar"></i> <small>{{ date('d, M, Y', strtotime($project->created_at))}}</small></li>
                                    @if ($project->equipments)     
                                        @foreach ($project->equipments as $equipment)
                                            <li><i class="mdi mdi-tag-text-outline"></i>
                                                <a href="{{url('equipment/' . $equipment->slug)}}"> <small>{{$equipment->name}}</small></a></li>
                                        @endforeach                                   
                                    @endif
                                </ul>

                                <div class="post-content">
                                    <p class="text-muted">{!! \Illuminate\Support\Str::words($project->details, 15, $end='...') !!}</p>
                                </div>

                                <span class="bar"></span>

                                <div class="post-footer">
                                    <div class="post-more"><a href="{{url('project/' . $project->slug)}}" >Read More <i class="mdi mdi-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </article>
                        <!-- POST END -->
                    </div>
                @endforeach
            @else
                <p class="text-muted">No project Uploaded</p>
            @endif
            
        </div>
        <!-- Pagination-->
        <div class="row mt-4 justify-content-center">
            {{ $projects->links() }}
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