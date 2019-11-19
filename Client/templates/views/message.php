<style>
#messages {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#messages td, #messages th {
  border: 1px solid #ddd;
  padding: 8px;
}

#messages tr{background-color: #f2f2f2;}

/* #messages tr:hover {background-color: #ddd;} */

#messages th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

#message {
    color: blue;
}
</style>


<h1>Messages</h1>

<table id="messages">
    <tr>
        <th>Name</th>
        <th>Message</th>
        <th>Time Sent</th>
    </tr>
    <?php foreach ($locals['messages_info'] as $message) { ?>
    <div class="row">  
    <tr>
        
        <?php
        if(strtotime($message['time_sent']) <= time() - (60*60*24)){
            $regEx = '/(\d{4})-(\d{2})-(\d{2}) /';
            preg_match($regEx, $message['time_sent'], $result);
        }
        else{
            $regEx = '/ (\d{2}):(\d{2})/';
            preg_match($regEx, $message['time_sent'], $result);
        } 
        ?>

        <td><div><?= $message['name']; ?></div></td>
        <td id=message><div><?= $message['message']; ?></div></td>
        <td><div><?= $result[0]; ?></div></td>
    </tr>
    <?php } ?>  
</table>