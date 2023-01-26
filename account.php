<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/headfoot.css">
    <title>title</title>
</head>
<body>

    <?php
        include 'html/header.html';
    ?>

    <section>
        <form>
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br>

            
            <label for="fname">Card Number:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Expiry Date:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="email">CVC:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="lname">Address:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="email">Address (optional):</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="fname">Country:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">City:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="email">Province:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="fname">Zip Code:</label><br>
            <input type="text" id="fname" name="fname"><br>
            
            <button>Register</button>
        </form>
    </section>

    <?php
        include 'html/footer.html';
    ?>
</body>
</html>