$(function(){
    $('a.list-group-item-action').on('click',function(){
        let page = $(this).data('page');
        load_table_ajax(page);

        $('a.list-group-item-action').removeClass('active');
        $(this).addClass('active');
    });
})
function load_table_ajax(table_load) {
    //console.log(table_load);
    $.ajax({
        url: 'page/' + table_load + '.php',
        type: "POST",
        data: { table_select: table_load },
        success: function (data) {
            $('#profile').html(data);
        },
        error: function (xhr, status, error) {
            console.error("Ошибка AJAX запроса:", status, error, xhr.responseText);
            alert("Ошибка при выполнении запроса: " + error);
        },
    });
}

