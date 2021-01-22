<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
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
                <h2>Dashboard</h2>
            </div>
            <div class="page-content-footer">
                <center>Copyright &copy; <?php echo date('Y') ?> Aliscience. All rights reserved.</center>
            </div>
        </div>
    </div>
</body>

</html>