@extends('admin.layouts.app')

@section('title', 'Comment || Game Store')

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
                            <h2 class="content-header-title float-left mb-0">Comment</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">Models
                                    </li>
                                    <li class="breadcrumb-item active">Comment
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
                                    <th>Comment</th>
                                    <th>Account</th>
                                    <th>Post ID</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td></td>
                                    <td>{{ $comment->id }}</td>
                                    <td class="product-comment" id="product-comment" data-toggle="modal" data-target="#comment-detail-{{ $comment->id }}">{{ Str::limit($comment->comment, 50, '(...)') }}</td>
                                    <div class="modal fade text-left" id="comment-detail-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel1">Comment Detail</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Comment</h5>
                                                    <p>{{ $comment->comment }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="product-account" id="product-account" data-account="{{ $comment->account_id }}">{{ $comment->account->email }}</td>
                                    <td class="product-post" id="product-post">{{ $comment->post_id }}</td>
                                    <td class="product-action">
                                        <span class="action-edit" data-id="{{ $comment->id }}"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete" data-id="{{ $comment->id }}"><i class="feather icon-trash"></i></span>
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
            $('.comment').addClass("active");
            $('input[type=search]').removeClass('form-control-sm');
            $('.custom-select').css('border', 'none');
            $('.dt-buttons').remove();

            $('.table').on('click', '.product-post', function(e) {
                e.stopPropagation();
                var post_id = $(this).html();
                
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
