@extends('layouts.master')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/hummingbird-treeview.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/zTreeStyle/zTreeStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/_all-skin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hua.css') }}" />
    <style>
        #treeview_container {
            background: #fff;
        }

        ul,
        li {
            list-style: none;
        }

        .ztree-height {
            height: 300px;
            overflow-y: auto;
        }


        .button_content {
            background: #F4F4F4;
            color: #444444;
            border: 1px solid rgba(218, 213, 213, 0.8);
            outline: none;
            width: 90px;
            height: 90px;
        }

    </style>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="fs-3">Roles</div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('organizations.index') }}">Organization</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Role Management</li>
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
                        <button class="btn btn-success" id="btn-add-ui">
                            <span>Add</span>
                        </button>
                        {{-- <button id="btn-update"
                            class="button_content d-flex flex-column justify-content-center align-items-center py-2 px-4">
                            <span><i class="fas fa-pen-to-square"></i></span>
                            <span>Modify</span>
                        </button>
                        <button id="btn-del"
                            class="button_content d-flex flex-column justify-content-center align-items-center py-2 px-4">
                            <span><i class="fas fa-times"></i></span>
                            <span>Delete</span>
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="row bg-white pt-2">
                <!-- Start col -->
                <div class="col-md-12">
                    <table id="role-table" class="table"></table>
                </div>
            </div>
            <!-- /.row (main row) -->


            {{-- modal sections --}}
            <div id="modal-role" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form name="formRole" action="#" class="form-horizontal">
                                <input type="hidden" name="id">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Role description</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Permission</label>
                                    <div class="col-md-9 ztree-height">
                                        <ul id="privilege-tree" class="ztree"></ul>
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
    <script src="{{ asset('js/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/cq.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('js/language.js') }}"></script>
    <script src="{{ asset('js/toaster.js') }}"></script>
    <script src="{{ asset('js/role.js') }}"></script>

    <script>
        var zTree;
        var demoIframe;

        var setting = {
            view: {
                dblClickExpand: false,
                showLine: true,
                selectedMulti: false,
            },
            data: {
                // keep: {
                //     parent: true
                // },
                simpleData: {
                    enable: true,
                    idKey: "id",
                    pIdKey: "pId",
                    rootPId: "0"
                }
            },
            callback: {
                beforeClick: function(treeId, treeNode) {
                    // console.log(treeNode, 'treenode')
                    // console.log(treeId, 'treeId')
                    var zTree = $.fn.zTree.getZTreeObj("area-tree");
                    if (treeNode.isParent) {
                        zTree.expandNode(treeNode);
                        return false;
                    }


                    // else {
                    //     demoIframe.attr("src", treeNode.file + ".html");
                    //     return true;
                    // }
                },
                onClick(treeId, treeNode) {
                    console.log(treeNode, 'treenode')
                }
            }
        };

        var zNodes = [{
                id: 1,
                pId: 0,
                name: "[core] Basic Functions",
                open: false
            },
            {
                id: 101,
                pId: 1,
                name: "Standard JSON Data",
                file: "core/standardData"
            },
            {
                id: 102,
                pId: 1,
                name: "Simple JSON Data",
                file: "core/simpleData"
            },
            {
                id: 103,
                pId: 1,
                name: "Don't Show Line",
                file: "core/noline"
            },
            {
                id: 104,
                pId: 1,
                name: "Don't Show Icon",
                file: "core/noicon"
            },
            {
                id: 105,
                pId: 1,
                name: "Custom Icon - icon",
                file: "core/custom_icon"
            },
            {
                id: 106,
                pId: 1,
                name: "Custom Icon - iconSkin",
                file: "core/custom_iconSkin"
            },
            {
                id: 107,
                pId: 1,
                name: "Custom Fonts",
                file: "core/custom_font"
            },
            {
                id: 115,
                pId: 1,
                name: "Hyperlinks Demo",
                file: "core/url"
            },
            {
                id: 108,
                pId: 1,
                name: "Dynamic Tree with Ajax",
                file: "core/async"
            },
            {
                id: 109,
                pId: 1,
                name: "Dynamic Tree - zTree methods",
                file: "core/async_fun"
            },
            {
                id: 110,
                pId: 1,
                name: "Update Node - zTree methods",
                file: "core/update_fun"
            },
            {
                id: 111,
                pId: 1,
                name: "Control of Click Node",
                file: "core/click"
            },
            {
                id: 112,
                pId: 1,
                name: "Control of Expand Node",
                file: "core/expand"
            },
            {
                id: 113,
                pId: 1,
                name: "Search Nodes",
                file: "core/searchNodes"
            },
            {
                id: 114,
                pId: 1,
                name: "Other Mouse Events for zTree",
                file: "core/otherMouse"
            },

            {
                id: 2,
                pId: 114,
                name: "[excheck] Checkbox & Radio",
                open: false
            },
            {
                id: 201,
                pId: 2,
                name: "Checkbox Operation",
                file: "excheck/checkbox"
            },
            {
                id: 206,
                pId: 2,
                name: "Checkbox nocheck Demo",
                file: "excheck/checkbox_nocheck"
            },
            {
                id: 207,
                pId: 2,
                name: "Checkbox chkDisabled Demo",
                file: "excheck/checkbox_chkDisabled"
            },
            {
                id: 208,
                pId: 2,
                name: "Checkbox halfCheck Demo",
                file: "excheck/checkbox_halfCheck"
            },
            {
                id: 202,
                pId: 2,
                name: "Statistics Checkbox is Checked",
                file: "excheck/checkbox_count"
            },
            {
                id: 203,
                pId: 2,
                name: "Checkbox - zTree methods",
                file: "excheck/checkbox_fun"
            },
            {
                id: 204,
                pId: 2,
                name: "Radio Operation",
                file: "excheck/radio"
            },
            {
                id: 209,
                pId: 2,
                name: "Radio nocheck Demo",
                file: "excheck/radio_nocheck"
            },
            {
                id: 210,
                pId: 2,
                name: "Radio chkDisabled Demo",
                file: "excheck/radio_chkDisabled"
            },
            {
                id: 211,
                pId: 2,
                name: "Radio halfCheck Demo",
                file: "excheck/radio_halfCheck"
            },
            {
                id: 205,
                pId: 2,
                name: "Radio - zTree methods",
                file: "excheck/radio_fun"
            },

            {
                id: 3,
                pId: 2,
                name: "[exedit] Editing",
                open: false
            },
            {
                id: 301,
                pId: 3,
                name: "Normal Drag Node Operation",
                file: "exedit/drag"
            },
            {
                id: 302,
                pId: 3,
                name: "Advanced Drag Node Operation",
                file: "exedit/drag_super"
            },
            {
                id: 303,
                pId: 3,
                name: "Move / Copy - zTree methods",
                file: "exedit/drag_fun"
            },
            {
                id: 304,
                pId: 3,
                name: "Basic Edit Nodes",
                file: "exedit/edit"
            },
            {
                id: 305,
                pId: 3,
                name: "Advanced Edit Nodes",
                file: "exedit/edit_super"
            },
            {
                id: 306,
                pId: 3,
                name: "Edit Nodes - zTree methods",
                file: "exedit/edit_fun"
            },
            {
                id: 307,
                pId: 3,
                name: "Editing Dynamic Tree",
                file: "exedit/async_edit"
            },
            {
                id: 308,
                pId: 3,
                name: "Multiple Trees",
                file: "exedit/multiTree"
            },

            {
                id: 4,
                pId: 3,
                name: "Large Amount of Data Loading",
                open: false
            },
            {
                id: 401,
                pId: 4,
                name: "One-time Large Data Loading",
                file: "bigdata/common"
            },
            {
                id: 402,
                pId: 4,
                name: "Loading Data in Batches",
                file: "bigdata/diy_async"
            },
            {
                id: 403,
                pId: 4,
                name: "Loading Data By Pagination",
                file: "bigdata/page"
            },

            {
                id: 5,
                pId: 4,
                name: "Multi-functional",
                open: false
            },
            {
                id: 501,
                pId: 5,
                name: "Freeze the Root Node",
                file: "super/oneroot"
            },
            {
                id: 502,
                pId: 5,
                name: "Click to Expand Node",
                file: "super/oneclick"
            },
            {
                id: 503,
                pId: 5,
                name: "Keep Single Path",
                file: "super/singlepath"
            },
            {
                id: 504,
                pId: 5,
                name: "Adding Custom DOM",
                file: "super/diydom"
            },
            {
                id: 505,
                pId: 5,
                name: "Checkbox / Radio Coexistence",
                file: "super/checkbox_radio"
            },
            {
                id: 506,
                pId: 5,
                name: "Left Menu",
                file: "super/left_menu"
            },
            {
                id: 513,
                pId: 5,
                name: "Left Menu Like OutLook Style",
                file: "super/left_menuForOutLook"
            },
            {
                id: 507,
                pId: 5,
                name: "Drop-down Menu",
                file: "super/select_menu"
            },
            {
                id: 509,
                pId: 5,
                name: "Drop-down Menu with checkbox",
                file: "super/select_menu_checkbox"
            },
            {
                id: 510,
                pId: 5,
                name: "Drop-down Menu with radio",
                file: "super/select_menu_radio"
            },
            {
                id: 508,
                pId: 5,
                name: "Right-click Menu",
                file: "super/rightClickMenu"
            },
            {
                id: 511,
                pId: 5,
                name: "Drag With Other DOMs",
                file: "super/dragWithOther"
            },
            {
                id: 512,
                pId: 5,
                name: "Expand All Nodes with Async",
                file: "super/asyncForAll"
            },

            {
                id: 6,
                pId: 5,
                name: "Other Extension Package",
                open: false
            },
            {
                id: 601,
                pId: 6,
                name: "hide ordinary node",
                file: "exhide/common"
            },
            {
                id: 602,
                pId: 6,
                name: "hide with checkbox mode",
                file: "exhide/checkbox"
            },
            {
                id: 603,
                pId: 6,
                name: "hide with radio mode",
                file: "exhide/radio"
            }
        ];

        $(document).ready(function() {
            $(function() {
                roleOpt.init('1', '1');
            });
            // var t = $("#area-tree");
            // t = $.fn.zTree.init(t, setting, zNodes);
            // demoIframe = $("#testIframe");
            // demoIframe.bind("load", loadReady);
            // var zTree = $.fn.zTree.getZTreeObj("tree");
            // zTree.selectNode(zTree.getNodeByParam("id", 101));

        });

        function loadReady() {
            var bodyH = demoIframe.contents().find("body").get(0).scrollHeight,
                htmlH = demoIframe.contents().find("html").get(0).scrollHeight,
                maxH = Math.max(bodyH, htmlH),
                minH = Math.min(bodyH, htmlH),
                h = demoIframe.height() >= maxH ? minH : maxH;
            if (h < 530) h = 530;
            demoIframe.height(h);
        }
    </script>
@endpush
