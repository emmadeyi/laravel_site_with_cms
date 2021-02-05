@extends('website.template.master')

@section('content')
<!-- HOME START-->
<section class="bg-half" style="background-image: url({{asset('./storage/'.$equipment->thumbnail)}}); 
background-position: center; background-size:cover;">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="page-next-level text-white">
                            <h4 class="text-uppercase">{{$equipment->name}}</h4>
                            <div class="page-next"> <a href="{{route('index')}}">Home</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<a href="{{route('equipment')}}">Managed Fleet</a></div>
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
            <!-- BLOG POST START -->
            <div class="col-md-8">
                <!-- Post Start -->
                <article class="post m-0">
                    <div class="post-preview">
                        <a href="single-post.html"><img src="images/blog/blog-3.jpg" alt="" class="img-fluid mx-auto d-block"></a>
                    </div>

                    <div class="post-header">
                        <h3 class="post-title"><a href="#"> {{$equipment->name}}</a></h3>
                        
                        <div class="post-content">
                            <p class="">{{$equipment->description}}</p>
                        </div>
                        <br>
                        @if ($equipment->galleries)     
                            <div class="post-content"> 
                                <div class="row">
                                    @foreach ($equipment->galleries as $item)
                                        <div class="card p-2 m-1 col-md-3">
                                            <div class="post-preview">
                                                <a href="#"><img src="{{asset('./storage/'.$item->image_url)}}" alt="" class="img-fluid mx-auto d-block"></a>
                                            </div> 
                                        </div> 
                                    @endforeach                                   
                                </div>                          
                            </div>
                        @endif   
                        <br>  
                        <h3 class="post-title">Related Projects</h3>
                        <div class="post-content"> 
                            @if (count($equipment->projects) > 0)     
                                @foreach ($equipment->projects as $project)
                                    <b class="post-title">{{$project->title}}</b>
                                    <blockquote class="font-italic">{!! \Illuminate\Support\Str::words($project->details, 15, $end='...') !!} <a href="{{url('project/' . $project->slug)}}">Read More</a> </blockquote>
                                @endforeach                                   
                            @endif                               
                        </div>
                    </div>
                </article>                     
                <!-- Post End -->
            </div>
            <!-- SIDEBAR -->
            <div class="col-lg-4 col-md-4">

                <!-- Categories widget-->
                @if (count($equipmentList) > 0)                    
                    <div class="sidebar p-30">
                        <div class="widget widget_categories">
                            <h4 class="text-uppercase text-center">Equipment</h4>
                            <ul class="list-unstyled">
                                @foreach($equipmentList as $item)
                                    <li class="mb-2"><a href="{{url('equipment/' . $item->slug)}}">{{$item->name}}</a> <span class="float-right">({{$item->projects()->count()}})</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <!-- Categories widget-->

                <!-- Recent Post -->
                @if (count($projects) > 0)
                    <div class="sidebar p-30">
                        <div class="widget">
                            <h4 class="text-uppercase text-center">Recent Project</h4>
                            <div class="slider single">
                                @foreach ($projects as $project)                                
                                    <div>
                                        <a href="{{url('project/' . $project->slug)}}"><img src="{{asset('./storage/'.$project->thumbnail)}}" class="mx-auto d-block img-fluid" alt="img-missing"></a>
                                        <div class="spacer-15"></div>
                                        <a href="{{url('project/' . $project->slug)}}"><h4 class="pr-2 pl-2">{{$project->title}}</h4></a>
                                    </div>
                                @endforeach  
                            </div>
                        </div>
                    </div>                                
                @endif
                <!-- Recent Post -->
            </div>
            <!-- SIDEBAR -->

            
        </div>
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