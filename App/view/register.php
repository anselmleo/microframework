<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="/post/store" method="post">
        First Name: <input type="text" name="fname" /><br />
        Last Name: <input type="text" name="lname" /> <br />
        Email: <input type="text" name="email" /> <br />
        Password: <input type="password" name="password" /> <br />
        <input type="submit" name="submit" value="submit" />
    </form>
</body>
</html>