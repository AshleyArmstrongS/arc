<style>
body {
  overflow: hidden;
}


.card {
  background-color: white;
  height:50px;
  opacity: 0.95;
  margin:0;
  padding:0;
  border-radius: 0;
}

/* .card:nth-child(odd){
  background-color: #d9c3fa;
}

.card:nth-child(even){
  background-color: lightgray;
} */

p {
  color: #0000FF;
  text-decoration: none;
  opacity: 0.55;
  margin:0;
  padding:0;
}

p:hover {
  
  background-color: whitesmoke;
  color: blue;
  opacity: 1;
}

#wrapper {
  background: #FFF;
  margin:0;
  padding:0;
}

#chatbox {
  font: 12px Helvetica;
  background: #FFF;
  text-align: left;
  overflow-y: scroll;
  max-height: 500px;
  margin:0;
  padding:0;
}

.card-body{
margin-top: 20px;
margin-bottom: auto;
background-color:#8DCAFF;
border: 2px solid rgb(95, 88, 88);
padding-top:10px;
padding-bottom:20px;
padding-left: 20px;
padding-right: 20px;
box-shadow: 5px 10px 8px slategray; 
}



</style>


  <div class="card-body">
    <h1>Inbox</h1>
 
  <div class="col-sm-10">
    <span>Click on message to open chat!</span>
  </div>
  <div id="wrapper">
    
    <div id="chatbox" class="card-col">

      <?php foreach ($locals['message_info'] as $message) {

        if ($message['message'] !== NULL) { ?>

      <?php
        if (strtotime($message['time_sent']) <= time() - (60 * 60 * 24)) {
          $regEx = '/(\d{4})-(\d{2})-(\d{2}) /';
          preg_match($regEx, $message['time_sent'], $result);
        } else {
          $regEx = '/ (\d{2}):(\d{2})/';
          preg_match($regEx, $message['time_sent'], $result);
        }
        ?>
        <div class="card">
     <p> <a href='<?= SITE_BASE_DIR ?>/message?to_id=<?= $message['group_id']; ?>'>
        
          <i style="font-weight:bold; color:black;"><?= $message['name']; ?>: </i>
          <?= $message['message']; ?>
          <br>
          <i style="color: black; font-weight: bold;" >(<?= $result[0]; ?>)</i>
        
      </p>
      </div>


      <?php }
      } ?>

    </div>
    </div>
  </div>  
