<?php
session_start();
$_SESSION['showingID'] = $_POST["showingID"];
?>
<h1>Edit Time</h1>
<form action="editmoviefinal2.php" method="POST">
    <input type="text" name="startTime" placeholder="startTime" required/>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  <hr>
</form>
