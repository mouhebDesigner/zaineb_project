@extends('admin.layouts.master')


@section('titre', 'modifier concours')
@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un concours 
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
                        <form action="{{ url('admin/concours/'.$concour->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" name="titre" value="{{ $concour->titre }}" id="titre" placeholder="Saisir titre de concours">
                                    @error('titre')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <textarea class="form-control" name="description" value="{{ $concour->description }}" id="description" placeholder="Saisir libellé de concours">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_fin">Date fin</label>
                                    <input type="date" class="form-control" name="date_fin" value="{{ $concour->date_fin }}" id="date_fin" placeholder="Saisir date_fin de concours">
                                    @error('date_fin')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <button type="reset" class="btn btn-info">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection