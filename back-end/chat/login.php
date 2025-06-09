<?php
    include 'php/config.php';
    session_start();

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email' AND password = '$password' ");
            if(mysqli_num_rows($select) > 0){
                $row = mysqli_fetch_assoc($select);
                $status = 'Active Now';

                $update = mysqli_query($conn, "UPDATE user_form SET status = '$status' WHERE user_id = '{$row['user_id']}' ");
                if($update){
                    $_SESSION['user_id'] = $row['user_id'];
                    header('location: home.php');
                }
            }else{
                $alert[] = "Incorrect email or password!";
            }
        }else{
            $alert[] = "$email is not a valid email!";
        }
    }

    if(isset($_SESSION['user_id'])){
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back</title>
    <!-- ✅ Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-200 to-blue-200 flex items-center justify-center px-4">

    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <h3 class="text-2xl font-bold text-center text-indigo-600 mb-6">Welcome Back</h3>

        <?php
            if(isset($alert)){
                foreach($alert as $alertMessage){
                    echo '<div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">'.$alertMessage.'</div>';
                }
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            <input type="email" name="email" placeholder="Enter email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            <input type="password" name="password" placeholder="Enter password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            <input type="submit" name="submit" value="Start Chatting" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition duration-300 cursor-pointer">
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">
            Don't have an account? <a href="index.php" class="text-indigo-600 hover:underline">Register now</a>
        </p>

        <!-- ✅ Back Button -->
        <div class="mt-6 text-center">
            <a href="http://localhost:5173/" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-300">
                ← Back
            </a>
        </div>
    </div>

</body>
</html>
