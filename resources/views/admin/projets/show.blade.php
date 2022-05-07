@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('titre', 'Détail de projet')
@section('content')
<div class="wrapper">

    @include('admin.includes.header')
    @include('admin.includes.aside')
    <div class="content-wrapper" style="min-height: 257px">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Liste des projets</h1>
                    </div><!-- /.col -->

                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                @include('admin.includes.error-message')

                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="m-0">Liste des projets</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">

                                        <div class="row">
                                            <div class="col-12">
                                                <h4>{{ $projet->titre }}</h4>
                                                <div class="post">
                                                    <div class="user-block">
                                                        @if($projet->user->avatar != null)
                                                            <img  class="img-circle img-bordered-sm" src="{{ asset('storage/'.$projet->user->avatar) }}" alt="">
                                                        @else
                                                            <img  class="img-circle img-bordered-sm" src="{{ asset('front/assets/images/avatar.png') }}" alt="">
                                                        @endif
                                                        <span class="username">
                                                            <a href="#">
                                                                {{ $projet->user->nom }}
                                                                {{ $projet->user->prenom }}
                                                            </a>
                                                        </span>
                                                        <span class="description">Partagé publiquement - {{ $projet->created_at }}</span>
                                                    </div>

                                                    <p>
                                                        {{ $projet->description }}
                                                    </p>
                                                    <p>
                                                        @if($projet->document)
                                                        <a href="{{ url('download/'.$id."/document") }}" class="link-black text-sm"><i
                                                                class="fas fa-link mr-1"></i>
                                                            Fichier demo
                                                        </a>
                                                        @endif
                                                    </p>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    @endsection
