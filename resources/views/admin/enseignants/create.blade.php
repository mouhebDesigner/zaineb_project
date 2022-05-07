@extends('admin.layouts.master')

@section('titre', 'Ajouter enseignant')
@section('content')
<div class="wrapper">
    @include('admin.includes.header')
    @include('admin.includes.aside')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Ajouter un enseignant
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
                        <form action="{{ url('admin/enseignants') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="nom">Nom <span
                                            style="color: red">* </span> </label>
                                    <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" id="nom"
                                        placeholder="Saisir nom ">
                                    @error('nom')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom <span
                                            style="color: red">* </span> </label>
                                    <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}"
                                        id="prenom" placeholder="Saisir prenom ">
                                    @error('prenom')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email  <span
                                            style="color: red">* </span></label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                        id="email" placeholder="Saisir email ">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="numtel">Numéro de téléphone  <span
                                            style="color: red">* </span></label>
                                    <input type="number" class="form-control" name="numtel" value="{{ old('numtel') }}"
                                        id="numtel" placeholder="Saisir numéro de téléphone ">
                                    @error('numtel')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="specialite">Spécialité <span
                                            style="color: red">* </span></label>
                                    <input type="text" class="form-control" name="specialite"
                                        value="{{ old('specialite') }}" id="specialite"
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
                                    <label for="password">Mot de passe  <span
                                            style="color: red">* </span></label>
                                    <input type="password" class="form-control" name="password"
                                        value="{{ old('password') }}" id="password" placeholder="Saisir mot de passe ">
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer le Mot de passe <span
                                            style="color: red">* </span></label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        value="{{ old('password') }}" id="password" placeholder="Saisir mot de passe ">
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
    <script>
        $("#tp").on('click', function () {
            $("#enseignant_tp").css('display', 'block');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/teachers/',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    console.log(data);

                    $.each(data, function (index, value) {
                        $('#enseignant_id_tp').append('<option value="' + value.enseignant
                            .id + '">' + value.nom + '</option>');
                    });

                }
            });
        });
        $("#td").on('click', function () {
            $("#enseignant_td").css('display', 'block');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/teachers/',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    console.log(data);

                    $.each(data, function (index, value) {
                        $('#enseignant_id_td').append('<option value="' + value.enseignant
                            .id + '">' + value.nom + '</option>');
                    });

                }
            });
        });
        $("#cours").on('click', function () {
            $("#enseignant_cours").css('display', 'block');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/teachers/',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    console.log(data);

                    $.each(data, function (index, value) {
                        $('#enseignant_id_cours').append('<option value="' + value
                            .enseignant.id + '">' + value.nom + '</option>');
                    });

                }
            });
        });
        $("#section_id").on('change', function () {
            var section_id = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/module_list/' + section_id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    console.log("test");
                    $("#module_id").empty();
                    $("#module_id").append(
                        '<option value="" disabled selected> Choisir module</option>')
                    $.each(data, function (index, value) {
                        $("#module_id").append('<option value="' + value.id + '">' + value
                            .titre + '</option>')
                    });
                }
            });
        });

    </script>

    @endsection
