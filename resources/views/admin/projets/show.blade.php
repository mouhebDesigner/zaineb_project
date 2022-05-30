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
                                            <div class="col-8">
                                                <h4>Titre projet<br> {{ $projet->titre }}</h4>
                                                <div class="post">
                                                    <div class="user-block">
                                                        @if($projet->user->avatar != null)
                                                        <img class="img-circle img-bordered-sm"
                                                            src="{{ asset('storage/'.$projet->user->avatar) }}" alt="">
                                                        @else
                                                        <img class="img-circle img-bordered-sm"
                                                            src="{{ asset('front/assets/images/avatar.png') }}" alt="">
                                                        @endif
                                                        <span class="username">
                                                            <a href="#">
                                                                {{ $projet->user->nom }}
                                                                {{ $projet->user->prenom }}
                                                            </a>
                                                        </span>
                                                        <span class="description">Partagé publiquement -
                                                            {{ $projet->created_at }}</span>
                                                    </div>
                                                   
                                                    <h4>Description projet</h4>
                                                    <p>
                                                        {{ $projet->description }}
                                                    </p>
                                                    <p>
                                                        @if($projet->prototype)
                                                        <a href="{{ url('download/'.$projet->id.'/prototype') }}">
                                                            Fichier prototype
                                                        </a><br>
                                                        <a href="{{ url('download/'.$projet->id.'/bmc') }}">
                                                            Fichier BMC
                                                        </a><br>
                                                        <a href="{{ url('download/'.$projet->id.'/planAffaire') }}">
                                                            Fichier plan d'affaire
                                                        </a>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <form action="{{ url('commentaires') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="description_prototype">Commentaire 
                                                                    <a href="{{ asset($projet->prototype) }}" target="_blank">
                                                                        (PROTOTYPE)
                                                                    </a>
                                                                </label>
                                                                <textarea class="form-control" name="description_prototype"
                                                                value="{{ old('description_prototype') }}" id="description_prototype"
                                                                placeholder="Saisir commentaire">{{ old('description_prototype') }}</textarea>
                                                                @error('description_prototype')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_bmc">
                                                                    Commentaire 
                                                                    <a href="{{ asset($projet->bmc) }}" target="_blank">
                                                                        (BMC)
                                                                    </a>
                                                                </label>
                                                                <textarea class="form-control" name="description_bmc"
                                                                value="{{ old('description_bmc') }}" id="description_bmc"
                                                                placeholder="Saisir commentaire">{{ old('description_bmc') }}</textarea>
                                                                @error('description_bmc')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_planAffaire">Commentaire 
                                                                    <a href="{{ asset($projet->planAffaire) }}" target="_blank">
                                                                        (PLAN AFFAIRE)
                                                                    </a>
                                                                </label>
                                                                <textarea class="form-control" name="description_planAffaire"
                                                                    value="{{ old('description_planAffaire') }}" id="description_planAffaire"
                                                                    placeholder="Saisir commentaire">{{ old('description_planAffaire') }}</textarea>
                                                                @error('description_planAffaire')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Enregistrer</button>

                                                    </form>


                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="post">

                                                <h4>Membre de groupe</h4>
                                                @foreach(App\Models\Member::where('projet_id', $projet->id)->get() as $member)
                                                    <div class="user-block">
                                                        
                                                        <span class="username">
                                                            <a href="#">

                                                                {{ App\Models\User::where('id',$member->user_id)->first()->nom }}
                                                                {{ App\Models\User::where('id',$member->user_id)->first()->prenom }}
                                                            </a>
                                                        </span>
                                                    </div>
                                                @endforeach
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
