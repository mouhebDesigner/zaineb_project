@extends('layouts.master')



@section('content')
<div class="rs-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img">
        <img src="{{ asset('front/assets/images/breadcrumbs/2.jpg') }}" alt="Breadcrumbs Image">
    </div>
    <div class="breadcrumbs-text white-color">
        <h1 class="page-title">Participer au concour d'université </h1>
        <ul>
            <li>
                <a class="active" href="{{ url('/') }}">Accueil</a>
            </li>
            <li>Concour détails</li>
        </ul>
    </div>
</div>
<section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
    <div class="container">
        <div class="row clearfix">
            <!-- Content Column -->
            
            <div class="col-lg-4 col-md-12 video-column"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1178.16px;">
                    <div class="inner-column sticky-top">
                        <div class="btn-secs">
                            <div class="course-seats price">
                                <a href="{{ url('concour/'.$concour->id."/participer") }}">
                                    <div class="course-price"><span class="price">Participer</span></div>
                                </a>
                            </div>
                            <div class="payments"></div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>


@include('includes.jury')
@endsection
