<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signup.css">
    <title>Sign UP</title>
</head>
<body>
    <?php
       require("./connection.php");
        
       if(isset($_POST ['UPDATE'])){
           $id=$_GET['id'];
           $name=$_POST['name'];
           $lastName=$_POST['lastName'];
           $email=$_POST['email'];
           $password=$_POST['password'];
           $confPassword=$_POST['confirmpassword'];
         if (!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&& !empty($_POST['password'])){
           if($password==$confPassword){
            $p=crud::connect()->prepare('UPDATE crudtable SET name=:n,lastName=:l,email=:e,pass=:p WHERE id=:id');
            $p->bindValue(':id', $id);
            $p->bindValue(':n', $name);
            $p->bindValue(':l', $lastName);
            $p->bindValue(':e', $email);
            $p->bindValue(':p',$password);
            $p->execute();
            echo'updated';
           }else{
            echo 'Password does not match!';
           }
       }
      } 
    ?>
    <div class="form">
        <div class="title">
            <p>Sign UP form</p>
        </div>
        <form action="" method="post">
            <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirmpassword" placeholder="Confirm password">
            <input type="submit" value="UPDATE" name="UPDATE">
        </form>
    </div>
</body>
</html>