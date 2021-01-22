<?php
require_once('includes/connection.php');

if (isset($_POST['save_user_btn'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $target = "upload/";
    $validaExensions = array('png', 'jpg');
    if (!empty($firstName) && !empty($lastName) && !empty($username) && !empty($email) && !empty($image)) {
        if (strcmp($password, $confirmPassword) == 0) {
            $sql = "INSERT INTO User (FirstName,LastName,UserName,Email,Photo,Password) VALUES ('$firstName','$lastName','$username','$email','$image','$password')";
            $fileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $target = $target . $image;
            if (in_array($fileType, $validaExensions)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("Record added to the database");
                        window.location.href = "add_user.php";</script>';
                    } else {
                        echo '<script>alert("Failed to add the user");
                        window.location.href = "add_user.php";</script>';
                    }
                }
            } else {
                echo '<script>alert("Image extension is invalid");
                window.location.href = "add_user.php";</script>';
            }
        } else {
            echo '<script>alert("Password doesnt match");
                window.location.href = "add_user.php";</script>';
        }
    }
}

if (isset($_POST['update-user_btn'])){
    $id = $_POST['editID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $target = "upload/";
    $validaExensions = array('png', 'jpg');
    if (!empty($firstName) && !empty($lastName) && !empty($username) && !empty($email) || !empty($image)) {
        if (strcmp($password, $confirmPassword) == 0) {
            $select = "SELECT * FROM User WHERE ID = $id";
            $select_result = $conn->query($select);
            while ($row = $select_result->fetch_assoc()){
                if ($image == NULL){
                    $up_image = $row['Photo'];
                } else{
                    $up_image= $image; 
                    if ($image_dir = "upload/".$row['Photo']){
                        unlink($image_dir);
                    }
                }
            }
            $sql = "UPDATE User SET FirstName = '$firstName',LastName = '$lastName',UserName = '$username',Email = '$email',Photo = '$up_image',Password = '$password'WHERE ID = $id";
            $fileType = strtolower(pathinfo($up_image, PATHINFO_EXTENSION));
            $target = $target . $up_image;
            if ($image == NULL){
                $sql = "UPDATE User SET FirstName = '$firstName',LastName = '$lastName',UserName = '$username',Email = '$email',Photo = '$up_image',Password = '$password'WHERE ID = $id";
                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Record successfully updated");
                    window.location.href = "view_users.php";</script>';
                } else {
                    echo '<script>alert("Failed to update the user");
                    window.location.href = "add_user.php";</script>';
                }
            } else{
                if (in_array($fileType, $validaExensions)) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        if ($conn->query($sql) === TRUE) {
                            echo '<script>alert("Record successfully updated");
                            window.location.href = "view_users.php";</script>';
                        } else {
                            echo '<script>alert("Failed to update the user");
                            window.location.href = "add_user.php";</script>';
                        }
                    }
                } else {
                    echo '<script>alert("Image extension is invalid");
                    window.location.href = "add_user.php";</script>';
                }
            }
        } else {
            echo '<script>alert("Password doesnt match");
                window.location.href = "add_user.php";</script>';
        }
    }
}

if (isset($_POST['cancel'])){
    header('Location:view_users.php');
}

if (isset($_POST['del_btn'])){
    $userId = $_POST['deleteID'];
    $select = "SELECT Photo FROM User WHERE ID = $userId";
    $resultSelect = $conn->query($select);
    while ($row  = $resultSelect->fetch_assoc()){
        if ($imagePath = "upload/".$row['Photo']){
            unlink($imagePath);
        }
    }
    $sql = "DELETE FROM User WHERE ID = $userId";
    $result = $conn->query($sql);
    if ($result){
       header('Location:view_users.php');
    }
    
}