
<!-- <script>
  //Reference - https://www.w3schools.com/howto/howto_js_tabs.asp
  function openInbox(evt, inboxBlock) {
  // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(inboxBlock).style.display = "block";
    evt.currentTarget.className += " active";
  }

  document.getElementById("defaultOpen").click();

</script> -->


<style>
/* https://stackoverflow.com/questions/41674548/how-to-make-html-table-columns-resizable/41675248 */
 /* table {
  border-collapse: collapse;
  border-spacing: 0px;
}
td {
  border: 2px solid black;
  padding: 5px;
  margin: 5px;
  overflow: auto;
}


div {
  resize: both;
  overflow: auto;
  width: auto;
  height: auto;
  margin: 0px;
  padding: 0px;
  border: 1px solid black; 
  display:block;
}

td div {
  border: 0;
  width: auto;
  height: auto;
  border: 1px solid black;
  display:block;
}  */
p {
    margin:0;
    padding:0;
}

   
p:nth-child(even) {background:#F8F8FF}
p:nth-child(odd) {background:#E6E6FA} 
  

a {
    color:#0000FF;
    text-decoration:none; 
}
  
a:hover { 
    text-decoration:underline; 
}

#wrapper {
    margin:0 auto;
    padding:0px 25px 25px 25px;
    background:#FFF;
}

#chatbox {
  font:12px Helvetica;
  width: 90%;
  padding: 12px 20px;
  margin: 10px 10px;
  background: #F5FFFA;
  color: black;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
#top { 
    padding: 12.5px 25px 12.5px 25px; 
}

</style>

  <div class="container">
    <div class="col-sm-10"><h1>Inbox</h1></div>

  <!-- <div class="tab">
    <button class="tablinks" onclick="openInbox(event, 'Messages')" id="defaultOpen">Messages</button>
    <button class="tablinks" onclick="openInbox(event, 'Lifts')">Lifts</button>
  </div> -->

  <!-- Tab content -->
  <!-- <div id="Messages" class="tabcontent" class="active"> -->
  <div id="wrapper">
  <div class="top"></div>
    <div id="chatbox">
      
      <?php foreach ($locals['message_info'] as $message) { 
        if($message['message'] !== NULL){?>
        <div class="tableRow">  
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

          <i style="font-weight:bold; color:black;"><?= $message['name']; ?>: </i>
          
          <?= $message['message']; ?>
          <br>
          <a href='<?= SITE_BASE_DIR ?>/message?to_id= <?= $message['to_id']; ?>'>View Chat</a>
          <br>
          <i style="color: #B0C4DE">(<?= $result[0]; ?>)</i>


          </div>
      <?php }
    } ?>  
  </div>      
  <!-- </div> -->

  <!-- <div id="Lifts" class="tabcontent"> -->
    <!-- <ul class="list-group">
      <li class="list-group-item text-muted">Inbox</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a>  Maybe insert day here --></li>
      <!-- <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a>  Maybe insert the timetable here --></li>
    <!--</ul>
  </div>  
</div> -->