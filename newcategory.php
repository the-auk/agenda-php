<html>
<body>
<form method="post" action="">
<h1 style="font-size:20pt;"><a href=".">Talking Points</a></h1>
<h2 style="font-size:20pt;">New Category</h2>
<div><span style="text-align:right;display:inline-block;width:.5in;">
</span><input name="category" placeholder="New Category" type="text">
<button name="add" type="submit">Add</button></div>
</form>
<?php
if(isset($_POST['add'])){
  $a = $_REQUEST['category'];
  echo $a;
  $link = mysqli_connect('localhost', 'root', "password", "Points");
  $query = "INSERT INTO category (Name) VALUES('$a')";
  echo $query;
  mysqli_query($link, $query);
}
?>
</body>
</html>
