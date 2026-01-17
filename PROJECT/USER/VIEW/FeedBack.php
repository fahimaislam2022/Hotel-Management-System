<?php
$errorMsg="";
$successMsg="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty(trim($_POST["suggestions"]))){
        $errorMsg ="Please fill the textarea";
    }
    else{
        $successMsg ="Submitted successfully";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack</title>
     <link rel="stylesheet" href="../CSS/FeedBack.css">
</head>
<body>
    <div class="feedback">
    <h1>Send Us Your FeedBack!</h1>


<form method ="POST" action ="">
        
    <fieldset>
     <legend>Did you achieve your goal?</legend>
            
    <label>
    <input type ="radio" name="goal_achieved" value="yes">
    yes
    </label>

<label>
  <input type ="radio" name="goal_achieved" value="partially">
 partially
</label>


<label>
 <input type ="radio" name="goal_achieved" value="no" checked>
  no
</label>

</fieldset>





    <label for ="visit_reason">
        What was your reason to visit? </label> 


<br>
<select id="visit_reason" name="visit_reason">
    <option value ="Check Price">check price </option>
     <option value ="Check Rooms">check rooms</option>
     <option value ="others">others </option>
</select>


    

    <label for ="failure_reason">
        Why the goal was not achieved?
</label>
<br>
<select id="failure_reason" name="failure_reason">
    <option value="form_issue" selected>the form doesn't work</option>
     <option value="missing_info">missing info</option>
    <option value="others">others</option>
     </select>
      



 <label for="suggestions">
  Please give your suggestions
 </label>
 <br>
 <textarea
 id="suggestions"
 name="suggestions"
 rows="4"
 placeholder="Please text here "
>
 </textarea>
      

    <?php if (!empty($errorMsg)) { ?>
        <p class="error-msg"><?php echo $errorMsg; ?></p>
    <?php } ?>

    <?php if (!empty($successMsg)) { ?>
        <p class="success-msg"><?php echo $successMsg; ?></p>
    <?php } ?>

 
 <button type="submit" class="btn">Submit</button>
      

    </form>
</div>





</body>
</html>