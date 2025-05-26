<?php 
require_once "koneksi.php"; 
if ($_SERVER ["REQUEST_METHOD"] == "POST") { 
$username = mysqli_real_escape_string($conn, $_POST['username']); 
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')"; 
if (mysqli_query($conn, $sql)) { 
header("Location: login.php?register-success"); 
exit(); 
} else { 
echo "Error: mysqli_error"($conn); 
} 
}
?>

<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            color: #007bff;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .login-link {
            margin-top: 10px;
            display: block;
            color: #007bff;
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
    <script> 
        window.onload = function(){
            const urlParams = new URLSearchParams(window.location.search);
            if(urlParams.has('register')&& urlParams.get('register') === 'success'){
                alert ('Registration successfull, please login.')
            }
        }
    </script>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form action="register.php" method="POST">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" value="Register">
        </form>
        <a href="login.php" class="login-link">Back to Login</a>
    </div>
    
</body>
</html>
