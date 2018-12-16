<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.
header('Content-Type: text/html; charset=utf-8');
if ( $_POST['payload'] ) {
    //shell_exec( ‘cd /var/www/drupalsites/git-repo/ && git reset –hard HEAD && git pull’ );

}


echo "<pre>".shell_exec( 'cd /home/lookmybe/lookmybets.com/lbrepo/  && git pull' )."</pre>";
var_dump(shell_exec('date'));







?>
be happy
