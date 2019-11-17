
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
    <h3>Messages</h3>

    <?php
      $counter = 0;
      if($locals['message_info'] > count($locals['user'])){
        $counter = $locals['message_info'];
      } else{
        $counter = $locals['user'];
      }
    ?>

    <table>
      <tr>
        <th>Name</th>
        <th>Message</th>
        <th>Time Sent</th>
      </tr>
      <?php for ($index = 0 ; $index < count($counter); $index ++) { ?>
        <div class="row">  
        <tr>
          <td><div><?= $locals['user'][$index]->getName(); ?></div></td>
          <td><div><a href="#" class="pull-left"><?= $locals['message_info'][$index]->getMessage() ?></a></div></td>
          <td><div><?= $locals['message_info'][$index]->getTime_sent() ?></div></td>
        </tr>
      <?php } ?>  
    </table>       
          
      
    <!-- </ul> -->
  </div>

  <div id="Lifts" class="tabcontent">
    <h3>Lifts</h3>
    <ul class="list-group">
      <li class="list-group-item text-muted">Inbox</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert day here --></li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert the timetable here --></li>
    </ul>
  </div>
</div>