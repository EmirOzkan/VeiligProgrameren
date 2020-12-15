<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "brokenauth";
$message = "";
try
{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["login"]))
    {

         if(empty($_POST["email"]) || empty($_POST["password"]))
         {
              $message = '<label>u moet bij beide velden iets invoeren!</label>';
         }
         else
         {

              $query = "SELECT * FROM brokenauth WHERE email = :email AND password = :password";
              $statement = $connect->prepare($query);
              $statement->execute(
                   array(
                        'email'     =>     $_POST["email"],
                        'password'     =>     $_POST["password"]
                   )
              );
              $count = $statement->rowCount();
              if($count > 0)
              {
                   $_SESSION["email"] = $_POST["email"];
                   header("location:login_success.php");
              }
              else
              {
                   $message = '<label>email of wachtwoord is fout</label>';
              }
         }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}


if(isset($message))
{
    echo '<label class="text-danger">'.$message.'</label>';
}
?>

<!DOCTYPE html>
<html>
    <head>
         <title>Emir Veilig Programmeren</title>
    </head>
    <body>
         <br />
          <h3 align="center">Hier inloggen</h3><br />
              <form method="post">
                   <label>Email</label>
                   <input type="text" name="email" class="form-control" />
                   <br />
                   <label>wachtwoord</label>
                   <input type="password" name="password" class="form-control" />
                   <br />
                   <input type="submit" name="login" class="btn" value="Login" />
              </form>
         </div>
         <br />
    </body>
</html>
