<!DOCTYPE html>
<html>
    <head>
        <title> Job Link - Register </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    
    <body>
        <header>
            <ul id="computer">
                <li><img src="../pictures/logo.jpg" alt="Job Link Logo" class="logo" /> </li>
                <li class="slogan"> Job Link - The Link to Your Dream Job </li>
                <li class="user"><a href="register.html">Register</a></li>
                <li class="user"><a href="login.html">Login</a></li>
                <li class="user"><a href="contact.html">Contact Us</a></li>
            </ul>
            <ul id="phone">
                <li><img src="../pictures/logo.jpg" alt="Job Link Logo" class="logo" /> </li>
                <li class="user"><a href="register.html">Register</a></li>
                <li class="user"><a href="login.html">Login</a></li>
                <li class="user"><a href="contact.html">Contact Us</a></li>
                <li class="slogan"> Job Link - The Link to Your Dream Job </li>
            </ul>
        </header>
        
        <section class="form">
            <?php
                require_once "login.php";
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);
                
            if (isset($_POST['employer_name'])    &&
                isset($_POST['username']) &&
                isset($_POST['password'])     &&
                isset($_POST['email']))
                {
                    $employer_name = get_post($conn, 'employer_name');
                    $username = get_post($conn, 'username');
                    $password = get_post($conn, 'password');
                    $email = get_post($conn, 'email');
                    $query    = "INSERT INTO employers VALUES" .
                    "('$employer_name', '$username', '$password', '$email')";
                    $result = $conn->query($query);
                    
                    if (!$result) echo "INSERT failed: $query<br>" .
                    $conn->error . "<br><br>";
                }
            
            echo <<<_END
            <form action="register.php" method="post"><pre>
          
            <div>
            <label for="employer_name">Company Name:</label>
            <input type="text" required name="employer_name"><br>
            </div>
            
            <div>
            <label for="username">Username</label>
            <input type="text" name="username">
            </div>
            
            <div>
            <label for="pwd">Password</label>
            <input type="password" id="pwd" name="pwd">
            </div>
            
            <div>
            <label for="email">Email</label>
            <input type="email" name="email">
            </div>
            <input type="submit" value="ADD RECORD">
            </pre></form>
            _END;
          
            function get_post($conn, $var)
            {
                return $conn->real_escape_string($_POST[$var]);
            }
            
                ?>
          
          
                
                </form>
        </section>
 
        <footer> &copy; Copyright 2018 by Whitney Rich. All Rights Reserved. </footer>
        
    </body>
</html>
