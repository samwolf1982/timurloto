<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.

if ( $_POST['payload'] ) {
    //shell_exec( ‘cd /var/www/drupalsites/git-repo/ && git reset –hard HEAD && git pull’ );

}
 echo "<pre>".shell_exec( "cd /home/lookmybe/lookmybets.com/lbrepo/ && git reset –hard HEAD && git pull" )."</pre>";





?>hi2