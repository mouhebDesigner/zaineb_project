@extends('layouts.master')

@section('includes')
@include('includes.header')
@endsection

@section('content')

<div class="rs-breadcrumbs breadcrumbs-overlay">
    <div class="breadcrumbs-img"><img src="{{ asset('front/profile.jpg') }}" alt="Breadcrumbs Image"></div>
    <div class="breadcrumbs-text white-color">
        <h1 class="page-title">Mon profile</h1>
        <ul>
            @guest
            <li><a class="active" href="{{ url('/') }}">Accueil</a></li>
            @else
            <li><a class="active" href="{{ url('home') }}">Accueil/</a></li>
            @endif
            <li>Profile</li>
        </ul>
    </div>
</div>
<div class="profile-section pt-100 pb-90 md-pt-80 md-pb-70">
    <div class="container">
        <div class="row clearfix">
            <div class="image-column col-lg-5 md-mb-50">
                <div class="inner-column mb-50 md-mb-0">
                    <div class="image">
                        @if(Auth::user()->avatar != null)
                            <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="" style="
                            ">
                        @else 
                            <img src="{{ asset('front/assets/images/avatar.png') }}" alt="" style="
                            ">
                        @endif
                    </div>
                    <div class="team-content text-center">
                        <h3>
                            {{ Auth::user()->nom }}
                            {{ Auth::user()->prenom }}
                        </h3>
                        <ul class="personal-info">
                            <li class="email"><span><i class="glyph-icon flaticon-email"> </i> </span><a
                                    href="/team/team-single">{{ Auth::user()->email }}</a></li>
                            <li class="phone"><span><i class="glyph-icon flaticon-call"></i></span><a
                                    href="/team/team-single">{{  Auth::user()->numtel}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-column col-lg-7 pl-60 pt-50 md-pl-14 md-pt-0">
                <div class="inner-column">
                    <h2> {{ Auth::user()->nom }}
                            {{ Auth::user()->prenom }}</h2>
                            <div class="team-skill mb-50">

                        <h3 class="d-flex justify-content-between skill-title">
                            Mon projet
                        @if(Auth::user()->hasProjet())

                            <div>

                                <button type="submit" class="btn-delete delete-confirm" style="border: none; background: transparent" data-model="projet" title="Supprimer projet" data-url="{{ route('projets.destroy', ['projet' => Auth::user()->projet]) }}" >
                                    <i class="fa fa-trash" style="color: red"></i>
                                </button>
                                <a href="{{ url('projet/'.Auth::user()->projet->id.'/edit') }}" data-model="projet" title="Modifier projet" class="edit-confirm btn-edit">
                                    <i class="fa fa-edit" style="color: blue"></i>
                                </a>
                            </div>
                            @endif
                        </h3>
                        @if(Auth::user()->hasProjet())
                            {{ Auth::user()->projet->titre }} <br>
                            <a href="{{ url('download/'.Auth::user()->projet->id.'/prototype') }}">
                                Fichier prototype
                            </a><br>
                            <a href="{{ url('download/'.Auth::user()->projet->id.'/bmc') }}">
                                Fichier BMC
                            </a><br>
                            <a href="{{ url('download/'.Auth::user()->projet->id.'/planAffaire') }}">
                                Fichier plan d'affaire
                            </a>
                        @endif
                    </div>
                    <h5>Description</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam liber tempor
                        cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat</p>
                    
                </div>
            </div>
            <div class="col-lg-12"></div>
        </div>
    </div>
</div>
@endsection
