@extends('layouts.master')

@section('includes')
    @include('includes.header')
@endsection

@section('content')
    <div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session('signed'))
                        <div class="alert alert_success">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Succés! </strong>  {{ session('signed') }}
                        </div>             
                    @endif
                </div>
            </div>
            <div class="noticed">
                <div class="main-part">                           
                    <div class="method-account">
                        <h2 class="login">Contactez-nous</h2>
                        <form method="POST" action="{{ url('contact') }}">
                            @csrf
                            <div class="row">
                                @guest
                                <div class="col-md-12">
                                     <div class="form_inputs">
                                        <input type="text" name="nom" placeholder="Nom" >
                                        @error('nom')
                                            <p class="error_input_message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_inputs">
                                        <input type="text" name="numtel" placeholder="Numéro de téléphone" >
                                        @error('numtel')
                                            <p class="error_input_message">{{ $message }}</p>
                                        @enderror
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form_inputs">
                                        <input type="email" name="email" placeholder="Email" >
                                        @error('email')
                                            <p class="error_input_message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                @endif
                                <div class="col-12">
                                    <div class="form_inputs">
                                        <input type="text" name="sujet" placeholder="Sujet" >
                                        @error('sujet')
                                            <p class="error_input_message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form_inputs">
                                        <textarea name="message" id="" cols="30" rows="6" placeholder="Message"></textarea>
                                        @error('message')
                                            <p class="error_input_message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="readon submit-btn">Envoyer</button>
                            <div class="form-group row mb-0">
                           
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

