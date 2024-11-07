<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <form method="post" class="top-margin" style="margin-top: 5%;">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-6 col-md-3">
                    <div class="form-login">
                        <h4>Welcome back.</h4>
                        <select name="Role" class="form-control mb-3">
                            <option value="Admin" selected>Admin</option>
                            <option value="Content Manager">Content Manager</option>
                            <option value="System User">System User</option>
                        </select>
                        </br>
                        <input type="text" id="UserName" name="UserName" class="form-control input-sm chat-input" required placeholder="User name" />
                        </br>
                        <input type="password" id="Password" name="Password" class="form-control input-sm chat-input" required placeholder="Password" />
                        </br>
                        <div class="wrapper">
                            <button type="submit" name="SignInButton" class="form-control background-blue">Sign In</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </form>

   <?php 
        $accounts = 
            [
                "Admin" => 
                    [
                        "admin1" => "adminpassword1", "admin2" => "adminpassword2"
                    ],

                "Content Manager" => 
                    [
                        "manager1" => "managerpassword1", "manager2" => "managerpassword2"
                    ],
                "User" => 
                    [
                        "user1" => "userpassword1"
                    ],
            ];
   ?>

    <?php 
        if (isset($_POST['SignInButton'])) {
            $role = $_POST['Role'];
            $username = $_POST['UserName'];
            $password = $_POST['Password'];
            $isValid = false;

            
            if (isset($accounts[$role]) && isset($accounts[$role][$username])) {
                if ($accounts[$role][$username] === $password) {
                    $isValid = true;
                }
            }

            if ($isValid) {
                echo "<div class='container top-center-alert'><div class='alert alert-success alert-dismissible'>Login successful. Welcome, $role $username!</div></div>";
            } 
            else {
                echo "<div class='container top-center-alert'><div class='alert alert-danger alert-dismissible'>Invalid credentials. Please try again.</div></div>";
            }
        }
    ?>


</body>
</html>