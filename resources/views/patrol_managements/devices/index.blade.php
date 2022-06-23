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
                <div class="fs-3">Devices</div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('organizations.index') }}">Patrol Management</a>
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
                                        <select id="formOpt-patrolmanId" class="form-control" name="patrolmanId"></select>
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
                                    <label class="control-label col-xs-3">Route</label>
                                    <div class="col-xs-9">
                                        <select id="s-line" class="form-control" name="lineIds" multiple
                                            style="width: 100%;">
                                            <option value="179">Route_KDF-Dhemshimary</option>
                                            <option value="180">Route_NBEL-Katapara</option>
                                            <option value="181">Route_KBL-Sarkarpara</option>
                                            <option value="182">Route_KHL-Habibpur</option>
                                            <option value="183">Route_THL_1-Taragonj</option>
                                            <option value="184">Route_PLF-Pirgonj</option>
                                            <option value="185">Route_GF-Ghonirampur</option>
                                            <option value="186">Route_THL_3-Shurongeerbazar</option>
                                            <option value="187">Route_GFL-Gongachara</option>
                                            <option value="188">Route_APL-Ganjabari</option>
                                            <option value="194">Route_GP-Atargaon</option>
                                            <option value="200">Route_KFG-HeadOffice</option>
                                            <option value="227">Route_Thakurgaon Feedmill</option>
                                            <option value="228">Route_Panchagar Feedmill</option>
                                            <option value="230">Route_SPL-Moniramjot</option>
                                            <option value="235">Route_Srabon Poultry</option>
                                            <option value="312">nasir uddin</option>
                                            <option value="313">Route_Kazi Chicken Nalkura</option>
                                            <option value="315">Route_Jaldhaka Farms</option>
                                            <option value="316">Route_Nandigram Farms</option>
                                            <option value="318">Route_KGPL-Srikrishnapur</option>
                                            <option value="319">Route_Kazi Eggs-Chaklarhat</option>
                                            <option value="320">Route_Kazi Jhaljhali Farm</option>
                                            <option value="321">Route_RBCL-Akhanogor</option>
                                            <option value="322">Route_KGPL-Choprabari</option>
                                            <option value="323">Route_APL-Mirzapur</option>
                                            <option value="324">Route_Hybrid Farm</option>
                                            <option value="332">Route_Kazi Breeders_Yakubpur</option>
                                            <option value="333">Route_Kajol Dhigi Farm_Zalingi</option>
                                            <option value="338">Route_KGPL-Boirampur_Thakurgao</option>
                                            <option value="339">Route_Uttara Kazi Compost_Panchagarh</option>
                                            <option value="340">Route_Tetulia Eggs_Katapara</option>
                                            <option value="341">Route_Bhaluka Farms_Sarkarpara</option>
                                            <option value="342">Route_Kazi Foods_Sarkarpara</option>
                                            <option value="343">Route_Birol Poultry_Dinajpur</option>
                                            <option value="344">Route_Kazi Raigonj Farms</option>
                                            <option value="345">Route_Kazi Nilphamari Farms</option>
                                            <option value="364">Route_Batikmari Hatchery</option>
                                            <option value="389">Route_Gopalgonj Hatchery</option>
                                            <option value="393">Route_ Jaldhaka Compost Plant</option>
                                            <option value="394">Route_Gongachora Compost Plant</option>
                                            <option value="395">Route_ Shurongeer Bazer Compost Plant</option>
                                            <option value="396">Route_ Raigonj Compost Plant</option>
                                            <option value="397">Route_Nandigram Compost Plant</option>
                                            <option value="402">Route_Scrap and Spray Center Khocubari</option>
                                            <option value="407">Route_Gozaria Feed Mill</option>
                                            <option value="413">Route_Elite Force_India</option>
                                            <option value="414">Route_Elite Force_Thai</option>
                                            <option value="415">Route_Elite Force_philipine</option>
                                            <option value="416">Route_Elite Force_Maldives</option>
                                            <option value="423">Route_Elite Force_Brazil</option>
                                            <option value="424">Route_Elite Force_UAE</option>
                                            <option value="425">Route_Elite Force_Brunei Darussalam</option>
                                            <option value="426">Route_Elite Force_Turkish</option>
                                            <option value="427">Route_Elite Force_Qatar</option>
                                            <option value="428">Route_Elite Force_European</option>
                                            <option value="429">Route_Elite Force_Singapore</option>
                                            <option value="430">Route_Elite Force_Iraq</option>
                                            <option value="434">Route_Sagorika Feeds</option>
                                            <option value="438">ROUTE 1</option>
                                            <option value="439">ROUTE 2</option>
                                            <option value="446">Route_Noakhali Hatchery</option>
                                            <option value="493">Route_Sirajgonj Hatchery</option>
                                            <option value="495">Route-1</option>
                                            <option value="509">Route_Srimongal Hatchery</option>
                                            <option value="512">Route_Barishal Hatchery</option>
                                            <option value="586">Route_Rafid Poultry </option>
                                            <option value="595">Kajol Dhigi Farm</option>
                                            <option value="598">Route_Dhemshimary Compost Plant</option>
                                            <option value="631">Route_Shibpur Hatchery</option>
                                            <option value="632">Route_Zaman_Fashion</option>
                                            <option value="633">Route_Rashik GP Hatchery </option>
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
            deviceOpt.init('1');
        });
    </script>
@endpush
