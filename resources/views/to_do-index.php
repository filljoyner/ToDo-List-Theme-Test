<div class="row">
    <div class="col-12">
        <h1 class="display-4 my-4"><?php the_title(); ?></h1>
    </div><!-- /.col -->
</div><!-- /.row -->


<div class="row">
    <div class="col col-md-8">
        <?php if(!empty($todo_lists)): ?>

            <?php foreach($todo_lists as $todo_list): ?>
                <?php
                partial('to_do/list', [
                    'todo_list' => $todo_list,
                    'list_items' => todo_list($todo_list)->getItems()
                ]);
                ?>
            <?php endforeach; ?>

        <?php else: ?>

            <p>You currently do not have any to do lists.</p>

        <?php endif; ?>
    </div><!-- /.col -->


    <div class="col col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col col-7">
                        <h5 class="card-title">Create List</h5>
                    </div><!-- /.col -->
                    <div class="col col-5 text-right text-primary">
                        <small class="text-uppercase indicator d-none"><i class="fa fa-circle-notch fa-spin"></i> Saving</small>
                    </div><!-- /.col -->
                </div><!-- /.row -->


                <form action="<?php echo home_url(); ?>?type=todo_list&action=store" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="title" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Add List</button>
                        </div><!-- /.input-group-append -->
                    </div><!-- /.input-group -->
                </form>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col -->
</div><!-- /.row -->

