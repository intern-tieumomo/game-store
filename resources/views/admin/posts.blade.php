@extends('admin.layouts.app')

@section('title', 'Post || Game Store')

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
                            <h2 class="content-header-title float-left mb-0">Post</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">Models
                                    </li>
                                    <li class="breadcrumb-item active">Post
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
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Release Date</th>
                                    <th>Account</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td></td>
                                    <td>{{ $post->id }}</td>
                                    <td class="product-title" data-id="{{ $post->id }}">{{ Str::limit($post->title, 50, '(...)') }}</td>
                                    <td class="product-date" id="product-date">{{ $post->release_date }}</td>
                                    <td class="product-publisher" id="product-publisher">{{ $post->account->publisher->name }}</td>
                                    <td class="product-action">
                                        <span class="action-edit" data-id="{{ $post->id }}"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete" data-id="{{ $post->id }}"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="add-new-data-sidebar">
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
                    </div>--}}
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="bower_components/admin/js/scripts/ui/data-list-view.js"></script>
    <script src="bower_components/admin/js/scripts/modal/components-modal.js"></script>
    <script>
        $(document).ready(function() {
            $('.post').addClass("active");
            $('input[type=search]').removeClass('form-control-sm');
            $('.custom-select').css('border', 'none');
            $('.dt-buttons').remove();

            $('.table').on('click', '.product-title', function(e) {
                e.stopPropagation();
                var post_id = $(this).data('id');
                
                Swal.fire({
                    title: 'Game Store',
                    text: "View post?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, view post!',
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    buttonsStyling: false,
                }).then(function (result) {
                    if (result.value) {
                        window.open('/blogs/' + post_id, '_blank');
                    } else if (result.dismiss === Swal.DismissReason.cancel) {}
                });
            });
        });
    </script>
@endsection
