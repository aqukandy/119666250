<?php require_once '../app/views/templates/header.php'?>

<h2>Update Reminder</h2>


<form>

Subject:
<input type="text" value="<?=$data['item'][0]['subject']?>">
Description:
<input type="text" value="<?=$data['item'][0]['description']?>">

<button type="submit"> Update </button>

</form>