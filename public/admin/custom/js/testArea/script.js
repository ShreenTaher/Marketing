var table = $('#m_table_testArea');
// begin first table
table.DataTable({
    language: {
        aria: {
            sortAscending: ": ترتيب تصاعدى",
            sortDescending: ": ترتيب تنازلى"
        },
        emptyTable: "لا توجد اى بيانات متاحه",
        info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
        infoEmpty: "لا توجد حقول",
        infoFiltered: "( الإجمالى _MAX_ حقل )",
        lengthMenu: "عدد الحقول : _MENU_",
        search: " بحث بإسم المستخدم :",
        zeroRecords: "لا توجد نتائج "
    },
    responsive: true,
    order: [[0, "desc"]],
    lengthMenu: [[10, 20, 30, 50, -1], [10, 20, 30, 50, "الكل"]],
    pageLength: 10,
    columnDefs: [{ "targets": [0,2,3,4], "searchable": false },{ "targets": [4], "orderable": false }]
});
