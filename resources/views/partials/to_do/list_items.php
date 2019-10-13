<?php foreach($list_items as $item_key => $item): ?>
    <div class="form-check">
        <input class="form-check-input"
               type="checkbox"
               id="todo_list_<?php echo $todo_list->ID; ?>_item_<?php echo $item_key; ?>"
               value="<?php echo $item_key; ?>"
            <?php if($item['checked'] === 'true') echo 'checked'; ?>
        >
        <label class="form-check-label" for="todo_list_<?php echo $todo_list->ID; ?>_item_<?php echo $item_key; ?>">
            <?php echo $item['title']; ?>
        </label>
    </div>
<?php endforeach; ?>