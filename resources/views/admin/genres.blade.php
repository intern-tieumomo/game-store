@extends('admin.layouts.app')

@section('title', 'Genre || Game Store')

@section('css')
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/pages/data-list-view.css">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Genre</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">Models
                                    </li>
                                    <li class="breadcrumb-item active">Genre
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($genres as $genre)
                                <tr>
                                    <td></td>
                                    <td class="priduct-id">{{ $genre->id }}</td>
                                    <td class="product-name" id="product-name">{{ $genre->name }}</td>
                                    <td class="product-action">
                                        <span class="action-edit" data-id="{{ $genre->id }}"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete" data-id="{{ $genre->id }}"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- Data list view end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('js')
    <script src="bower_components/admin/js/scripts/ui/data-list-view.js"></script>
    <script>
        $(document).ready(function() {
            $('.genre').addClass("active");
            $('input[type=search]').removeClass('form-control-sm');
            $('input[type=search]').removeAttr('placeholder');
            $('.custom-select').css('border', 'none');
            $('.dt-buttons').remove();
        });
    </script>
@endsection
