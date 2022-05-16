@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
    <div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="noticed">
                <div class="main-part">                           
                    <div class="method-account">
                        <h2 class="login">Participer à un concour</h2>
                        <form method="POST" action="{{ url('participer') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="concour_id" value="{{ $id }}">
                            <div class="form_inputs">
                                <input type="text" name="titre" placeholder="Saisir un titre">
                                @error('titre')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="" cols="30" rows="10" placeholder="Saisir description"></textarea>
                                @error('description')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="text-left" style="width: 100%; text-align: left">
                                    prototype
                                </label>
                                <input type="file" name="prototype" placeholder="">
                                @error('prototype')
                                <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="text-left" style="width: 100%; text-align: left">
                                    BMC
                                </label>
                                <input type="file" name="bmc" placeholder="">
                                @error('bmc')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="text-left" style="width: 100%; text-align: left">
                                    Plan d'affaire
                                </label>
                                <input type="file" name="planAffaire" placeholder="">
                                @error('planAffaire')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="members" class="text-left" style="width: 100%; text-align: left">
                                    Membre groupe
                                </label>
                                <select name="members[]" id="members" multiple="multiple">
                                    <option value="" selected disbaled>Selectionner membre de groupe</option>
                                    @foreach(App\Models\User::where('role', 'etudiant')->where('id','!=', Auth::id())->get() as $user)
                                        <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }}</option>
                                    @endforeach
                                </select>
                                @error('planAffaire')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="readon submit-btn">Envoyer</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

