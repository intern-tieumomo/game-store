@extends('admin.layouts.app')

@section('title', 'Account || Game Store')

@section('css')
	<link rel="stylesheet" type="text/css" href="bower_components/admin/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="bower_components/admin/css/pages/data-list-view.css">
@endsection

@section('content')
	<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Account</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">Models
                                    </li>
                                    <li class="breadcrumb-item active">Account
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
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($accounts as $account)
                                <tr>
                                    <td></td>
                                    <td class="priduct-id">{{ $account->id }}</td>
                                    <td class="product-email" id="product-email">{{ $account->email }}</td>
                                    <td class="product-password" id="product-password" data-password="{{ $account->password }}">********</td>
                                    <td>
                                        <div class="chip @if ($account->role == 1) {{ "chip-success" }} @elseif ($account->role == 2) {{ "chip-warning" }} @elseif ($account->role == 9) {{ "chip-danger" }} @endif" data-id="{{ $account->id }}">
                                            <div class="chip-body">
                                                <div class="chip-text" data-role="{{ $account->role }}" data-id="{{ $account->id }}">
                                                	@if ($account->role == 1)
                                                		{{ "User" }}
                                                	@elseif ($account->role == 2)
                                                		{{ "Publisher" }}
                                                	@elseif ($account->role == 9)
                                                		{{ "Admin" }}
                                                	@endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-action">
                                        <span class="action-edit" data-id="{{ $account->id }}"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete" data-id="{{ $account->id }}"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">Account</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <form class="row">
                                        <input type="hidden" name="id" id="data-id" value="">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-email">Email</label>
                                            <input type="email" class="form-control" name="email" id="data-email" disabled autocomplete="organization">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-password"> Password </label>
                                            <input type="password" class="form-control" name="password" id="data-password" disabled autocomplete="organization">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                        	<label for="data-role">Role</label>
                                            <select class="form-control" name="role" id="data-role">
                                                <option value="1">User</option>
                                                <option value="2">Publisher</option>
                                                <option value="9">Admin</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn-submit btn btn-primary">Update</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('js')
	<script src="bower_components/admin/js/scripts/ui/data-list-view.js"></script>
	<script src="bower_components/admin/js/pages/accounts.js"></script>
@endsection
