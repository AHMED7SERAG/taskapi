// {{--  home page dashborad datatable  --}}
    $(function() {
        //$.fn.dataTable.ext.errMode = 'none';
        /**
         * for datatable
         * */
        var currentColumns = [];
        // currentColumns.push({
        //     data: 'activate',
        //     name: 'activate',
        //     searchable: false,
        //     sortable: false,
        // });

        var thLen = $(".dashboardDatatable thead th").length;
        $(".dashboardDatatable thead th").each(function(index) {
            $(this).addClass("text-center align-middle");
            if (index >= 0 && index < thLen - 1) {
                var data = $(this).attr("dt-name");
                var col_type = $(this).attr("dt-type");
                if (col_type == "text") {
                    $("#searchable-row").append(
                        '<th class="text-center"><input type="text" class="text-center filter-table"/></th>'
                    );
                }
                if (col_type == "no_filter") {
                    $("#searchable-row").append('<th class="text-center"></th>');
                }
                if (col_type == "name") {
                    $("#searchable-row").append(
                        '<th class="text-center"><input type="text" class="text-center filter-table" style="width:130px"/></th>'
                    );
                }
                if (col_type == "date") {
                    $("#searchable-row").append(
                        `<th class="text-center"><input type="text" class="text-center filter-table date-range" style="width:100px"/></th>`
                    );
                }
                if (col_type == "select") {
                    var select_options = $(this).attr("dt-options");
                    if ($(this).attr("dt-enc") == "yes") {
                        var select_options = atob($(this).attr("dt-options"));
                    }
                    select_options = select_options.replace(/\'/g, '"');
                    let options = JSON.parse(select_options);
                    let th_select =
                        '<th class="text-center"><select dir="' +
                        lang +
                        '" type="text" class="select-custom text-center filter-table">';
                    th_select += '<option value=""></option>';
                    $.each(options, function(index, value) {
                        th_select += '<option value="' + index + '">';
                        th_select += value;
                        th_select += "</option>";
                    });

                    th_select += "</select></th>";
                    $("#searchable-row").append(th_select);
                    $(".select-custom").select2();
                }
                if (col_type == "forignkey") {
                    var select_options = $(this).attr("dt-options");
                    select_options = select_options.replace(/\'/g, '"');
                    let options = JSON.parse(select_options);
                    let th_select =
                        '<th class="text-center"><select dir="' +
                        lang +
                        '" type="text" class="select-custom text-center filter-table">';
                    th_select += '<option value=""></option>';
                    $.each(options, function(index, value) {
                        th_select += '<option value="' + index + '">';
                        th_select += value;
                        th_select += "</option>";
                    });

                    th_select += "</select></th>";
                    $("#searchable-row").append(th_select);
                    $(".select-custom").select2();
                }
                currentColumns.push({
                    data: data.toLowerCase(),
                    name: data.toLowerCase(),
                });
            } else {
                if (index == 0) {
                    $("#searchable-row").append(
                        '<th class="align-middle text-center"></th>'
                    );
                } else {
                    $("#searchable-row").append(
                        '<th class="align-middle text-center"><div style="width: 80px"></div></th>'
                    );
                }
            }
        });

        currentColumns.push({
            data: "actions",
            name: "actions",

            searchable: false,
            sortable: false,
        });
        // currentColumns.push({
        //     data: "files",
        //     name: "files",

        //     searchable: false,
        //     sortable: false,
        // });
        $(".dashboardDatatable").dataTable().fnDestroy();
        var table = $(".dashboardDatatable").DataTable({
            dom: "ltipr",
            serverSide: true,
            processing: false,
            paging: false,
            language: {
                url: dataTablesLanguageLink,
            },
            ajax: {
                url: dataTablesSearchLink,
                type: "GET",
            },
            columns: currentColumns,
            order: [],
            createdRow: function(row, data, dataIndex, cells) {
                $(cells).addClass("text-center align-middle");
            },
        }); //end datatable

        //search datatable
        table
            .columns()
            .eq(0)
            .each(function(colIdx) {
                $(".filter-table", table.column(colIdx).header()).on(
                    "keyup change apply.daterangepicker cancel.daterangepicker",
                    function(ev, picker) {
                        if ($(this).hasClass("date-range")) {
                            if (ev.type == "apply") {
                                $(this).val(
                                    picker.startDate.format("DD/MM/YYYY HH:mm:ss")
                                );
                            } else {
                                $(this).val("");
                            }
                        }
                        table.column(colIdx).search(this.value).draw();
                    }
                );
            });
    });
    $(function () {
        //$.fn.dataTable.ext.errMode = 'none';
        /**
         * for datatable
         * */
        var currentColumns2 = [];
        // currentColumns.push({
        //     data: 'activate',
        //     name: 'activate',
        //     searchable: false,
        //     sortable: false,
        // });

        var thLen = $(".documentFileTrackingDatatable thead th").length;
        $(".documentFileTrackingDatatable thead th").each(function (index) {
            $(this).addClass("text-center align-middle");
            if (index >= 0 && index < thLen - 1) {
                var data = $(this).attr("dt-name");
                var col_type = $(this).attr("dt-type");
                if (col_type == "text") {
                    $("#searchable-row2").append(
                        '<th class="text-center"><input type="text" class="text-center filter-table"/></th>'
                    );
                }
                if (col_type == "no_filter") {
                    $("#searchable-row2").append('<th class="text-center"></th>');
                }
                if (col_type == "name") {
                    $("#searchable-row2").append(
                        '<th class="text-center"><input type="text" class="text-center filter-table" style="width:130px"/></th>'
                    );
                }
                if (col_type == "date") {
                    $("#searchable-row2").append(
                        `<th class="text-center"><input type="text" class="text-center filter-table date-range" style="width:100px"/></th>`
                    );
                }
                if (col_type == "select") {
                    var select_options = $(this).attr("dt-options");
                    if ($(this).attr("dt-enc") == "yes") {
                        var select_options = atob($(this).attr("dt-options"));
                    }
                    select_options = select_options.replace(/\'/g, '"');
                    let options = JSON.parse(select_options);
                    let th_select =
                        '<th class="text-center"><select dir="' +
                        lang +
                        '" type="text" class="select-custom text-center filter-table">';
                    th_select += '<option value=""></option>';
                    $.each(options, function (index, value) {
                        th_select += '<option value="' + index + '">';
                        th_select += value;
                        th_select += "</option>";
                    });

                    th_select += "</select></th>";
                    $("#searchable-row2").append(th_select);
                    $(".select-custom").select2();
                }
                if (col_type == "forignkey") {
                    var select_options = $(this).attr("dt-options");
                    select_options = select_options.replace(/\'/g, '"');
                    let options = JSON.parse(select_options);
                    let th_select =
                        '<th class="text-center"><select dir="' +
                        lang +
                        '" type="text" class="select-custom text-center filter-table">';
                    th_select += '<option value=""></option>';
                    $.each(options, function (index, value) {
                        th_select += '<option value="' + index + '">';
                        th_select += value;
                        th_select += "</option>";
                    });

                    th_select += "</select></th>";
                    $("#searchable-row2").append(th_select);
                    $(".select-custom").select2();
                }
                currentColumns2.push({
                    data: data.toLowerCase(),
                    name: data.toLowerCase(),
                });
            } else {
                if (index == 0) {
                    $("#searchable-row2").append(
                        '<th class="align-middle text-center"></th>'
                    );
                } else {
                    $("#searchable-row2").append(
                        '<th class="align-middle text-center"><div style="width: 80px"></div></th>'
                    );
                }
            }
        });

        currentColumns2.push({
            data: "actions",
            name: "actions",

            searchable: false,
            sortable: false,
        });
        // currentColumns.push({
        //     data: "files",
        //     name: "files",

        //     searchable: false,
        //     sortable: false,
        // });
        $(".documentFileTrackingDatatable").dataTable().fnDestroy();
        var table = $(".documentFileTrackingDatatable").DataTable({
            dom: "ltipr",
            serverSide: true,
            processing: false,
            ordering: false,
            info: false,
            bFilter: false,
            language: {
                url: dataTablesLanguageLink,
            },
            ajax: {
                url: dataTablesSearchLink2,
                type: "GET",
            },
            columns: currentColumns2,
            order: [],
            createdRow: function (row, data, dataIndex, cells) {
                $(cells).addClass("text-center align-middle");
            },
        }); //end datatable

        //search datatable
        table
            .columns()
            .eq(0)
            .each(function (colIdx) {
                $(".filter-table", table.column(colIdx).header()).on(
                    "keyup change apply.daterangepicker cancel.daterangepicker",
                    function (ev, picker) {
                        if ($(this).hasClass("date-range")) {
                            if (ev.type == "apply") {
                                $(this).val(
                                    picker.startDate.format("DD/MM/YYYY HH:mm:ss")
                                );
                            } else {
                                $(this).val("");
                            }
                        }
                        table.column(colIdx).search(this.value).draw();
                    }
                );
            });
    });
    $(function () {
        //$.fn.dataTable.ext.errMode = 'none';
        /**
         * for datatable
         * */
        var currentColumns = [];
        // currentColumns.push({
        //     data: 'activate',
        //     name: 'activate',
        //     searchable: false,
        //     sortable: false,
        // });

        var thLen = $(".documentFileDatatable thead th").length;
        $(".documentFileDatatable thead th").each(function (index) {
            $(this).addClass("text-center align-middle");
            if (index >= 0 && index < thLen - 1) {
                var data = $(this).attr("dt-name");
                var col_type = $(this).attr("dt-type");
                if (col_type == "text") {
                    $("#searchable-row").append(
                        '<th class="text-center"><input type="text" class="text-center filter-table"/></th>'
                    );
                }
                if (col_type == "no_filter") {
                    $("#searchable-row").append('<th class="text-center"></th>');
                }
                if (col_type == "name") {
                    $("#searchable-row").append(
                        '<th class="text-center"><input type="text" class="text-center filter-table" style="width:130px"/></th>'
                    );
                }
                if (col_type == "date") {
                    $("#searchable-row").append(
                        `<th class="text-center"><input type="text" class="text-center filter-table date-range" style="width:100px"/></th>`
                    );
                }
                if (col_type == "select") {
                    var select_options = $(this).attr("dt-options");
                    if ($(this).attr("dt-enc") == "yes") {
                        var select_options = atob($(this).attr("dt-options"));
                    }
                    select_options = select_options.replace(/\'/g, '"');
                    let options = JSON.parse(select_options);
                    let th_select =
                        '<th class="text-center"><select dir="' +
                        lang +
                        '" type="text" class="select-custom text-center filter-table">';
                    th_select += '<option value=""></option>';
                    $.each(options, function (index, value) {
                        th_select += '<option value="' + index + '">';
                        th_select += value;
                        th_select += "</option>";
                    });

                    th_select += "</select></th>";
                    $("#searchable-row").append(th_select);
                    $(".select-custom").select2();
                }
                if (col_type == "forignkey") {
                    var select_options = $(this).attr("dt-options");
                    select_options = select_options.replace(/\'/g, '"');
                    let options = JSON.parse(select_options);
                    let th_select =
                        '<th class="text-center"><select dir="' +
                        lang +
                        '" type="text" class="select-custom text-center filter-table">';
                    th_select += '<option value=""></option>';
                    $.each(options, function (index, value) {
                        th_select += '<option value="' + index + '">';
                        th_select += value;
                        th_select += "</option>";
                    });

                    th_select += "</select></th>";
                    $("#searchable-row").append(th_select);
                    $(".select-custom").select2();
                }
                currentColumns.push({
                    data: data.toLowerCase(),
                    name: data.toLowerCase(),
                });
            } else {
                if (index == 0) {
                    $("#searchable-row").append(
                        '<th class="align-middle text-center"></th>'
                    );
                } else {
                    $("#searchable-row").append(
                        '<th class="align-middle text-center"><div style="width: 80px"></div></th>'
                    );
                }
            }
        });

        currentColumns.push({
            data: "actions",
            name: "actions",

            searchable: false,
            sortable: false,
        });
        // currentColumns.push({
        //     data: "files",
        //     name: "files",

        //     searchable: false,
        //     sortable: false,
        // });
        $(".documentFileDatatable").dataTable().fnDestroy();
        var table = $(".documentFileDatatable").DataTable({
            dom: "ltipr",
            serverSide: true,
            processing: false,
            paging:false,
            ordering: false,
            info: false,
            language: {
                url: dataTablesLanguageLink,
            },
            ajax: {
                url: dataTablesSearchLink,
                type: "GET",
            },
            columns: currentColumns,
            order: [],
            createdRow: function (row, data, dataIndex, cells) {
                $(cells).addClass("text-center align-middle");
            },
        }); //end datatable

        //search datatable
        table
            .columns()
            .eq(0)
            .each(function (colIdx) {
                $(".filter-table", table.column(colIdx).header()).on(
                    "keyup change apply.daterangepicker cancel.daterangepicker",
                    function (ev, picker) {
                        if ($(this).hasClass("date-range")) {
                            if (ev.type == "apply") {
                                $(this).val(
                                    picker.startDate.format("DD/MM/YYYY HH:mm:ss")
                                );
                            } else {
                                $(this).val("");
                            }
                        }
                        table.column(colIdx).search(this.value).draw();
                    }
                );
            });
    });
