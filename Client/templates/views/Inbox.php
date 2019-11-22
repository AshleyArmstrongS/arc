
<script>
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

</script>


<style>
/* https://stackoverflow.com/questions/41674548/how-to-make-html-table-columns-resizable/41675248 */
table {
  border-collapse: collapse;
  border-spacing: 0px;
}
td {
  /* border: 2px solid black; */
  padding: 5px;
  margin: 5px;
  /* overflow: auto; */
}


div {
  resize: both;
  /* overflow: auto; */
  width: auto;
  height: auto;
  margin: 0px;
  padding: 0px;
  /* border: 1px solid black; */
  /* display:block; */
}

td div {
  border: 0;
  width: auto;
  height: auto;
  border: 1px solid black;
  display:block;
}
</style>

  <div class="container">
    <div class="row">
        <div class="col-sm-10"><h1>Inbox</h1></div>
    </div>
  <div class="tab">
    <button class="tablinks" onclick="openInbox(event, 'Messages')" id="defaultOpen">Messages</button>
    <button class="tablinks" onclick="openInbox(event, 'Lifts')">Lifts</button>
  </div>

  <!-- Tab content -->
  <div id="Messages" class="tabcontent" class="active">
    <table>
      <tr>
        <th>Name</th>
        <th>Message</th>
        <th>Time Sent</th>
      </tr>
      <?php foreach ($locals['message_info'] as $message) { ?>
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
          <td><div class="pull-left"><?= $message['message']; ?></div></td>
          <td><a href='<?= SITE_BASE_DIR ?>/message?to_id= <?= $message['to_id']; ?>'>View</a></td>
          <td><div><?= $result[0]; ?></div></td>
        </tr>
      <?php } ?>  
    </table>       
  </div>

  <div id="Lifts" class="tabcontent">
    <ul class="list-group">
      <li class="list-group-item text-muted">Inbox</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert day here --></li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert the timetable here --></li>
    </ul>
  </div>
</div>