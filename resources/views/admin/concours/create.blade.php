@extends('admin.layouts.master')


@section('titre', 'ajouter concours')
@section('content')
<div class="wrapper">
    @include('admin.includes.header')
    @include('admin.includes.aside')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Ajouter un concours
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
                        <form action="{{ url('admin/concours') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre') }}"
                                        id="titre" placeholder="Saisir titre de concours">
                                    @error('titre')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <textarea class="form-control" name="description" value="{{ old('description') }}"
                                        id="description"
                                        placeholder="Saisir libellé de concours">{{ old('description') }}</textarea>
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="documents">Documents (PDF)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="documents[]" class="custom-file-input" onchange="javascript:updateDocument()"  id="documents" multiple="">
                                            <label class="custom-file-label" id="documentName" for="documents">Choisir documents</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Télécharger</span>
                                        </div>
                                    </div>
                                    @error('documents')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="images">Images</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" onchange="javascript:updateImage()" id="images" multiple="">
                                            <label class="custom-file-label" id="imageName" for="images">Choisir images</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Télécharger</span>
                                        </div>
                                    </div>
                                    @error('images')
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
