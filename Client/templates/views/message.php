<div class="container">
	<div class="row">
  		<div class="col-sm-10"><h1>Inbox</h1></div>
  </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
          <!-- <ul class="list-group">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> Joseph Doe</li>
            
          </ul>  -->
               
          <!-- <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootply.com">bootply.com</a></div>
          </div> -->
          
          
          <!-- <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul>  -->
               
          <!-- <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div> -->
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
          
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#message" data-toggle="tab">Messages</a></li>
            <li><a href="#lifts" data-toggle="tab">Scheduled Lifts</a></li>
          </ul>
              
          <!--/tab-pane-->
             <div class="tab-pane" id="message">
               
               <h2></h2>
               <?php $messages->getMessageID(); // fix here as the model is not done and i need to enter all messages here?>
               <ul class="list-group">
                  <li class="list-group-item text-muted">Inbox</li>
									
									<tbody id="items">
										<?php foreach ($locals['messages'] as $messages) { ?>
											<li class="list-group-item text-right"><a href="#" class="pull-left">Message goes here</a> <!-- Maybe insert date here --></li>
										<?php } ?>
									</tbody>
									<!-- 
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li> -->
                  
                </ul> 
							 
             </div><!--/tab-pane-->
             <div class="tab-pane" id="lifts">
            		<!-- store the number of lifts and have lift id between user and car to get driver of car -->
						 <ul class="list-group">
                  <li class="list-group-item text-muted">Inbox</li>
									<li class="list-group-item text-right"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert day here --></li>
									<li class="list-group-item text-right"><a href="#" class="pull-left">lifts goes here</a> <!-- Maybe insert the timetable here --></li>
                </ul> 

              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
