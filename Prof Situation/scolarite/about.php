<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/scolarite/style.css">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 60px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            /* Required for absolute positioning */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .profile-photo {
            border: 3px solid #333;
            /* Add a border */
            border-radius: 50%;
            /* Create a rounded shape */
            max-width: 150px;
            /* Set a maximum width */
            height: auto;
            /* Maintain the aspect ratio */
            position: absolute;
            /* Position the top-right photo */
            top: 20px;
            /* Adjust the top position as needed */
            left: 20px;
            /* Adjust the right position as needed */
        }

        .top-right-photo {
            border: 3px solid #333;
            /* Add a border */
            border-radius: 50%;
            /* Create a rounded shape */
            max-width: 150px;
            /* Set a maximum width */
            height: auto;
            /* Maintain the aspect ratio */
            position: absolute;
            /* Position the top-right photo */
            top: 20px;
            /* Adjust the top position as needed */
            right: 20px;
            /* Adjust the right position as needed */
        }

        p {
            line-height: 1.5;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include('./views/prof_situation/navbar.php'); ?>
    <div class="container">
        <img class="profile-photo" src="./me.png" alt="Profile Photo">
        <img class="top-right-photo" src="./iset.png" alt="Top Right Photo">
        <p>Projet d'integration</p>
        <p>Ayoub Zaanouni</p>
        <p>DSI 3.2</p>
    </div>
</body>

</html>