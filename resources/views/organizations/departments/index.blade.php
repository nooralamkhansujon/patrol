@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/hummingbird-treeview.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/zTreeStyle/zTreeStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table.min.css') }}" />
    <style>
        #treeview_container {
            background: #fff;
        }

        ul,
        li {
            list-style: none;
        }

        .folder-icon {
            color: #FBF3A6;
        }

        input[type="checkbox"] {
            background: #fff !important;
            color: #fff !important;
            border: 1px solid #E1F0FF;
            visibility: hidden;
        }

        .fa.fa-plus,
        .fa.fa-minus {
            font-size: 9px !important;
            color: black;
            padding: 0.5px;
            border: 0.5px solid #E1F0FF;
        }

        .checked {
            background: #FFC774 !important;
        }

        .button_content {
            background: #F4F4F4;
            color: #444444;
            border: 1px solid rgba(218, 213, 213, 0.8);
            outline: none;
            width: 90px;
            height: 90px;
        }

        .file-icon {
            color: #C3E1FF;
        }
    </style>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="fs-3">Organization</div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('organizations.index') }}">Organization</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Organization</li>
                </ol>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row bg-white pt-2">
                <div class="col-md-4">
                    <div class="button_container d-flex justify-content-between mb-3">
                        @can('create', App\Models\Organization::class)
                            <button
                                class="button_content d-flex flex-column justify-content-center align-items-center py-2 px-4"
                                id="btn-add">
                                <span><i class="fa fa-file"></i></span>
                                <span>Add</span>
                            </button>
                        @endcan
                        @can('updateView', App\Models\Organization::class)
                            <button id="btn-update"
                                class="button_content d-flex flex-column justify-content-center align-items-center py-2 px-4">
                                <span><i class="fas fa-pen-to-square"></i></span>
                                <span>Modify</span>
                            </button>
                        @endcan
                        @can('deleteView', App\Models\Organization::class)
                            <button id="btn-del"
                                class="button_content d-flex flex-column justify-content-center align-items-center py-2 px-4">
                                <span><i class="fas fa-times"></i></span>
                                <span>Delete</span>
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="row bg-white pt-2">
                <!-- Start col -->
                <div class="col-md-12">
                    {{-- <ul id="tree" class="ztree" style="width:500px; overflow:auto;"></ul> --}}
                    <ul id="area-tree" class="ztree"></ul>
                </div>
            </div>
            <!-- /.row (main row) -->


            {{-- modal sections --}}
            <div id="modal-area" class="modal fade bs-example-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="formOpt" class="form-horizontal" action="#">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Name</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" name="name">
                                        <span id="name_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Description</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" name="description">
                                        <span id="description_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button id="btn-save" type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of modal sections --}}
        </div><!-- /.container-fluid -->
    </div>
@endsection


@push('js')
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>

    {{-- <script src="{{ asset('js/bootstrap3.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/jquery.ztree.all.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.ztree.all.min.js') }}"></script>
    <script src="{{ asset('js/cq.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('js/language.js') }}"></script>
    <script src="{{ asset('js/toaster.js') }}"></script>
    <script src="{{ asset('js/areaTree.js') }}"></script>

    <script>
        $(document).ready(function() {

            $(function() {
                areaTree.init();
            });
        });
    </script>
@endpush
