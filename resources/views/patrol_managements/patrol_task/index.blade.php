@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/hummingbird-treeview.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/hua.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{asset('css/glyphicon.css')}}">

    <link rel="stylesheet" href="{{ asset('css/zTreeStyle/zTreeStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}" />
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
                <div class="fs-3">Routes</div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('organizations.index') }}">Patrol Management</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Routes</li>
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
                    <div class="box box-hua">
                        <div class="box-header">
                            <div class="query-toolbar">
                                <form name="formQuery" action="" class="form-inline">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <input class="form-control" name="search" placeholder='Task name'>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group d-flex justify-content-between align-items-center">
                                                <label >Start date</label>
                                                <input type="text" class="form-control datetime" name="startDate">-<input type="text" title="End Date" class="form-control input-sm datetime" name="endDate">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group d-flex justify-content-between align-items-center">
                                                <label>Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="">All</option>
                                                    <option value="0">Daily</option>
                                                    <option value="1">Weekly</option>
                                                    <option value="2">Monthly</option>
                                                    <option value="3">Cycle</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <div class="form-group d-flex justify-content-left align-items-center">
                                                {{-- <label>Type</label> --}}
                                                <div class="form-group" style="position: relative;">
                                                    <label>Organizaiton</label>
                                                    <input id="formQuery-area" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group d-flex justify-content-left align-items-center">
                                                <label>Route</label>
                                                <select class="form-control line-select2" name="lineId">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-left align-items-center">
                                            <button id="btn-query" type="button" class="btn btn-primary"><i class="fa fa-search"></i>Query</button>
                                            <div class="btn-group">
                                            <button id="btn-add-day" type="button" class="btn btn-success"><i class="fa fa-plus"></i>Add</button>
                                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><a id="a-add-day" href="#">Daily</a></li>
                                                <li><a id="a-add-week" href="#">Weekly</a></li>
                                                <li><a id="a-add-month" href="#">Monthly</a></li>
                                                <li><a id="a-add-cycle" href="#">Cycle</a></li>
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="tb-plan" class="data-table"></table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->

            <div id="q-tree-wrap" class="combo-tree"><ul id="q-tree" class="ztree"></ul></div>
            <div id="line-day-tree-wrap" class="combo-tree"><ul id="line-day-tree" class="ztree"></ul></div>
            {{-- modal sections --}}
            <div id="modal-plan-day" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog modal-hua modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">宸ヤ綔璁″垝(姣忓ぉ)</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-plan-day" name="formPlanDay" class="form-horizontal" action="#" style="overflow: hidden;">
                                <input type="hidden" name="id">
                                <input type="hidden" name="type" value="0">
                                <input type="hidden" name="reCreate">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Name</label>
                                            <div class="col-xs-9">
                                                <input class="form-control" name="name" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Route</label>
                                            <div class="col-xs-9" style="position: relative;">
                                                <input id="form-day-line" class="form-control input-tree" name="line" placeholder='Please choose a route' readonly="readonly">
                                                <input type="hidden" name="lineId">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Start date</label>
                                            <div class="col-xs-9">
                                                <input id="form-day-startDate" class="form-control day-datetime" name="startDate" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">End date</label>
                                            <div class="col-xs-9">
                                                <input id="form-day-endDate" class="form-control day-datetime" name="endDate" type="text" placeholder='If it is not filled in, it is permanently valid'>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Week</label>
                                            <div class="col-xs-9">
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" name="mon">Monday
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" name="tue">Tuesday
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" name="wed">Wednesday
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" name="thu">Thursday
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3"></label>
                                            <div class="col-xs-9">
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" name="fri">Friday
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" name="sat">Saturday
                                                </label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" name="sun">Sunday
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div style="margin-bottom: 15px;">
                                            <button id="btn-add-shift" type="button" class="btn btn-success">Add shift</button>
                                            <button id="btn-remove-shift" type="button" class="btn btn-danger">Delete shift</button>
                                        </div>
                                        <table id="shift-table"></table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button id="btn-save-day" type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal-shift" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add shift</h4>
                        </div>
                        <div class="modal-body">
                            <form id="formShift" name="formShift" class="form-horizontal" action="#">
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Start time</label>
                                    <div class="col-xs-9">
                                        <div class="bootstrap-timepicker">
                                            <input
                                            class="form-control uitime" name="startTime" value="00:00">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">End time</label>
                                    <div class="col-xs-9">
                                        <div class="bootstrap-timepicker">
                                            <input
                                            class="form-control uitime"
                                            name="endTime" value="00:00">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3"></label>
                                    <div class="col-xs-9">
                                        <label class="checkbox-inline">
                                            <input id="cbx-batch" type="checkbox" name="batch">Batch setting
                                        </label>
                                    </div>
                                </div>
                                <div id="batch-item" style="display: none">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Patrol time</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" name="patrolDuration" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Break time</label>
                                        <div class="col-xs-9">
                                            <input class="form-control" name="restDuration" value="0">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button id="btn-save-shift" type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal-plan" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog modal-hua">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-plan" name="formPlan" class="form-horizontal" action="#">
                                <input type="hidden" name="id">
                                <input type="hidden" name="type">
                                <input type="hidden" name="reCreate">
                                <div class="form-group row mb-2">
                                    <label class="control-label col-sm-3">Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="control-label col-sm-3">Route</label>
                                    <div class="col-sm-9">
                                        <input id="form-line" class="form-control input-tree" name="line"
                                            placeholder='Please choose a route' readonly="readonly">
                                        <input type="hidden" name="lineId">
                                        <div id="line-tree-wrap" class="combo-tree">
                                            <ul id="line-tree" class="ztree"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="build-wrap" class="form-group plan-week-month row mb-2" style="display: none;">
                                    <label class="control-label col-sm-3"></label>
                                    <div class="col-sm-9">
                                        <label>
                                            <input type="checkbox" name="building">
                                            <span id="span-week-month">
                                                绔嬪嵆鐢熸垚鏈懆璁″垝</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group plan-week-month row mb-2">
                                    <label class="control-label col-sm-3"></label>
                                    <div class="col-sm-9">
                                        <label id="label-tip" class="label-warning"></label>
                                    </div>
                                </div>
                                <div class="form-group plan-cycle row mb-2">
                                    <label class="control-label col-sm-3">Start date</label>
                                    <div class="col-sm-9">
                                        <input id="form-startDate" class="form-control datetime" name="startDate"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group plan-cycle row">
                                    <label class="control-label col-sm-3">End date</label>
                                    <div class="col-sm-9">
                                        <input id="form-endDate" class="form-control datetime" name="endDate" type="text"
                                            placeholder='If it is not filled in, it is permanently valid'>
                                    </div>
                                </div>
                                <div class="form-group plan-cycle row" style="display: none;">
                                    <label class="control-label col-sm-3">Patrol cycle</label>
                                    <div class="col-sm-9">
                                        <label>Every<input class="form-control" name="cycle" type="text"
                                                style="width: 80px;display: inline-block;">
                                            day patrol once</label>
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
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/plan.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            planOpt.init('1', '');
        });
    </script>
@endpush
