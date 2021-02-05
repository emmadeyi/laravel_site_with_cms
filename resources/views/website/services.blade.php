@extends('website.template.master')

@section('content')
<!-- HOME START-->
<section class="bg-half" style="background-image: url({{asset('template/img/home/bg/07.jpg')}});  
background-position: center; background-size:cover;">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="page-next-level text-white">
                            <h4 class="text-uppercase">Our Services</h4>
                            <div class="page-next"> <a href="{{route('index')}}">Home</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<span class=" text-white">Our Services</span> </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HOME END--> 
<!-- ABOUT START -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <p class="text-muted font-20 text-center">We are happy to introduce you to our marine services but not limited to Ship Management, Ship Brokering, Ship Crewing, Spare Part Supply, Chandelling and Inward/Outward Clearance, among others.
            <br> Uyoyo Maritime Energy Limited is engaged in three core activities in which it has a strong position.
            </p>
        </div>
    </div>
</section>
<!-- ABOUT END -->

<!-- FEATURES START -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="section-title text-center">
                    <h3>Our Core Services</h3>
                    <div class="spacer-30"></div>
                </div>
            </div>
        </div>

        <div class="row align-items-center features-four">
            <div class="col-sm-6">
                <div class="features-box">
                    <h4 class="font-20">Ship Brokering & Management</h4>
                    <div class="spacer-15"></div>
                    <p class="text-muted mb-0">We marine and project vessels support fleets, for any marine operation like Marine transport, Supply and Maintenance of marine equipment, Crew support/Management, ship management etc.
                    We have partnered with foreign joint venture, fleets of marine vessels and experience workforce of both national and international manpower as our major assets, capable of providing the best services while maintaining cost effectiveness, high level of proficiency, quality and safety standards and delivery of service within the schedule time.
                    </p>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <img src="{{asset('template/img/home/bg/07.jpg')}}" class="img-fluid mt-sm-30" alt="img">
            </div>
        </div>

        <div class="row align-items-center features-four">
            <div class="col-sm-6 text-center">
                <img src="{{asset('template/img/dredging/05.jpg')}}" class="img-fluid mt-sm-30" alt="img">
            </div>
            <div class="col-sm-6">

                <div class="features-box">
                    <h4 class="font-20 mt-sm-30">Dredging & Construction</h4>
                    <div class="spacer-15"></div>
                    <p class="text-muted mb-0">We offer our clients total solutions to all dredging offshore floating plant retirement. Regardless of the size and scope of the job or location, we go extra mile to satisfy our clients.</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center features-four">
            <div class="col-sm-6">
                <div class="features-box">
                    <h4 class="font-20">Offshore Operations and Supply</h4>
                    <div class="spacer-15"></div>
                    <p class="text-muted mb-0">We provide Offshore Heavy Lifts Operations Services and Installations (SWL 1200 TONS). Personnel Accommodations Offshore. Offshore Pipe laying (6`` diam and up-to 60``). Provide Services for all offshore support vessels, jack-up barges and DP vessels, Anchor Handling Services.</p>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <img src="{{asset('template/img/home/bg/06.jpg')}}" class="img-fluid mt-sm-30" alt="img">
            </div>
        </div>
    </div>
</section>
<!-- FEATURES END -->


<!-- CTA START -->
<section class="section bg-cta-img">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-heading text-center text-white">
                    <h3>Uyoyo Maritime Energy</h3>
                    <div class="spacer-15"></div>
                    <p class="mx-auto cta_details text-white-80">Maintaining the highest achievable level of Quality and Safety in compliance with all applicable international codes and standards and other regulatory requirements</p>
                    <div class="mt-3">
                        <a href="{{route('about')}}" class="btn btn-custom mr-3">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA END -->

<!-- COUNTER START -->
<div class="client-counter">
    <div class="row" id="counter">
        <div class="col-md-6">
        </div>
    </div>                            
</div>
<!-- COUNTER END -->

@include('website.clients_logo')

@endsection