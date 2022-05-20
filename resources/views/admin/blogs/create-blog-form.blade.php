
@extends('layouts.master')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title"><i class="ft-layout"></i>@if($updateMode == true) Edit @else Add @endif Blog</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blogs</a>
                                </li>
                                <li class="breadcrumb-item active">@if($updateMode == true) Edit @else Add @endif Blog
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Base style table -->
                <section id="base-style">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 offset-md-2 offset-sm-0">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Please enter the details for Blog:</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            {{--                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
                                            {{--                                            <li><a onclick="resetForm('save-profile-form')"><i class="ft-rotate-cw"></i></a></li>--}}
                                            {{--                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                                            {{--                                            <li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        @if(isset($updateMode) && $updateMode == true)
                                            @livewire('blog-form',['updateMode'=>$updateMode,'blog_id'=>$blogId])
                                        @else
                                            @livewire('blog-form',['updateMode'=>$updateMode])
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Base style table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            @if($updateMode == false)
            $('#sidebar_item_blog_create').addClass('active');
            @endif
        });


        function iconSelect(obj) {
            if (obj.files && obj.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_view').attr('src', e.target.result);
                };
                reader.readAsDataURL(obj.files[0]);
                $(obj).removeClass('is-invalid');
                $(obj).removeAttr('required');
            }
        }
    </script>
@endpush

