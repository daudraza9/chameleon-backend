@extends('layouts.master')

@push('page-css')
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title"><i class="ft-layout"></i>Blogs</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Blogs
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <section id="base-style">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content collapse show">
                                                    <div class="card-body card-dashboard">
                                                        <p class="card-text"></p>

                                                        <li><a href="" class="btn btn-primary btn-min-width mr-1 mb-1 float-right"><i class="ft-plus"></i>Add New Blog</a></li>

                                                        <br>
                                                        <br>
                                                        <br>
                                                        @include('blogs.table')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#sidebar_item_blog_index').addClass('active');
        });

    </script>
@endpush
