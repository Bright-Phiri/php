<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
</head>
<style>
.wrapper {
    display: flex;
}

.wrapper .sidebar {
    width: 240px;
    background: #24262e;
    height: 100vh;
}

.wrapper .sidebar .sidebar-header h4 {
    color: white;
    margin-left: 20px;
    margin-top: 20px;
}

.wrapper .sidebar ul {
    list-style: none;
    padding: 0;
}

.wrapper .sidebar ul li {
    line-height: 45px;
    text-indent: 20px;
}

.wrapper .sidebar ul li a {
    text-decoration: none;
    color: #848893;
    display: block;
}

.wrapper .sidebar ul li a:hover {
    background: #181b20;
    color: white;
}

.wrapper .page-content {
    width: calc(100% - 240px);
    overflow: auto;
    height: 100vh;
    background: #f6f5f7;
    display: flex;
    flex-direction: column;
}

.wrapper .page-content .page-content-header {
    width: 100%;
    padding: 20px;
    border-bottom: 1px solid #e7e7e7;
    color: #848893;
}

.wrapper .page-content .page-content-footer {
    padding: 10px;
    margin-top: auto;
    border-top: 1px solid #e7e7e7;
}
</style>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-header">
                <h4>App Name</h4>
            </div>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="add_user.php">Add User</a></li>
                <li><a href="view_users.php">View Users</a></li>
                <li><a href="">Reports</a></li>
                <li><a href="">Settings</a></li>
            </ul>
        </div>
        <div class="page-content">
            <div class="page-content-header">
                <h2>Update User</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5>User Details</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                 require_once('includes/connection.php');
                                if (isset($_POST['edit_btn'])){
                                    $id = $_POST['editID'];
                                    $sql = "SELECT * FROM User WHERE ID = $id";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()){
                                        ?>
                                <form action="process.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="editID" value="<?php echo $row['ID']?>">
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="text" class="form-control" name="firstName"
                                                placeholder="First Name" value="<?php echo $row['FirstName']?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="text" class="form-control" name="lastName"
                                                placeholder="Last Name" value="<?php echo $row['LastName']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="text" class="form-control" name="userName"
                                                placeholder="User Name" value="<?php echo $row['UserName']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Email Address" value="<?php echo $row['Email']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="file" class="form-control" name="image"
                                                value="<?php $row['Photo']?>" placeholder="Photo">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" value="<?php echo $row['Password']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="password" class="form-control" name="confirm_password"
                                                placeholder="Confirm-password" value="<?php echo $row['Password']?>"
                                                required>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary" name="cancel-btn">Cancel</button>
                                <button class="btn btn-primary" name="update-user_btn">Update User</button>
                            </div>
                            </form>
                            <?php
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" page-content-footer">
                <center>Copyright &copy; <?php echo date('Y') ?> Aliscience. All rights reserved.
                </center>
            </div>
        </div>
    </div>
</body>

</html>