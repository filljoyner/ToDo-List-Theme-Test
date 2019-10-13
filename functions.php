<?php

/** Require WPM */

require_once __DIR__ . '/_wpm/wpm.php';

/** Import Config */
require_once __DIR__ . '/config/boot.php';


/** Load Packages */
package('wp-force-login');
package('bootstrap4');


/** Type and Action Routing */
if(!empty($_GET['type']) and !empty($_GET['action']) and get_current_user_id() and !is_admin()) {
    $type = $_GET['type'];
    $action = $_GET['action'];

    if($type == 'todo_list') {
        todo_list_requests($_POST)->action($action);
    }

    redirect(home_url());
}
