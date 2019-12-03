<style>
  body {}

  p {
    margin: 0;
    padding: 0;
  }


  p:nth-child(even) {
    background: #F8F8FF
  }

  p:nth-child(odd) {
    background: #E6E6FA
  }

  input {
    font: 12px arial;
    margin: 8px 8px;
  }

  #group_id {
    background: #B0C4DE;
    color: #fff;
    padding: 10px 8px;
    border: 1px solid;
    border-radius: 5px;
    text-shadow: none;
  }

  #group_id:hover {
    background: #016ABC;
    color: #fff;
    border: 1px solid;
    border-radius: 6px;
    text-shadow: none;
  }

  a {
    color: #0000FF;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  #wrapper,
  #loginform {
    margin: 0 auto;
    padding: 0px 25px 25px 25px;
    background: #FFF;
    /* width:504px; */
    /* border:1px solid #ACD8F0;  */
  }

  #chatbox {
    text-align: left;
    margin: 5px 5px;
    margin-bottom: 25px;
    /* padding:10px; */
    background: #fff;
    /* height:400px;
    width:430px; */
    border: 1px solid #ACD8F0;
    overflow-y: scroll;
    max-height: 400px;
  }

  #message {
    /* width: 370px; */
    font: 12px Helvetica;
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
  <h3 style="margin:0; padding:0;">Messages</h3>
  <div id="wrapper">
    <div id="top"></div>
    <?php
    $passenger_id;
     foreach ($locals['users'] as $user) { 
       $passenger_id = $user['user_id'];
       ?>
      <p><?= $user['name'] ?></p>
    <?php } ?>
    <div id="chatbox">
      <?php $group_id = $locals['group_id'];
      foreach ($locals['messages'] as $message) {
        if (strtotime($message['time_sent']) <= time() - (60 * 60 * 24)) {
          $regEx = '/(\d{4})-(\d{2})-(\d{2}) /';
          preg_match($regEx, $message['time_sent'], $result);
        } else {
          $regEx = '/(\d{2}):(\d{2})/';
          preg_match($regEx, $message['time_sent'], $result);
        } ?>
        <p>
          <i style="font-weight:bold; color:black;"><?= $message['name']; ?>: </i>
          <br>
          <?= $message['message']; ?>
          <?php if ($_SESSION['Id'] === $message['from_id']) { ?>
            <a href="/arc/Client/removeMessage?message_id= <?= $message['message_id'] ?> &to_id= <?= $message['to_id']; ?>">Delete</a>
          <?php } ?>
          <br>
          <i style="color: #B0C4DE">(<?= $result[0]; ?>)</i>
        </p>
      <?php } ?>
    </div>
    <form id='login_form' action='' method='post'>
      <input type="text" name='message' id='message' placeholder="Enter message here...">
      <input type="submit" value='Submit'>
    </form action="" method="post">
    <div>
            <?php $isDriver = $locals['isDriver']; 
            if($isDriver['user_type'] === "D")
            { ?>
              <h3>Organise a lift</h3>
              <form action="createLift" method = "post">
              <input type="hidden" name= "driver_id" value = "<?= $_SESSION['Id'] ?>">
              <input type="hidden" name="passenger_id" value= "<?= $passenger_id ?>">
              <div class="form-group">
                        <label for="message-text" class="col-form-label">Day: </label><br />
                        <input type="checkbox" id="check_list" name="check_list" value="Monday"><label>Monday</label><br />
                        <input type="checkbox" id="check_list" name="check_list" value="Tuesday"><label>Tuesday</label><br />
                        <input type="checkbox" id="check_list" name="check_list" value="Wednesday"><label>Wednesday</label><br />
                        <input type="checkbox" id="check_list" name="check_list" value="Thursday"><label>Thursday</label><br />
                        <input type="checkbox" id="check_list" name="check_list" value="Friday"><label>Friday</label><br />
                    </div>
              <input type="submit" value="Submit" class="btn btn-dark btn-xs">

              </form>
            <?php }  ?>
    </div>
  </div>
</div>