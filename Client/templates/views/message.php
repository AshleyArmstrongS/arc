<h1>messages</h1>

<?php 

foreach($locals['messages'] as $message)
{
    echo($message['message']);
    ?> <p></p> <?php
}

?>