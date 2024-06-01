<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link rel="stylesheet" href="admin.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-attachment: fixed;
}

body {
    font-family: Arial, sans-serif;
}

.navbar {
    margin-top: 130px;
    font-size: 30px;
    position: relative; 
}

.banner {
    position: relative;
}

h1 {
    font-family: 'Poppins';
    font-size: 20px;
    text-align: center;
    padding: 50px;
}
.bg-image {
    width: 100%;
    height: 100vh;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1; 
}

.content {
    position: relative;
    z-index: 1; 
}
.navbar {
    display: flex;
    justify-content: center; 
    align-items: center;
    padding: 15px 20px;
    background-color: rgba(244, 184, 184, 0.5); 
    height: 100px; 
}
.navbar ul {
    list-style: none;
    display: flex;
}

.navbar ul li {
    margin-right: 20px;
}

.navbar ul li:last-child {
    margin-right: 0;
}

.navbar ul li a {
    text-decoration: none;
    color: #0d0d0d; 
    font-weight: bold;
    transition: color 0.3s ease;
}

.navbar ul li a:hover {
    color: #9fd7fc; 
}


.navbar::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 100px; 
    transform: translateY(-50%);
    z-index: -1;
}
.return-btn {
    margin: 0px 0px;
    margin-bottom: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    width: 30px; 
    height: 10px; 
    font-size: 10px; 
    padding: 2px 8px; 
    background-color: transparent; 
    color: #34d3db; 
    border: 1px solid #34d3db; 
    float: inline-start;
}
.logout-btn {
    display: inline-block;
    padding: 2px 8px;
    background-color: white; 
    color: #fff; 
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.logout-btn:hover {
    background-color: #0056b3;
}

</style>
<body>
    <div class="banner">
        <h1 style="color: aliceblue;">ADMIN PAGE</h1>
        <img src="../e-book/media/adminbg.jpg" class="bg-image">
            <div class="navbar">
                
                <ul>
                   <li><a href="front.html">HOME</a></li> 
                    <li><a href="mainpage.php">FEEDBACK</a></li>
                    <li><a href="logout.php" class="logout-btn">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
