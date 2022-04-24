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
                        <h2 class="login">Connexion</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form_inputs">
                                <input type="text" name="nom" placeholder="Saisir votre nom">
                            </div>
                            @error('nom')
                                <p class="error_input_message">{{ $message }}</p>
                            @enderror
                            <div class="form_inputs">
                                <input type="text" name="prenom" placeholder="Saisir votre prénom">
                                @error('prenom')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form_inputs">
                                <input type="text" name="numtel" placeholder="Saisir votre numéro de téléphone">
                                @error('numtel')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            
                         
                            <div class="form_inputs">
                                <input type="text" name="email" placeholder="Saisir votre email">
                                @error('email')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Saisir votre mot de passe">
                                @error('password')
                                    <p class="error_input_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form_inputs">
                                <input type="password" name="password_confirmation" placeholder="Confrimer mot de passe">
                            </div>
                            <button type="submit" class="readon submit-btn">Enovyer</button>
                            
                            <div class="last-password">
                                <p>Avez-vous déja un compte? <a href="{{ url('/login') }}">Se connecter ici</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

