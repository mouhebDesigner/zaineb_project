@extends('layouts.master')



@section('content')
<div id="rs-banner" class="rs-banner style1">
    <div class="container">
        <div class="banner-content text-center">
            <h1 class="banner-title capitalize wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="3000ms"
                style="visibility: visible; animation-duration: 3000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                Bienvenue a notre université </h1>
            <div class="desc mb-35 wow wow fadeInRight" data-wow-delay="900ms" data-wow-duration="3000ms"
                style="visibility: visible; animation-duration: 3000ms; animation-delay: 900ms; animation-name: fadeInRight;">
                <p>
                    Site concour de compétition des projets s'adresse aux étudiants sous la direction de professeurs
                    pour leurs permettre et discuter de leurs projets
                </p>
            </div>
        </div>
    </div>
</div>
<section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
    <div class="container">
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="col-lg-8 md-mb-50">
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">

                    <div class="tab-content tabs-content" id="myTabContent">
                        <div class="tab-pane tab fade  active show" id="prod-overview" role="tabpanel"
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

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 video-column"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1178.16px;">
                    <div class="inner-column sticky-top">
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
