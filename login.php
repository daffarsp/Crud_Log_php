<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
html,body{
    width: 100%;
    font-family: 'Roboto', sans-serif;
    color: white;
}
.login-container{
    width:400px;
    background-color:#21256b;
    margin:150px auto;
    border:solid #21256b 3px;
    border-radius:10px;
    padding: 25px;
    box-shadow: 10px 5px 10px rgba(0,0,0,0.9);
}
.title{
    text-align: center;
}
.input-label{
    width:200px;
    display:block;
}
.input{
    padding:10px 0px;
}
input{
    width:100%;
    border-radius:5px;
    border-color:black;
}
button{
    background-color:green;
    color:white;
    border-color:black;
    border-radius:5px;
    padding: 2px 15px;
}
h1{
    text-shadow:10px 5px 10px rgba(0,0,0,0.9);
}
button:hover{
    background-color:#23456c;
    text-decoration:bold;
    transition-delay:0.1s;
    box-shadow: 10px 5px 25px rgba(0,0,0,0.9);
    
}
</style>
<body>
    <div class="login-container ">
    <div class="title">
    <h1>Login User</h1>
    </div>
    <form action="" method="post">
    <div class="input">
    <label for="username" class="input-label">Nama Pengguna:</label>
    <input type="username" id="username" name="username" placeholder="Masukan Nama Pengguna">
    </div>
    <div class="input">
    <label for="password" class="input-label">Kata Sandi:</label>
    <input type="password" id="password" name="password" placeholder="Masukan Password Anda">
    </div>
    <div class="input">
    <button type="submit" class="button" name="login">Login</button>
    </div>
    </form>
    </div>
</body>
</html>
<?php

// $user ="dapa";
// $katasandi="1234";


include('koneksi.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password= $_POST['password'];
    $query = mysqli_query($koneksi,"SELECT * from user where username ='$username' && password ='$password'");
    // if(($user == $_POST['username'])&&($katasandi == $_POST['password'])){
    if (mysqli_num_rows($query)>0){
        header('location:sukses.php');
    }else{
        ?>
            <script>
                alert("USERNAME ATAU PASSWORD SALAH !!!")
            </script>
            <?php
    }
}

?>
