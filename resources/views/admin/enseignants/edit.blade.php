@extends('admin.layouts.master')


@section('titre', 'Modifier enseignant')
@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un enseignant 
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
                        <form action="{{ url('admin/enseignants/'.$enseignant->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body" id="inputs">
                               
                               
                                
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="{{ $enseignant->nom }}" id="nom" placeholder="Saisir nom">
                                    @error('nom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" value="{{ $enseignant->prenom }}" id="prenom" placeholder="Saisir prenom">
                                    @error('prenom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $enseignant->email }}" id="email" placeholder="Saisir email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label for="numtel">Numéro de téléphone </label>
                                    <input type="number" class="form-control" name="numtel" value="{{ $enseignant->numtel }}" id="numtel" placeholder="Saisir numtel">
                                    @error('numtel')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="specialite">Spécialité <span
                                            style="color: red">* </span></label>
                                    <input type="text" class="form-control" name="specialite"
                                        value="{{ $enseignant->specialite }}" id="specialite"
                                        placeholder="Saisir spécialité">
                                    @error('specialite')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="images">Avatar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" class="custom-file-input" onchange="javascript:updateImage()" id="images">
                                            <label class="custom-file-label" id="imageName" for="images">Choisir images</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Télécharger</span>
                                        </div>
                                    </div>
                                    @error('avatar')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe </label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Saisir password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer la Mot de passe</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Saisir password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
@section('script')


@endsection