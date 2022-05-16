@extends('admin.layouts.master')


@section('titre', 'ajouter concours')
@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Sélectionner les gagnants 
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire d'ajout</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/gagnant') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="prix">Première</label>
                                    <select name="gagnant" class="form-control" id="">
                                        <option value="" selected disabled>Sélectionner un projet</option>
                                        @foreach(App\Models\Projet::all() as $projet)
                                            <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prix">Deuxième</label>
                                    <select name="gagnant" class="form-control" id="">
                                        <option value="" selected disabled>Sélectionner un projet</option>
                                        @foreach(App\Models\Projet::all() as $projet)
                                            <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prix">Troisième</label>
                                    <select name="gagnant" class="form-control" id="">
                                        <option value="" selected disabled>Sélectionner un projet</option>
                                        @foreach(App\Models\Projet::all() as $projet)
                                            <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-info">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection