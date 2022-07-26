@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/hummingbird-treeview.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/hua.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/zTreeStyle/zTreeStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #formOpt-roleIds {
            width: 250px !important;
        }

        #s-line {
            /* position: relative !important; */
            z-index: 1070 !important;
        }

        #modal-setting {
            z-index: 1051 !important;
        }
    </style>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="fs-3">Devices</div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('organizations.index') }}">
                            Patrol Management
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Devices</li>
                </ol>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row bg-white pt-2">
                <!-- Start col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header my-2">
                            <form id="formQuery" name="formQuery"
                                class="form-inline d-flex justify-content-start align-items-center" action="#">
                                <div class="form-group d-flex mx-2">
                                    <label class="mx-2">Name</label>
                                    <input class="form-control" name="name" placeholder="Task name">
                                </div>
                                <div class="form-group d-flex mx-2">
                                    <label class="mx-2">Organization</label>
                                    <input id="formQuery-area" class="form-control" name="area">
                                </div>
                                <button id="btn-query" type="button" class="btn btn-primary"><i
                                        class="fa fa-search"></i>Query</button>
                                <button id="btn-add-ui" type="button" class="btn btn-success"><i
                                        class="fa fa-plus"></i>Add</button>
                            </form>
                        </div>
                        <div class="box-body">
                            <table id="deviceTable" class="table"></table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->

            <div id="q-tree-wrap" class="combo-tree">
                <ul id="q-tree" class="ztree"></ul>
            </div>
            {{-- modal sections --}}
            <div id="modal-device" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="formOpt" name="formOpt" class="form-horizontal" action="#">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Device code</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="device_number" name="device_number"
                                            disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Mode</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="addCheckpoint">
                                            <option value="0">Collect record</option>
                                            <option value="1">Collect checkpoint</option>
                                            <option value="2">Collect patrolman tag</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="formOpt-d-area" class="form-group">
                                    <label class="control-label col-md-4">Organization</label>
                                    <div class="col-md-8">
                                        <ul id="opt-tree" class="ztree"></ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Description</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Owner</label>
                                    <div class="col-md-8">
                                        <select id="formOpt-patrolmanId" class="form-control"
                                            name="patrolmanId"></select>
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
            <div id="modal-setting" class="modal fade" role="dialog" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form name="formScreen" class="form-horizontal" action="#">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Sound</label>
                                    <div class="col-xs-9">
                                        <select name="beep" class="form-control">
                                            <option value="FF">buzzer</option>
                                            <option value="80">vibration</option>
                                            <option value="88">buzzer+vibration</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Clock</label>
                                    <div class="col-xs-9">
                                        <select class="form-control" name="clockGroupId">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Route</label>
                                    <div class="col-sm-9">
                                        <select id="s-line" class="form-control" name="lineIds" multiple
                                            style="width: 100%;">
                                            @foreach ($routes as $route)
                                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button id="btn-setting" type="button" class="btn btn-primary">Save</button>
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
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dropdownclick.js') }}"></script>
    <script src="{{ asset('js/jquery.ztree.all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('js/cq.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('js/language.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/toaster.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap-select.min.js') }}"></script> --}}
    <script src="{{ asset('js/device.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            areaTree.init();
            deviceOpt.init('1', '1');
        });
    </script>
@endpush
