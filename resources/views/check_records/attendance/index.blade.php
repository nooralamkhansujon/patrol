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
    </style>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="fs-3">Attendance</div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('organizations.index') }}">Organization</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Checkpoint Log</li>
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
                            <form id="formQuery" name="formQuery" class="form-inline" action="#">
                                <div class="row  align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Time range</label>
                                            <input type="text" class="form-control" id="reservationtime"
                                                style="min-width: 280px;">
                                            <input id="formQuery-startTime" type="hidden" name="startTime">
                                            <input id="formQuery-endTime" type="hidden" name="endTime">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Organizaiton</label>
                                            <input id="formQuery-area" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Device</label>
                                            <select class="form-control" name="deviceId">
                                                <option value="">All</option>
                                                @foreach ($devices as $device)
                                                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="form-group col-md-4">
                                        <label>Patrolman</label>
                                        <select class="form-control" name="patrolmanId">
                                            @foreach ($patrolmens as $patrolmen)
                                                <option value="{{ $patrolmen->id }}">{{ $patrolmen->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Checkpoint</label>

                                        <select id="checkpoint-select" class="form-control" name="checkpointId">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <button id="btn-query" type="button" class="btn btn-primary"><i
                                                class="fa fa-search"></i>Query
                                        </button>
                                        <div class="btn-group">
                                            <button id="btn-group" type="button" class="btn btn-primary">
                                                Export<span class="caret"></span>
                                                <ul class="dropdown-menu" id="dropdown">
                                                    <li class="dropdown-item"><a id="btn-excel" href="#">Excel</a>
                                                    </li>
                                                    <li class="dropdown-item"><a id="btn-pdf" href="#">PDF</a></li>
                                                </ul>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box-body">
                            <table id="checkpointLog-table" class="table"></table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </div>
    <div id="q-tree-wrap" class="combo-tree">
        <ul id="q-tree" class="ztree"></ul>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


    <script src="{{ asset('js/cq.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('js/language.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/toaster.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap-select.min.js') }}"></script> --}}
    <script src="{{ asset('js/checkpointLog.js') }}"></script>

    <script>
        // $(document).ready(function() {
        //     $('#formOpt-roleIds').select2({
        //         placeholder: "Select a Role",
        //         dropdownParent: $("#role-wrap")
        //     });
        // });

        $(function() {
            areaTree.init();
            checkpointLogOpt.init('1', '1');
        });
    </script>
@endpush
