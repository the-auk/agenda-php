<html>
<body>
  <form method="post" action="">
    <h1 style="font-size:20pt;"><a href=".">Talking Points/Education</a></h1>
    <h2 style="font-size:20pt;">New Agenda</h2>
    <div>
      <span style="text-align:right; display:inline-block; width:.5in;">
    <label for="new-agenda-title">Title</label>:
  </span>
    <input id="new-agenda-title" type="text">
  </div>
  <div>
    <span style="text-align:right; display:inline-block; width:.5in;">
    <label for="agenda-date">Date</label>:
  </span>
    <input id="agenda-date" type="date">
  </div>
  <div>
    <span style="text-align:right; display:inline-block; width:.5in;">
    <label for="agenda-date">Time</label>:
  </span>
    <input id="agenda-date" type="time">
  </div>
  <div>
    <span style="text-align:right; display:inline-block; width:.5in;">
    <label for="agenda-1">Item 1</label>:
  </span>
    <input id="agenda-1" type="text">
  </div>
  <div style="text-align:center;">
  <button name="add" type="submit">Add Item</button></div>
  <div style="text-align:center;">
  <button name="Done" type="submit">Done</button></div>
</form>

<?php
if(isset($_POST['add'])){
  $a = $_REQUEST['agendas'];
  echo $a;
  $link = mysqli_connect('localhost', 'root', "password", "Points");
  $query = "INSERT INTO agendas (Title) VALUES('$a')";
  $query = "INSERT INTO agendas (Date) VALUES('$a')";
  $query = "INSERT INTO agendas (Time) VALUES('$a')";
  echo $query;
  mysqli_query($link, $query);
}
?>
