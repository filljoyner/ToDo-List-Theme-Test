<div class="card mb-5" id="todo_list_<?php echo $todo_list->ID; ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <h5 class="card-title my-0">

                    <?php echo $todo_list->post_title; ?> &nbsp;

                    <small>
                        <a class="text-danger" href="<?php echo home_url() . '?type=todo_list&action=delete'; ?>" data-delete="<?php echo $todo_list->ID; ?>">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </small>
                </h5>
            </div>
            <div class="col-2 text-right text-primary">
                <small class="text-uppercase indicator d-none"><i class="fa fa-circle-notch fa-spin"></i> Saving</small>
            </div>
        </div>

        <hr>
        <form action="<?php echo home_url() . '?type=todo_list&action=update_item_status'; ?>" class="todo_list_items_status">
            <input type="hidden" name="todo_list_id" value="<?php echo $todo_list->ID; ?>" />

            <div class="todo_list_items">

                <?php if(!empty($list_items)): ?>

                    <?php partial('to_do/list_items', [
                        'todo_list' => $todo_list,
                        'list_items' => $list_items
                    ]); ?>

                <?php else: ?>

                    <p>There are no items in your to do list.</p>

                <?php endif; ?>
                
            </div><!-- /.todo_list_items -->

        </form>

        <hr>
        <form class="add_todo_item" action="<?php echo home_url() . '?type=todo_list&action=store_item'; ?>" method="post">
            <input type="hidden" name="todo_list_id" value="<?php echo $todo_list->ID; ?>" />

            <div class="input-group">
                <input type="text" class="form-control" name="item_title" />
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Add Item</button>
                </div><!-- /.input-group-append -->
            </div><!-- /.input-group -->
        </form>
    </div>
</div>