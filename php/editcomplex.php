<h1>Edit Theatre Complex</h1>
<form action="editcomplexfinal.php" method="POST">
    <input type="text" name="address" placeholder="Address" required/>
    <input type="text" name="city" placeholder="City" required/>
    <input type="text" name="postalCode" placeholder="Postal Code" required/>
    <input type="text" name="phone" placeholder="Phone" required/>
    <button type="submit" class="btn btn-primary">Add Complex</button>
  <hr>
</form>
<?php
session_start();
if(isset($_GET['theatreCompID'])){
$_SESSION['theatreCompID']= $_GET['theatreCompID'];
}
?>
