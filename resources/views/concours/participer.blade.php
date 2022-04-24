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
                                <input type="file" name="document" placeholder="">
                                @error('document')
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

