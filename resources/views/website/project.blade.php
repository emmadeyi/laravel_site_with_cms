@extends('website.template.master')

@section('content')
<!-- HOME START-->
<section class="bg-half" style="background-image: url({{asset('./storage/'.$project->thumbnail)}}); 
background-position: center; background-size:cover;">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="page-next-level text-white">
                            <h4 class="text-uppercase">{{$project->title}}</h4>
                            <div class="page-next"> <a href="{{route('index')}}">Home</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<a href="{{route('projects')}}">Projects</a></div>
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
                        <a href="single-post.html"><img src="{{asset('./storage/'.$project->thumbnail)}}" alt="" class="img-fluid mx-auto d-block"></a>
                    </div>

                    <div class="post-header">
                        <h3 class="post-title"><a href="#"> {{$project->title}}</a></h3>
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
                            <p class="">{!! $project->details !!}</p>
                        </div>
                        <br>
                        @if ($project->galleries)     
                            <div class="post-content"> 
                                <div class="row">
                                    @foreach ($project->galleries as $item)
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
                        <div class="post-content"> 
                            @if ($project->equipments)     
                                @foreach ($project->equipments as $equipment)
                                    <b class="post-title"><a href="{{url('equipment/' . $equipment->slug)}}">{{$equipment->name}}</a></b>
                                    <blockquote class="font-italic">{{$equipment->description}}</blockquote>
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