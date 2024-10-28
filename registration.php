<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #eceff1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            margin: 5px;
            border: none;
        }

        .btn, btn-success, w3-button, w3-green:hover {
            background-color: #45a049;
            color: #fff;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="form-container w3-animate-opacity">
        <h2 class="form-header">Register</h2>
        <form action="save_student.php" method="post">
            <div class="form-group">
                <label for="idNum">ID Number</label>
                <input type="number" class="form-control" id="idNum" name="idNum" required>
            </div>
            <div class="form-group">
                <label for="campus">Campus</label>
                <input type="text" class="form-control" id="campus" name="campus" required>
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" required>
            </div>
            <div class="form-group">
                <label for="amountPaid">Amount Paid</label>
                <input type="number" step="0.01" class="form-control" id="amountPaid" name="amountPaid">
            </div>
            <div class="form-group">
                <label for="attended">Attended</label>
                <select class="form-control w3-select" id="attended" name="attended" required>
                    <option value="" disabled selected>Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-success w3-button w3-green">Save</button>
                <button type="reset" class="btn btn-danger w3-button w3-red"><a href="register_table.php">Cancel</a></button>
            </div>
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
