<?php
    include 'php/config.php';
    session_start();
    $image_rename = 'default-avatar.png';

    if(isset($_POST['submit'])){
        $ran_id = rand(time(), 1000000000);

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];

            if(!empty($image)){
                $image_rename = time().'_'.$image;
            }

            $image_folder = 'uploaded_img/'.$image_rename;
            $status = 'Active Now';

            $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email'");

            if(mysqli_num_rows($select) > 0){
                $alert[] = "User already exists!";
            }else{
                if($password != $cpassword){
                    $alert[] = "Passwords do not match!";
                }elseif($image_size > 2000000){
                    $alert[] = "Image size is too large!";
                }else{
                    $insert = mysqli_query($conn, "INSERT INTO user_form (user_id, name, email, password, img, status)
                        VALUES ('$ran_id', '$name', '$email', '$password', '$image_rename', '$status')");
                    if($insert){
                        if(!empty($image)){
                            move_uploaded_file($image_tmp_name, $image_folder);
                        }
                        header('location: login.php');
                    }else{
                        $alert[] = "Connection failed, please try again!";
                    }
                }
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
    <title>Create Account</title>
    <!-- ✅ Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-200 to-indigo-300 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl">
        <h3 class="text-2xl font-bold text-center text-indigo-700 mb-6">Create Account</h3>

        <?php
            if(isset($alert)){
                foreach($alert as $alertMsg){
                    echo '<div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">'.$alertMsg.'</div>';
                }
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            <input type="text" name="name" placeholder="Enter username" class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-indigo-400" required>
            <input type="email" name="email" placeholder="Enter email" class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-indigo-400" required>
            <input type="password" name="password" placeholder="Enter password" class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-indigo-400" required>
            <input type="password" name="cpassword" placeholder="Confirm password" class="w-full px-4 py-2 border rounded focus:ring-2 focus:ring-indigo-400" required>
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500">
            <input type="submit" name="submit" value="Start Chatting" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition duration-300 cursor-pointer">
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">
            Already have an account?
            <a href="login.php" class="text-indigo-600 hover:underline">Login now</a>
        </p>

      
    </div>

</body>
</html>
