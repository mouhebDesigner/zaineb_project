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
                        <form action="{{ url('admin/gagnant') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{ $id }}" name="projet_id">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="prix">Prix</label>
                                    <select name="gagnant" class="form-control" id="">
                                        <option value="" selected disabled>Sélectionner un prix</option>
                                        @if(App\Models\Projet::where('gagnant', 'first')->count() ==0)
                                        <option value="first">{{ App\Models\Projet::find($id)->concour->prix_first }}</option>
                                        @endif
                                        @if(App\Models\Projet::where('gagnant', 'second')->count() ==0)
                                        <option value="second">{{ App\Models\Projet::find($id)->concour->prix_second }}</option>
                                        @endif
                                        @if(App\Models\Projet::where('gagnant', 'third')->count() ==0)
                                        <option value="third">{{ App\Models\Projet::find($id)->concour->prix_third }}</option>
                                        @endif
                                    </select>
                                    @error('prix')
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