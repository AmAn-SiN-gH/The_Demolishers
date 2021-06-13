<?php
$username="id15988889_username";
$databasename="id15988889_users";
$password="Veers!ngh191";
$hostname="localhost";
$con=mysqli_connect($hostname,$username,$password,$databasename);
if($con){
  echo "true";
}
if(isset($_POST['submit'])){
  $name=mysqli_real_escape_string($con,$_POST['name']);
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $age=mysqli_real_escape_string($con,$_POST['age']);
  $genre=mysqli_real_escape_string($con,$_POST['genre']);
  $suggestions=mysqli_real_escape_string($con,$_POST['suggestions']);
  $emailquery="insert into users (text,email,age,genre,suggestions) values('$name','$email','$age','$genre','$suggestions')";
  mysqli_query($con,$emailquery);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&display=swap" rel="stylesheet">
  </head>
  <body>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
      <div class="info">
        <label for="">Name:</label>
        <input type="text" name="name" >
        <br>
        <label for="">Email:</label>
        <input type="email" name="email" >
        <br>
        <label for="">Age:</label>
         <input type="age" name="age">
      <br>
      <label for="Genres">Genres you like:</label>
        </div>
         <div class="container">
          <div>
        <label>
            <input type="checkbox" name="" value="horror">
            <span>Horror</span>
            </label>
          </div>

          <div>
        <label>
            <input type="checkbox" name="" value="action">
            <span>Action</span>
            </label>
          </div>

          <div>
        <label>
            <input type="checkbox" name="" value="adventure">
            <span>Adventure</span>
            </label>
          </div>

      <div>
        <label>
            <input type="checkbox" name="" value="comedy">
            <span>Comedy</span>
            </label>
          </div>


          <div>
            <label>
            <input type="checkbox" name=""value="fantasy">
            <span>Fantasy</span>
            </label>
          </div>

          <div>
            <label>
            <input type="checkbox" name=""value="sci-fi">
            <span>Sci-Fi</span>
            </label>
          </div>
          </div>
        <label for="Suggestions">Suggestions:</label>
        <br>
        <textarea placeholder="Suggestions" name="suggestions"></textarea>
        <input type="submit" name="submit">
      </div>
    </form>
  </body>
</html>
