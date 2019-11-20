<style>
/* #messages {
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
/* 
#messages th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

#message {
    color: blue;
}  */
</style>

<style>
/* Reference - https://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931 */
body {
    font:10px arial;
    color: #222;
    text-align:left;
    padding:35px; }
  
p {
    margin:0;
    padding:0; }
  
input { 
    font:12px arial; 

}
  
a {
    color:#0000FF;
    text-decoration:none; 
}
  
a:hover { 
    text-decoration:underline; 
}
  
#wrapper, #loginform {
    margin:0 auto;
    padding-bottom:25px;
    background:#EBF4FB;
    width:504px;
    border:1px solid #ACD8F0; 
}
  
#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:400px;
    width:430px;
    border:1px solid #ACD8F0;
    overflow:auto; 
}
  
#message {
    width: 370px;
    margin-left: 35px;
    border:1px solid #ACD8F0; 
}
  
#group_id { 
  width: 60px; 
}
  
#top { 
    padding: 12.5px 25px 12.5px 25px; 
}
  


</style>


<h1>Messages</h1>

  <div id="wrapper">
    <div id="top"></div>
     
      <div id="chatbox">
      
      <?php $group_id = $locals['group_id']; ?>
      <?php foreach ($locals['messages'] as $message) { ?>
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

          <p>
            (<?= $result[0]; ?>) 
            <i style="font-weight:bold; color:black;"><?= $message['name']; ?>: </i>
            <?= $message['message']; ?> 
            <?php  if($_SESSION['Id'] === $message['from_id']) { ?>
              <a href="/arc/Client/removeMessage?message_id= <?= $message['message_id'] ?>&to_id=<?= $message['to_id']; ?>">Delete</a>
            <?php } ?>
          </p>
      <?php } ?>
      </div>

      <form id='login_form' action='' method='post'>
        <input type="text" name='message' id='message' placeholder="Enter message here...">
        <input type="submit" name="group_id" id="group_id" value = 'Submit'>
      </form>
    </div>  
  </div>  
