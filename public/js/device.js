var areaTree = {
    options: {
        query: {
            data: { simpleData: { enable: true } },
            check: {
                enable: true,
                chkStyle: "checkbox",
                chkboxType: { Y: "s", N: "s" },
            },
            view: { dblClickExpand: false, selectedMulti: true },
            callback: { onCheck: onQueryAreaTreeCheck },
        },
        opt: {
            data: { simpleData: { enable: true } },
            check: {
                enable: true,
                chkStyle: "radio",
                chkboxType: { Y: "s", N: "s" },
                radioType: "all",
            },
            callback: { onCheck: onOptAreaTreeCheck },
        },
    },
    url: "../organizations/get-ajax",
    queryTree: null,
    optTree: null,
    init: function () {
        $.get(areaTree.url, {}, function (data) {
            areaTree.queryTree = $.fn.zTree.init(
                $("#q-tree"),
                areaTree.options.query,
                data.organizations
            );
            areaTree.optTree = $.fn.zTree.init(
                $("#opt-tree"),
                areaTree.options.opt,
                data.organizations
            );
            $("#formQuery-area").on("focus", function () {
                areaTree.showQueryAreaTree();
            });
        });
    },
    onHtmlDownForQuery: function () {
        if (
            !(
                event.target.id == "formQuery-area" ||
                event.target.id == "q-tree" ||
                event.target.id == "q-tree-wrap" ||
                $(event.target).parents("#q-tree").length > 0
            )
        ) {
            areaTree.hideQueryAreaTree();
        }
    },
    showQueryAreaTree: function () {
        var $iptObj = $("#formQuery-area");
        var iptOffset = $iptObj.offset();
        var iptWidth = $iptObj.width();
        $("#q-tree-wrap")
            .css({
                left: iptOffset.left + "px",
                top: iptOffset.top + $iptObj.outerHeight() + "px",
                "min-width": iptWidth + 24 + "px",
            })
            .slideDown("fast");
        $("html").bind("mousedown", areaTree.onHtmlDownForQuery);
    },
    hideQueryAreaTree: function () {
        $("#q-tree-wrap").fadeOut("fast");
        $("html").unbind("mousedown", areaTree.onHtmlDownForQuery);
    },
};
function onQueryAreaTreeCheck() {
    var nodes = areaTree.queryTree.getCheckedNodes(true);
    var v = "";
    for (var i = 0; i < nodes.length; i++) {
        v += nodes[i].name + ",";
    }
    if (v.length > 0) v = v.substring(0, v.length - 1);
    $("#formQuery-area").val(v);
}
function onOptAreaTreeCheck() {
    var nodes = areaTree.optTree.getCheckedNodes(true);
    if (nodes.length > 0) {
        $("#formOpt-patrolmanId").empty();
        $.get(
            "../patrolman/listByAreaId",
            { areaId: nodes[0].id },
            function (data) {
                var ops = '<option value=""></option>';
                for (var i = 0; i < data.length; i++) {
                    ops =
                        ops +
                        '<option value="' +
                        data[i].id +
                        '">' +
                        data[i].name +
                        "</option>";
                }
                $("#formOpt-patrolmanId").html(ops);
            }
        );
    }
}
var deviceOpt = {
    queryParams: {},
    privilege: { update: false, add: false },
    URL: {
        query: "../device/get-ajax",
        update: "../device/update",
        add: "../device/store",
    },
    optType: 0,
    init: function (update, add) {
        deviceOpt.privilege.update = update;
        deviceOpt.privilege.add = add;
        deviceOpt.initTable();
        $("#s-line").select2();
        $("#btn-query").click(function () {
            deviceOpt.query();
        });

        $("#btn-add-ui").click(function () {
            deviceOpt.addUI();
        });
        $("#btn-save").click(function () {
            deviceOpt.save();
        });
        $("#btn-setting").click(function () {
            deviceOpt.setting();
        });
    },
    $deviceTable: null,
    initTable: function () {
        deviceOpt.$deviceTable = $("#deviceTable");
        deviceOpt.$deviceTable.bootstrapTable({
            contentType: "application/x-www-form-urlencoded",
            method: "get",
            classes: "table table-hover table-striped table-condensed",
            idField: "id",
            uniqueId: "id",
            pagination: true,
            pageSize: 15,
            pageList: [15, 25, 50, 100],
            sidePagination: "server",
            url: deviceOpt.URL.query,
            queryParams: function (params) {
                return $.extend({}, params, deviceOpt.queryParams);
            },
            columns: [
                {
                    field: "",
                    width: 40,
                    align: "center",
                    formatter: function (value, row, index) {
                        var options =
                            deviceOpt.$deviceTable.bootstrapTable("getOptions");
                        return (
                            (options.pageNumber - 1) * options.pageSize +
                            (index + 1)
                        );
                    },
                },
                { field: "name", title: language.device.name, sortable: true },
                {
                    field: "device_number",
                    title: language.device.code,
                    sortable: true,
                },
                {
                    field: "add_checkpoint",
                    title: language.device.addCheckpoint.name,
                    sortable: true,
                    formatter: function (value, row, index) {
                        if (row.mode == "collect record") {
                            return language.device.addCheckpoint.checkpoint;
                        } else if (row.mode == "collect checkpoint") {
                            return language.device.addCheckpoint.patrolman;
                        } else {
                            return language.device.addCheckpoint.normal;
                        }
                    },
                },
                {
                    field: "area_id",
                    title: language.common.area,
                    sortable: true,
                    formatter: function (value, row, index) {
                        return row.organization;
                    },
                },
                {
                    field: "patrolman_id",
                    title: language.device.owner,
                    sortable: true,
                    formatter: function (value, row, index) {
                        return row.patrolmanName;
                    },
                },
                {
                    field: "lastReadTime",
                    title: language.device.lastReadTime,
                    formatter: function (value, row, index) {
                        if (row.last_scanTime) {
                            var now = new Date();
                            now.setMonth(now.getMonth() - 3);
                            // return row.last_scanTime;
                            if (row.last_scanTime <= now.getTime()) {
                                return (
                                    "<label class='label label-danger'>" +
                                    new Date(row.last_scanTime).Format(
                                        "yyyy-MM-dd HH:mm:ss"
                                    ) +
                                    "</label>"
                                );
                            }
                            return new Date(row.lastReadTime).Format(
                                "yyyy-MM-dd HH:mm:ss"
                            );
                        }
                        return "/";
                    },
                },
                {
                    field: "ele",
                    title: language.device.ele,
                    formatter: function (value, row, index) {
                        if (!row.ele) {
                            return "";
                        }
                        if (row.ele >= 4.3) {
                            return "";
                        } else if (row.ele >= 4.2) {
                            return "100%";
                        } else if (row.ele >= 3.97) {
                            return "90%";
                        } else if (row.ele >= 3.87) {
                            return "80%";
                        } else if (row.ele >= 3.79) {
                            return "70%";
                        } else if (row.ele >= 3.73) {
                            return "60%";
                        } else if (row.ele >= 3.68) {
                            return "50%";
                        } else if (row.ele >= 3.65) {
                            return "40%";
                        } else if (row.ele >= 3.62) {
                            return "30%";
                        } else if (row.ele >= 3.58) {
                            return "20%";
                        } else if (row.ele >= 3.51) {
                            return "10%";
                        }
                        return "0%";
                    },
                },
                { field: "description", title: language.common.descripton },
                {
                    field: "opt",
                    title: language.common.operation,
                    events: operateEvents,
                    cellStyle: textNowrap,
                    formatter: function (value, row, index) {
                        var result = [];
                        if (deviceOpt.privilege.update) {
                            result.push(
                                '<a class="update" href="javascript:void(0)"><i class="fa fa-edit"></i>' +
                                    language.common.update +
                                    "</a>  "
                            );
                            if (row.model == 2 || row.model == 3) {
                                result.push(
                                    '<a class="setting" href="javascript:void(0)"><i class="fa fa-cog"></i>' +
                                        language.common.setting +
                                        "</a>  "
                                );
                                result.push(
                                    '<a class="refresh-setting" href="javascript:void(0)"><i class="fa fa-refresh"></i>' +
                                        language.common.refreshSetting +
                                        "</a>  "
                                );
                            }
                        }
                        return result.join("");
                    },
                },
            ],
            onLoadError: function (status, res) {
                if (res.status == 601) {
                    window.location.href = "../";
                }
            },
        });
    },
    query: function () {
        var search = formQuery.search.value;
        var nodes = areaTree.queryTree.getCheckedNodes(true);
        var areaIds = [];
        if (nodes.length > 0) {
            for (var i = 0; i < nodes.length; i++) {
                areaIds.push(nodes[i].id);
            }
        }
        deviceOpt.queryParams.areaIds = areaIds;
        deviceOpt.queryParams.search = search;
        deviceOpt.$deviceTable.bootstrapTable("refresh", {
            url: deviceOpt.URL.query,
        });
    },
    updateUI: function (row) {
        deviceOpt.optType = 1;
        $("#modal-device .modal-title").html(language.device.modifyReader);
        formOpt.id.value = row.id;
        formOpt.name.value = row.name;
        formOpt.device_number.value = row.device_number;
        formOpt.description.value = row.description;
        formOpt.addCheckpoint.value = row.mode;
        var node = areaTree.optTree.getNodeByParam(
            "id",
            row.organization_id,
            null
        );
        if (node) {
            areaTree.optTree.checkNode(node, true, false);
            $("#formOpt-patrolmanId").empty();
            $.get(
                "../patrolman/listByAreaId",
                {
                    areaId: row.organization_id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                function (data) {
                    var ops = '<option value=""></option>';
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].id == row.patrolmanId) {
                            ops =
                                ops +
                                '<option value="' +
                                data[i].id +
                                '" selected>' +
                                data[i].name +
                                "</option>";
                        } else {
                            ops =
                                ops +
                                '<option value="' +
                                data[i].id +
                                '">' +
                                data[i].name +
                                "</option>";
                        }
                    }
                    $("#formOpt-patrolmanId").html(ops);
                }
            );
        }
        $("#modal-device").modal("show");
    },
    update: function () {
        var name = formOpt.name.value;
        if ($.trim(name) == "") {
            toastr.error(language.device.error.name);
            return;
        }
        var nodes = areaTree.optTree.getCheckedNodes(true);
        var areaId = "";
        if (nodes.length > 0) {
            areaId = nodes[0].id;
        }
        if (areaId == "") {
            toastr.error(language.device.error.area);
            return;
        }
        var description = formOpt.description.value;
        var patrolmanId = formOpt.patrolmanId.value;
        var addCheckpoint = formOpt.addCheckpoint.value;
        var id = formOpt.id.value;
        MaskUtil.mask(language.common.tip.updating);
        $.ajax({
            url: deviceOpt.URL.update,
            method: "post",
            data: {
                id,
                name,
                addCheckpoint,
                areaId,
                description,
                patrolmanId,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                if (data.success) {
                    deviceOpt.$deviceTable.bootstrapTable("refresh");
                    $("#modal-device").modal("hide");
                    toastr.success(language.common.tip.updated);
                }
            },
            error(xml, status, err) {
                toastr.error(err);
            },
        });
    },
    addUI: function () {
        deviceOpt.optType = 0;
        $("#modal-device .modal-title").html(language.device.modifyReader);
        formOpt.id.value = "";
        formOpt.name.value = "";
        formOpt.device_number.value = "";
        formOpt.description.value = "";
        formOpt.addCheckpoint.value = "";
        // var nodes = areaTree.optTree.getCheckedNodes(true);
        // var areaId = "";
        // if (nodes.length > 0) {
        //     areaId = nodes[0].id;
        // }
        // if (!areaId) {
        //     toastr.error(language.user.error.area);
        //     return;
        // }
        // console.log(areaId);

        // areaTree.optTree.checkNode(node, true, false);
        $("#formOpt-patrolmanId").empty();
        $("#device_number").attr("disabled", false);
        // $.get("../patrolman/listByAreaId", { areaId: areaId }, function (data) {
        //     var ops = '<option value=""></option>';
        //     for (var i = 0; i < data.length; i++) {
        //         ops =
        //             ops +
        //             `<option value="${data[i].id}">
        //                     ${data[i].name}</option>`;
        //     }
        //     $("#formOpt-patrolmanId").html(ops);
        // });
        $("#modal-device").modal("show");
    },
    add: function () {
        var name = formOpt.name.value;
        if ($.trim(name) == "") {
            toastr.error(language.device.error.name);
            return;
        }
        var nodes = areaTree.optTree.getCheckedNodes(true);
        var areaId = "";
        if (nodes.length > 0) {
            areaId = nodes[0].id;
        }
        if (areaId == "") {
            toastr.error(language.device.error.area);
            return;
        }
        var description = formOpt.description.value;
        var patrolmanId = formOpt.patrolmanId.value;
        var device_number = formOpt.device_number.value;
        var addCheckpoint = formOpt.addCheckpoint.value;
        // var id = formOpt.id.value;
        MaskUtil.mask(language.common.tip.updating);
        $.ajax({
            url: deviceOpt.URL.add,
            method: "post",
            data: {
                name,
                addCheckpoint,
                areaId,
                description,
                device_number,
                patrolmanId,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {
                if (data.success) {
                    deviceOpt.$deviceTable.bootstrapTable("refresh");
                    $("#modal-device").modal("hide");
                    toastr.success(language.common.tip.updated);
                }
            },
            error(xml, status, err) {
                toastr.error(err);
            },
        });
    },
    save: function () {
        // deviceOpt.update();
        if (deviceOpt.optType == 0) {
            deviceOpt.add();
        } else {
            deviceOpt.update();
        }
    },
    settingUI: function (row) {
        formScreen.id.value = row.id;
        formScreen.beep.value = row.beep;
        formScreen.clockGroupId.value = row.clockGroupId;
        $("#s-line").val([]).trigger("change");
        if (row.deviceLines && row.deviceLines.length > 0) {
            var lineIds = [];
            for (var i = 0; i < row.deviceLines.length; i++) {
                lineIds.push(row.deviceLines[i].lineId);
            }
            $("#s-line").val(lineIds).trigger("change");
        }
        $("#modal-setting").modal("show");
    },
    setting: function (row) {
        var id = formScreen.id.value;
        var beep = formScreen.beep.value;
        var clockGroupId = formScreen.clockGroupId.value;
        var lineIds = $("#s-line").val();
        $.post(
            "../device/deviecSetting",
            {
                id,
                beep,
                clockGroupId,
                lineIds: JSON.stringify(lineIds),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            function (data) {
                if (data.success) {
                    $("#modal-setting").modal("hide");
                    deviceOpt.$deviceTable.bootstrapTable("refresh");
                    toastr.success(language.common.tip.saved);
                } else {
                    toastr.error(data.errorMsg);
                }
            }
        );
    },
    refreshSetting: function (row) {
        if (confirm(language.device.tip.refreshSetting)) {
            $.post(
                "../device/refreshSetting",
                {
                    id: row.id,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                function (data) {
                    if (data.success) {
                        toastr.success(language.common.tip.saved);
                    } else {
                        toastr.error(data.errorMsg);
                    }
                }
            );
        }
    },
};
window.operateEvents = {
    "click .update": function (e, value, row, index) {
        deviceOpt.updateUI(row);
    },
    "click .setting": function (e, value, row, index) {
        deviceOpt.settingUI(row);
    },
    "click .refresh-setting": function (e, value, row, index) {
        deviceOpt.refreshSetting(row);
    },
};
