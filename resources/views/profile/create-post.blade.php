@extends('layouts.app2')

@section('page-title', 'Create Post || Game Store')

@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
        <h2 class="l-text2 t-center">
            Create Post
        </h2>
    </section>

    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <form class="row" id="create-post-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 p-b-30">
                    <div class="leave-comment">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Post's Infomation
                        </h4>

                        <span class="s-text8 p-b-40">
                            <strong>Title:</strong>
                        </span>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" id="title" type="text" name="title" placeholder="Title" value="">
                        </div>

                        <span class="s-text8 p-b-40">
                            <strong>A preview image:</strong> <span class="notice">820 x 481, < 2MB recommended for display in blogs list, blog detail.<span>
                        </span>
                        <div class="of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-t-10 p-r-22" id="preview" type="file" name="preview" placeholder="Preview Image" value="">
                        </div>

                         <span class="s-text8 p-b-40">
                            <strong>Summary:</strong>
                        </span>
                        <textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" id="summary" name="summary"></textarea>

                        <span class="s-text8 p-b-40">
                            <strong>Content:</strong>
                        </span>
                        <textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" id="summernote"></textarea>

                        <div class="w-size25">
                            <button type="submit" class="btn-create-post flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4 m-t-30">
                                POST
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: '...',
                height: 500
            });

            $('#create-post-form').on('submit', function(e) {
                e.preventDefault();

                var data = new FormData(this);
                data.append('content', $('#summernote').summernote('code'));
                
                $.ajax({
                    url: "/store-post",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(result) {
                        swal({
                            title: "Game Store",
                            text: result['message'],
                            icon: "success",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((isView) => {
                            if (isView) {
                                window.open('/blogs/' + result['id'], '_blank');
                            }
                        });
                    },
                    error: function(result){
                        swal("Oops!", "Something went wrong", "warning");
                    }
                });
            });
        });
    </script>
@endsection
