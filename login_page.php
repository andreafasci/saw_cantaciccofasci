<!DOCTYPE html>

<head>
  <link href="css/register_style.css" rel="stylesheet" type="text/css"> 
</head>



<body>
  <?php
    session_start();
    //Se la sessione è attiva ->redirect
    if(isset($_SESSION['myarea'])){
      header('Location: redirect.php');
      exit;
    }
   
    //Se esiste un cookie controllo hash -> redirect
    if(isset($_COOKIE['login'])){
      $con = mysqli_connect("localhost","root","","hyt");

      if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
      }

      $query = "SELECT * FROM Users";
      $res = mysqli_query($con,$query);
      while($row = mysqli_fetch_array($res)) {
        if (password_verify($row['Email'],$_COOKIE['login'])) {
          mysqli_close($con);
          $_SESSION['myarea'] = $email;
          header('Location: redirect.php');
          exit;
        }
      }
      mysqli_close($con);
    }

       
  ?>
 <form action="php/login.php" method="post" >
      
        <h1>Login</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Information</legend>
        
          <label for="mail">Email address:</label>
          <input type="email" id="mail" name="email">

        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Passwords</legend>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
          <input type = "checkbox" id = "checkbox" name = "checkbox" value = "1">Auto Login
        </fieldset>

        

      <div>
        <button type="submit">Login</button>
      </div>
      </form>


</body>

</html>
