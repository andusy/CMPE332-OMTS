<h1>Select a Showing Time to Edit</h1>
<form action="editmoviefinal.php" method="POST">
  <select name = 'showingID'>
  <h2>Available times for: </h2><h2 name = 'title'>
  <option>Showing Time</option>
  <?php
    include 'dbconnect.php';
    if(isset($_GET['title'])){
      $title= $_GET['title'];
    }
    $sql = "
    SELECT startTime, address, showingID
    FROM showing
    JOIN theatrecomplex on theatrecomplex.theatreCompID = showing.theatreCompID
    WHERE title = '$title'
    ";
    $rows=$dbh->query($sql);
    foreach($rows as $row) {
      echo "<option value='" . $row[2] . "'>". $row[1] . " at " . $row[0] . "</option>";
      }
      $dbh = null;
  ?>
</select>
<button type="submit" class="btn btn-primary">Edit</button>
</form>
