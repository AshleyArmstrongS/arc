
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
    <ul class="list-group">
      <li class="list-group-item text-muted">Inbox</li>

      <tbody id="items">
        <!-- <?php //foreach ($locals['messages'] as $messages) {?>
          <li class="list-group-item text-right"><a href="#" class="pull-left">Message goes here</a>  Maybe insert date here </li>
        <?php //}?> -->

          
      </tbody> 
      
      <!-- <li class="list-group-item text-left"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li> -->

    </ul>
  </div>

  <div id="Lifts" class="tabcontent">
    <h3>Lifts</h3>
    <ul class="list-group">
      <li class="list-group-item text-muted">Inbox</li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert day here --></li>
      <li class="list-group-item text-left"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert the timetable here --></li>
    </ul>
  </div>
