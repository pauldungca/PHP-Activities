<?php 
    $accounts = [
        "Admin" => [
            "admin" => "pass1234", "renmark" => "pogi1234"
        ],
        "Content Manager" => [
            "pepito" => "manaloto", "juan" => "delacruz"
        ],
        "User" => [
            "pedro" => "penduko"
        ],
    ];

    $isValid = false;
    $alertMessage = '';
    $alertType = '';

    if (isset($_POST['SignInButton'])) {
        $role = $_POST['role'];  
        $username = $_POST['Username'];  
        $password = $_POST['Password'];

        if (isset($accounts[$role]) && isset($accounts[$role][$username])) {
            if ($accounts[$role][$username] === $password) {
                $isValid = true;
                $alertMessage = "Login successful. Welcome, $role $username!";
                $alertType = 'alert-success';
            }
        }

        if (!$isValid) {
            $alertMessage = "Invalid credentials. Please try again.";
            $alertType = 'alert-danger';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Login</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <?php if ($alertMessage): ?>
        <div class="alert <?php echo $alertType; ?> alert-dismissible fade show position-absolute top-0 mt-5 w-30" role="alert">
            <?php echo $alertMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="card p-4" style="width: 300px;">
        <div class="text-center mb-4">
        <img alt="User icon" class="rounded-circle" height="100" src="https://storage.googleapis.com/a1aa/image/3yr3AmrOlLJ4KR3E9V4uFZSmOaevMz1RmOpLaqOcqSuaEb5JA.jpg" width="100"/>
        </div>
        <form method="post" action="">
            <div class="mb-3">
                <select class="form-select" name="role" aria-label="Role selection">
                    <option value="Admin" selected>Admin</option>
                    <option value="Content Manager">Content Manager</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" placeholder="User Name" type="text" name="Username" required/>
            </div>
            <div class="mb-3">
                <input class="form-control" placeholder="Password" name="Password" type="password" required/>
            </div>
            <button class="btn btn-primary w-100" name="SignInButton" style="background-color: #5a8aa8; border-color: #5a8aa8;" type="submit">Sign in</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>