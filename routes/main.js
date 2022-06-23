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
            check: { enable: true, chkStyle: "radio", radioType: "all" },
        },
    },
    url: "../area/loginAreaTree",
    treeObject: null,
    queryTreeObject: null,
    init: function () {
        $.post(areaTree.url, {}, function (data) {
            $.fn.zTree.init($("#q-tree"), areaTree.options.query, data);
            $.fn.zTree.init($("#opt-tree"), areaTree.options.opt, data);
            areaTree.queryTreeObject = $.fn.zTree.getZTreeObj("q-tree");
            areaTree.treeObj = $.fn.zTree.getZTreeObj("opt-tree");
            $("#formQuery-area").on("focus", function () {
                console.log("this is showquery area tree");
                areaTree.showQueryAreaTree();
            });
        });
    },
    onHtmlDownForQuery: function (e) {
        var event = e ? e : window.event;
        var obj = event.srcElement ? event.srcElement : event.target;
        if (
            !(
                obj.id == "formQuery-area" ||
                obj.id == "q-tree" ||
                obj.id == "q-tree-wrap" ||
                $(obj).parents("#q-tree").length > 0
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
    var treeObj = $.fn.zTree.getZTreeObj("q-tree");
    console.log(treeObj, "treeobj running");
    var nodes = treeObj.getCheckedNodes(true);
    var v = "";
    for (var i = 0; i < nodes.length; i++) {
        v += nodes[i].name + ",";
    }
    if (v.length > 0) v = v.substring(0, v.length - 1);
    $("#formQuery-area").val(v);
}
var userOpt = {
    privileges: {
        update: false,
        remove: false,
        resetPwd: false,
    },
    queryParams: {},
    $userTable: null,
    $rolesWrap: null,
    $userWrap: null,
    $userModal: null,
    init: function (update, remove, resetPwd) {
        userOpt.privileges.update = update;
        userOpt.privileges.remove = remove;
        userOpt.privileges.resetPwd = resetPwd;
        userOpt.initTable();
        userOpt.$userWrap = $("#user-wrap");
        userOpt.$rolesWrap = $("#role-wrap");
        userOpt.$userModal = $("#modal-user");
        $("#btn-query").click(function () {
            userOpt.query();
        });
        $("#btn-add-ui").click(function () {
            userOpt.addUI();
        });
        $("#form-type").change(function () {
            if (this.value == 0) {
                $("#role-wrap").show();
            } else {
                $("#role-wrap").hide();
            }
        });
        $("#btn-save").click(function () {
            if (userOpt.optType == 0) {
                userOpt.add();
            } else {
                userOpt.update();
            }
        });
        $("#btn-resetPwd").click(function () {
            userOpt.resetPwd();
        });
    },
    initTable: function () {
        userOpt.$userTable = $("#user-table");
        userOpt.$userTable.bootstrapTable({
            //åˆå§‹åŒ–ç”¨æˆ·æ•°æ®è¡¨æ ¼
            contentType: "application/x-www-form-urlencoded",
            method: "post",
            classes: "table table-hover table-striped table-condensed",
            idField: "id",
            uniqueId: "id",
            pagination: true,
            url: userOpt.url.query,
            pageSize: 15,
            pageList: [15, 25, 50, 100],
            sidePagination: "server",
            queryParams: function (params) {
                return $.extend({}, params, userOpt.queryParams);
            },
            columns: [
                {
                    field: "",
                    width: 40,
                    align: "center",
                    formatter: function (value, row, index) {
                        var options =
                            userOpt.$userTable.bootstrapTable("getOptions");
                        return (
                            (options.pageNumber - 1) * options.pageSize +
                            (index + 1)
                        );
                    },
                },
                {
                    field: "username",
                    title: language.user.username,
                    sortable: true,
                },
                {
                    field: "nickname",
                    title: language.user.nickname,
                    sortable: true,
                },
                {
                    field: "area_id",
                    title: language.common.area,
                    sortable: true,
                    formatter: function (value, row, index) {
                        return row.areaName;
                    },
                },
                {
                    field: "type",
                    title: language.common.type,
                    sortable: true,
                    formatter: function (value, row, index) {
                        if (row.type == 0) {
                            return language.common.admin;
                        } else {
                            return language.common.patrolman;
                        }
                    },
                },
                {
                    field: "roles",
                    title: language.common.role,
                    formatter: function (value, row, index) {
                        var roleNames = "";
                        if (row.roles && row.roles.length > 0) {
                            for (var i = 0; i < row.roles.length; i++) {
                                roleNames = roleNames + row.roles[i].name + ",";
                            }
                            if (roleNames.length > 0) {
                                roleNames = roleNames.substring(
                                    0,
                                    roleNames.length - 1
                                );
                            }
                        }
                        return roleNames;
                    },
                },
                {
                    field: "opt",
                    title: language.common.operation,
                    events: operateEvents,
                    cellStyle: textNowrap,
                    formatter: function (value, row, index) {
                        var result = [];
                        if (userOpt.privileges.update) {
                            result.push(
                                '<a class="update" href="javascript:void(0)"><i class="fa fa-edit"></i>' +
                                    language.common.update +
                                    "</a>&nbsp;&nbsp;"
                            );
                        }
                        if (userOpt.privileges.remove) {
                            result.push(
                                '<a class="delete" href="javascript:void(0)"> <i class="fa fa-remove"></i>' +
                                    language.common.remove +
                                    "</a>&nbsp;&nbsp;"
                            );
                        }
                        if (userOpt.privileges.resetPwd) {
                            result.push(
                                '<a class="resetPwd" href="javascript:void(0)"> <i class="fa fa-key"></i>' +
                                    language.common.resetPwd +
                                    "</a>"
                            );
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
    url: {
        query: "../user/query",
        add: "../user/add",
        get: "../user/get",
        update: "../user/update",
        del: "../user/remove",
        resetPwd: "../user/resetPwd",
    },
    query: function () {
        //æŸ¥çœ‹ç®¡ç†å‘˜
        var search = formQuery.search.value;
        userOpt.queryParams.search = search;
        var nodes = areaTree.queryTreeObject.getCheckedNodes(true);
        var areaIds = [];
        for (var i = 0; i < nodes.length; i++) {
            areaIds.push(nodes[i].id);
        }
        userOpt.queryParams.areaIds = areaIds;
        userOpt.$userTable.bootstrapTable("refresh", {
            url: userOpt.url.query,
        });
    },
    optType: 0, // 0 æ·»åŠ ç”¨æˆ·   1 ä¿®æ”¹ç”¨æˆ·
    addUI: function () {
        userOpt.optType = 0;
        userOpt.$userModal.find(".modal-title").html(language.user.addTitle);
        formOpt.id.value = "";
        formOpt.username.value = "";
        formOpt.nickname.value = "";
        formOpt.type.value = "0";
        formOpt.type.disabled = false;
        $("#role-wrap").show();
        userOpt.$userModal.modal("show");
    },
    add: function () {
        var username = formOpt.username.value;
        if (!isEmail(username)) {
            toastr.error(language.user.error.username);
            return;
        }
        var nickname = formOpt.nickname.value;
        if (!nickname) {
            toastr.error(language.user.error.nickname);
            return;
        }
        var nodes = areaTree.treeObj.getCheckedNodes(true);
        var areaId = "";
        if (nodes.length > 0) {
            areaId = nodes[0].id;
        }
        if (!areaId) {
            toastr.error(language.user.error.area);
            return;
        }
        var type = formOpt.type.value;
        var roleIds = $("#formOpt-roleIds").val();
        if (type == 0 && (!roleIds || roleIds.length <= 0)) {
            toastr.error(language.user.error.role);
            return;
        }
        MaskUtil.mask(language.common.tip.adding);
        $.ajax({
            url: userOpt.url.add,
            data: {
                username: username,
                nickname: nickname,
                areaId: areaId,
                type: type,
                roleIds: roleIds,
            },
            success: function (data) {
                if (data.result) {
                    userOpt.$userTable.bootstrapTable("refresh");
                    toastr.success(language.common.tip.added);
                    userOpt.$userModal.modal("hide");
                } else if (data["errorMsg"]) {
                    toastr.error(data["errorMsg"]);
                }
            },
        });
    },
    updateUI: function (user) {
        //æ›´æ–°ç®¡ç†UI
        userOpt.optType = 1;
        userOpt.$userModal.find(".modal-title").html(language.user.updateTitle);
        formOpt.id.value = user.id;
        formOpt.username.value = user["username"];
        formOpt.nickname.value = user["nickname"];
        formOpt.type.value = user["type"];
        formOpt.type.disabled = true;
        var node = areaTree.treeObj.getNodeByParam("id", user.areaId, null);
        if (node) {
            areaTree.treeObj.checkNode(node, true, false);
        }
        if (user.type == 0) {
            if (user["roles"] && user["roles"].length > 0) {
                var valIds = [];
                for (var i = 0; i < user["roles"].length; i++) {
                    valIds.push(user["roles"][i].id);
                }
                $("#formOpt-roleIds").selectpicker("val", valIds);
            }
            $("#role-wrap").show();
        } else {
            $("#role-wrap").hide();
        }
        userOpt.$userModal.modal("show");
    },
    update: function () {
        var username = formOpt.username.value;
        if (!isEmail(username)) {
            toastr.error(language.user.error.username);
            return;
        }
        var nickname = formOpt.nickname.value;
        if (!nickname) {
            toastr.error(language.user.error.nickname);
            return;
        }
        var nodes = areaTree.treeObj.getCheckedNodes(true);
        var areaId = "";
        if (nodes.length > 0) {
            areaId = nodes[0].id;
        }
        if (!areaId) {
            toastr.error(language.user.error.area);
            return;
        }
        var type = formOpt.type.value;
        var roleIds = $("#formOpt-roleIds").val();
        if (type == 0 && (!roleIds || roleIds.length <= 0)) {
            toastr.error(language.user.error.role);
            return;
        }
        MaskUtil.mask(language.common.tip.updating);
        $.ajax({
            url: userOpt.url.update,
            data: {
                id: formOpt.id.value,
                username: username,
                nickname: nickname,
                type: type,
                areaId: areaId,
                roleIds: roleIds,
            },
            success: function (data) {
                if (data.result) {
                    userOpt.$userTable.bootstrapTable("refresh");
                    toastr.success(language.common.tip.updated);
                    userOpt.$userModal.modal("hide");
                } else if (data["errorMsg"]) {
                    toastr.error(data["errorMsg"]);
                }
            },
        });
    },
    remove: function (id) {
        MaskUtil.mask(language.common.tip.removing);
        $.ajax({
            url: userOpt.url.del,
            data: { id: id },
            success: function (data) {
                if (data["result"]) {
                    userOpt.$userTable.bootstrapTable("refresh");
                    toastr.success(language.common.tip.removed);
                } else {
                    toastr.error(data["errorMsg"]);
                }
            },
        });
    },
    resetPwd: function () {
        //å¯†ç é‡ç½®
        var id = formResetPwd.id.value;
        var newPwd = formResetPwd.newPwd.value;
        var rePwd = formResetPwd.rePwd.value;
        if ($.trim(newPwd) == "" || newPwd.length < 6) {
            toastr.error(language.pwd.error.len);
            return;
        }
        if (newPwd != rePwd) {
            toastr.error(language.pwd.error.notSame);
            return;
        }
        MaskUtil.mask(language.common.tip.updating);
        $.ajax({
            url: "../user/resetPwd",
            data: {
                id: id,
                newPwd: newPwd,
                rePwd: rePwd,
            },
            success: function (data) {
                if (data.result) {
                    toastr.success(language.common.tip.updated);
                    $("#div-resetPwd").modal("hide");
                } else {
                    toastr.error(data["errorMsg"]);
                }
            },
        });
    },
};

window.operateEvents = {
    "click .update": function (e, value, row, index) {
        //æ›´æ–°
        userOpt.updateUI(row);
    },
    "click .delete": function (e, value, row, index) {
        if (confirm(language.common.tip.removeIf)) {
            userOpt.remove(row.id);
        }
    },
    "click .resetPwd": function (e, value, row, index) {
        //é‡ç½®å¯†ç 
        formResetPwd.id.value = row.id;
        formResetPwd.newPwd.value = "";
        formResetPwd.rePwd.value = "";
        $("#div-resetPwd").modal("show");
    },
};
