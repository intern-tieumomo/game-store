@extends('admin.layouts.app')

@section('title', 'Games || Game Store')

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
                            <h2 class="content-header-title float-left mb-0">Game</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">Models
                                    </li>
                                    <li class="breadcrumb-item active">Game
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
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

                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Preview</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Publisher ID</th>
                                    <th>More Infomation</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($games as $game)
                                    <tr>
                                        <td></td>
                                        <td class="product-img"><img src="{{ asset('client/images/games/' . $game->id . '/preview.jpg') }}" alt="Img placeholder">
                                        <td class="product-title">{{ $game->title }}</td>
                                        <td class="product-price">{{ moneyFormat($game->price) }}</td>
                                        <td class="product-publisher">{{ $game->publisher->name }}</td>
                                        <td class="product-view-info">
                                            <span class="action-view-info text-success" data-toggle="modal" data-target="#info-{{ $game->id }}">
                                                View More <i class="feather icon-corner-right-up"></i>
                                            </span>
                                        </td>
                                        <td class="product-action">
                                            <span class="action-delete text-danger" data-id="{{ $game->id }}"><i class="feather icon-trash"></i></span>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="info-{{ $game->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel1">More info about {{ $game->title }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Release Date</h5>
                                                        <p>{{ $game->release_date }}</p>
                                                        <h5>Price</h5>
                                                        <p>{{ moneyFormat($game->price) }}</p>
                                                        <h5>Summary</h5>
                                                        <p>{{ $game->summary }}</p>
                                                        <h5>Features</h5>
                                                        <p>{{ $game->features }}</p>
                                                        <h5>Requirement</h5>
                                                        <p>{!! $game->requirement !!}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
	<script src="bower_components/admin/js/scripts/ui/data-list-view.js"></script>
    <script src="bower_components/admin/js/scripts/modal/components-modal.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.game').addClass("active");
            $('input[type=search]').removeClass('form-control-sm');
            $('.custom-select').css('border', 'none');
            $('.dt-buttons').remove();
        });
    </script>
@endsection
