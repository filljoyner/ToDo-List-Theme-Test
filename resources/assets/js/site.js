jQuery('document').ready(function($) {

    $(document).on('click', 'a[data-delete]', function(evt) {
        evt.preventDefault();

        let href = $(this).attr('href');
        let id = $(this).data('delete');

        $.post(href, {'id': id}, function(data) {
            location.reload();
        });
    });


    $(document).on('change', '.todo_list_items_status input[type=checkbox]', function(evt) {
        let form = $(this).parents('form');
        let href = form.attr('action');
        let todo_list_id = form.children('input[name=todo_list_id]').first().val();
        let item_key = $(this).val();
        let checked = this.checked;

        todo_list_indicator_show(todo_list_id);

        $.post(href, {
            'todo_list_id': todo_list_id,
            'item_key': item_key,
            'checked': checked
        }, function() {
            todo_list_indicator_hide(todo_list_id);
        })
    });


    $(document).on('submit', '.add_todo_item', function(evt) {
        evt.preventDefault();

        let href = $(this).attr('action');
        let todo_list_id = $(this).children('input[name=todo_list_id]').val();
        let item_title = $(this).find('.input-group input[name=item_title]').val();

        $(this).find('.input-group input[name=item_title]').val('');

        todo_list_indicator_show(todo_list_id);

        $.post(href, {
            'todo_list_id': todo_list_id,
            'item_title': item_title
        }, function(data) {
            $('#todo_list_' + todo_list_id + ' .todo_list_items').html(data);
            todo_list_indicator_hide(todo_list_id);
        });
    });


    function todo_list_indicator_show(list_id)
    {
        $('#todo_list_' + list_id + ' .indicator').removeClass('d-none');
    }

    function todo_list_indicator_hide(list_id)
    {
        $('#todo_list_' + list_id + ' .indicator').addClass('d-none');
    }

});