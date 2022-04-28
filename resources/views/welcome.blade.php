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
<div class="rs-popular-courses style4 pt-110 pb-120 md-pt-70 md-pb-80" id="concours">
    <div class="container">
        <div class="sec-title3 text-center mb-44 aos-init aos-animate" data-aos="" data-aos-delay=""
            data-aos-duration="">
            <div class="sub-title">Choisir concours</div>
            <h2 class="title black-color">List de concours populaires</h2>
        </div>
        <div class="row">
            @foreach(App\Models\Concour::all()->take(6) as $concour)
            
            <div class="col-lg-4 col-md-6 md-mb-30">
                <div class="courses-item">
                    <div class="img-part">
                        <img src="{{ asset($concour->resources()->firstWhere('type', 'image')->path) }}"
                                    alt="">
                        </div>
                    <div class="content-part">
                        <ul class="meta-part">
                            <li><span class="price">{{ $concour->prix }}</span></li>
                            <li><a class="categorie" href="/course-categories"></a></li>
                        </ul>
                        <h3 class="title"><a href="/course/course-single">{{ $concour->titre }}</a></h3>
                        <p>{{ $concour->date_debut }} --> {{ $concour->date_fin }}</p>
                        <div class="bottom-part">
                            <div class="info-meta">
                                <ul>
                                    <li class="user"><i class="fa fa-user"></i> 
                                    ({{ $concour->participants()->count() }})</li>
                                </ul>
                            </div>
                            <div class="btn-part"><a href="{{ url('concours/'.$concour->id) }}">Participaer maintenant<i
                                        class="flaticon-right-arrow"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center"><a class="readon orange-btn main-home" href="/course-categories">Voir tous </a></div>
    </div>
</div>
@include('includes.jury')
@endsection
