
<?php foreach ($locals['user'] as $user) {  ?>
            
  <li class="list-group-item text-right"><a href="#" class="pull-left"></a> <?php // print_r($user); ?>
    <?php foreach ($user as $messages) { ?>      
       <?php print_r($messages); ?>
    <?php } ?>    
  </li>

  
<?php } ?>
