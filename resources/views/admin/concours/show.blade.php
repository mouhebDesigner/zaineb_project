@extends('admin.layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="wrapper">

    @include('admin.includes.header')
    @include('admin.includes.aside')
    <div class="content-wrapper" style="min-height: 257px">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Concour {{ $concour->titre }}</h1>
                    </div><!-- /.col -->

                </div>
            </div>
        </div>
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $concour->titre }}</h3>
                    <div class="card-tools d-flex justify-content-between">
                        <button type="submit" class="btn-delete delete-confirm" data-model="concour" title="Supprimer concour" data-url="{{ route('admin.concours.destroy', ['concour' => $concour]) }}" >
                            <i class="fa fa-trash"></i>
                        </button>
                        <a href="{{ url('admin/concours/'.$concour->id.'/edit') }}" data-model="concour" title="Modifier concour" class="edit-confirm btn-edit">
                            <i class="fa fa-pen"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{ $concour->description }}
                    <br>
                    @if($concour->resources()->where('type', 'image')->count())
                        <h3>Images</h3>
                        @foreach($concour->resources()->where('type', 'image')->get() as $image)
                            <img src="{{ asset('storage/'.$image->path) }}" width="100" height="100" alt="">
                        @endforeach
                    @endif
                    @if($concour->resources()->where('type', 'attachment')->count())
                        <h3>Documents</h3>
                        @foreach($concour->resources()->where('type', 'attachment')->get() as $image)
                            <a href="{{ route('download.file', ['id'=> $image->id]) }}">{{ $image->path }}</a><br>
                        @endforeach
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.concours.listerProjet', ['concour' => $concour]) }}" class="btn btn-primary">Lister les projets</a>
                    
                </div>

            </div>

        </section>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

@endsection
