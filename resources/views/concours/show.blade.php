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
            <div class="col-lg-8 md-mb-50">
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">
                    <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab"
                                href="#description" role="tab" aria-controls="prod-overview"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item tab-btns">
                            <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab" href="#participants"
                                role="tab" aria-controls="prod-curriculum" aria-selected="false">Participants</a>
                        </li>
                    </ul>
                    <div class="tab-content tabs-content" id="tab">
                        <div class="tab-pane tab fade  active show" id="description" role="tabpanel"
                            aria-labelledby="prod-overview-tab">
                            <div class="content white-bg pt-30">
                                <!-- Cource Overview -->
                                <div class="course-overview">
                                    <div class="inner-box">
                                        <h4>{{ $concour->titre }}</h4>
                                        <p>{{ $concour->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab fade " id="participants" role="tabpanel"
                            aria-labelledby="prod-overview-tab">
                            <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                <h3 class="instructor-title">Instructors</h3>
                                <div class="row rs-team style1 orange-color transparent-bg clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                        <div class="team-item">
                                            <img src="{{ asset('front/assets/images/team/1.jpg') }}" alt="">
                                            <div class="content-part">
                                                <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
                                                <span class="designation">Professor</span>
                                                <ul class="social-links">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="team-item">
                                            <img src="{{ asset('front/assets/images/team/2.jpg') }}" alt="">
                                            <div class="content-part">
                                                <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
                                                <span class="designation">Professor</span>
                                                <ul class="social-links">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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
                        <div class="course-features-info">
                            <ul>
                                <li class="lectures-feature"> <i class="fa fa-files-o"></i> <span
                                        class="label">Lectures</span> <span class="value"> 7 </span></li>
                                <li class="quizzes-feature"> <i class="fa fa-puzzle-piece"></i> <span
                                        class="label">Quizzes</span> <span class="value">4</span></li>
                                <li class="duration-feature"> <i class="fa fa-clock-o"></i> <span
                                        class="label">Duration</span> <span class="value">15 week </span></li>
                                <li class="students-feature"> <i class="fa fa-users"></i> <span
                                        class="label">Students</span> <span class="value">124</span></li>
                                <li class="assessments-feature"> <i class="fa fa-check-square-o"></i> <span
                                        class="label">Assessments</span> <span class="value">Yes</span></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
</section>


@include('includes.jury')
@endsection
