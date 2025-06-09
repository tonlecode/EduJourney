<?php
    include 'php/config.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location: login.php');
    }

    $select = mysqli_query($conn, "SELECT * FROM user_form WHERE user_id = '$user_id' ");
    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .back-icon {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 50%;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .back-icon:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .icon-back {
            width: 20px;
            height: 20px;
            stroke: currentColor;
        }

        .container {
            position: relative;
            padding: 60px 20px 20px 20px; /* padding top for back icon */
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            position: relative;
        }

        .profile .content {
            display: flex;
            align-items: center;
        }

        .profile .content img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .profile .details span {
            font-weight: bold;
            font-size: 18px;
            display: block;
        }

        .profile .details p {
            margin: 0;
            font-size: 14px;
            color: gray;
        }

        .logout {
            background: #e74c3c;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .logout:hover {
            background: #c0392b;
        }

        .search {
            margin: 20px 0;
            display: flex;
        }

        .search input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        .search button {
            padding: 0 16px;
            background: #007BFF;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .search button img {
            width: 20px;
            height: 20px;
        }

        .all_users {
            /* Placeholder styling */
            margin-top: 20px;
            background: #fafafa;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Back Icon (Top-left of screen) -->
    <a href="http://localhost:5173" class="back-icon" title="Go Back">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon-back" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <div class="container">
        <section class="users">
            <header class="profile">
                <div class="content">
                    <a href="update_profile.php">
                        <img src="uploaded_img/<?php echo $row['img'] ?>" alt="Profile Image">
                    </a>
                    <div class="details">
                        <span><?php echo $row['name'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $user_id ?>" class="logout">Logout</a>
            </header>

            <form action="" method="post" class="search">
                <input type="text" name="search_box" placeholder="Enter name or email to search">
                <button name="search_user">
                    <img src="images/search.svg" alt="Search">
                </button>
            </form>

            <div class="all_users">
                <!-- Future user listing goes here -->
                <p>No users found. (Placeholder content)</p>
            </div>
        </section>
    </div>

    <script src="js/home.js"></script>
</body>
</html>
