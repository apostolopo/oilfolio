<?php
$p=basename(__FILE__);
include("up.php");

?>
<div class="container">
  <div class="alert alert-success">
  <strong>Please Login.</strong>
</div>
  <form action="index2.php" method="post">
    <div class="form-group">
      <label for="Username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <button type="submit" class="btn btn1" name="lgnbtn">Login</button>
  </form>
</div>
<?php
include("footer.php");
?>
 </body>
</html>