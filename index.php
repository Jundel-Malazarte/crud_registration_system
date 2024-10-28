<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #eceff1;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .form {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }


    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .nav ul {
        list-style-type: none;
        padding: 0;
    }
    .nav ul li {
        margin: 10px 0;
    }

    /** Navigation */
    .nav, .w3-ul {
        justify-content: center;
    }
    .nav, .w3-ul li {
        border: none;
    }

</style>
<body>
    <div class="container">
        <div class="col-12 col-md-6 col-lg-4 form">
            <h2 class="header">Choose your transaction</h2>
            <form>
                <div class="nav">
                    <ul class="w3-ul">
                        <li><a href="register_table.php" class="w3-button w3-block w3-blue">Registration</a></li>
                        <li><a href="attendance.php" class="w3-button w3-block w3-teal">Attendance</a></li>
                        <li><a href="raffle.php" class="w3-button w3-block w3-green">Raffle</a></li>   
                        <li><a href="#Report.html" class="w3-button w3-block w3-yellow">Report (By Campus)</a></li>   
                        <li><a href="#Summary.html" class="w3-button w3-block w3-red">Report (Summary)</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
