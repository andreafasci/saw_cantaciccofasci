<!DOCTYPE html>

<head>
  <link href="css/register_style.css" rel="stylesheet" type="text/css"> 
</head>

<body>
  <?php include 'php/login_reg_errors_check.php';?>
  <form action="php/register.php" method="post" >
      
        <h1>Registration</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Information</legend>
          <label for="name">Your full name:</label>
          <input type="text" id="name" name="name">
          
          <label for="mail">Email address:</label>
          <input type="email" id="mail" name="email">

        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Passwords</legend>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
          <label for="password">Confirm Password:</label>
          <input type="password" id="2nd_password" name="2nd_password">
        </fieldset>

      <div>
        <button type="submit">Register</button>
      </div>
      </form>


</body>

</html>
