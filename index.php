<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!-- Bootstrap Offline -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #eceff1;

        }

        .container{
            position: relative;
        }

        .form{
            width: 200px;
            height: 200px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            margin-top: 200px;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-top: 250px;
        }
        
        
    </style>
    <body>
        <div class="container">
            <h2 class="header">Choose your tranction: </h2>
            <form class="form"> 
                    <div class="nav">
                        <ul>
                            <li><a href="#Registration.html">Registration</a></li>
                            <li><a href="#Attendance.html">Attendance</a></li>
                            <li><a href="#Raffle.html">Raffle</a></li>   
                            <li><a href="#Report.html">Report (By Campus)</a></li>   
                            <li><a href="#Summary.html">Report (Summary)</a>  </li>
                        </ul>
                    </div>
            </form>       
        </div>
        <script src="bootstrap/js/bootstap.min.js"></script>
    </body>
</html>