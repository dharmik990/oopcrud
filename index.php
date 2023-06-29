<?php

require('db.php');

$obj= new db();

if(isset($_POST['submit'])){
$obj->insert($_POST);
}
if(isset($_GET['update_id'])){
   $uid=$_GET['update_id'];
   $rec= $obj->display($uid); 
}
if(isset($_POST['update'])){
    $obj->update($_POST);
}
if(isset($_GET['delete_id'])){
    $did=$_GET['delete_id'];
    $obj->deletei($did);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1>form</h1>
                <?php if(isset($_GET['msg']) AND $_GET['msg'] =='ins'){ ?>
                <div class="alert alert-success">data insert successfully<?php  }?></div>

                <?php if(isset($_GET['ms'])AND $_GET['ms']=='up'){ ?>
                <div class="alert alert-success">data update successfully<?php  }?></div>

                <?php if(isset($_GET['ms'])AND $_GET['ms']=='del'){ ?>
                <div class="alert alert-success">data delete successfully<?php  }?></div>

                <?php if(isset($_GET['update_id'])){
                      $uid=$_GET['update_id'];
                      $rec= $obj->display($uid);  ?>
                <form action="" method="post" class="form-control">
                    <label>name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $rec['name']; ?>">

                    <label>email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $rec['email'] ?>">

                    <input type="submit" value="update" name="update" class="btn btn-primary">

                </form>
                <?php }else{ ?>
                <form action="" method="post" class="form-control">
                    <label>name:</label>
                    <input type="text" name="name" id="name" class="form-control">

                    <label>email:</label>
                    <input type="email" name="email" id="email" class="form-control">


                    <label>password:</label>
                    <input type="password" name="password" class="form-control">

                    <input type="submit" value="submit" name="submit" class="btn btn-primary">
                </form>
                <?php } ?>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>action</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php $data=$obj->select(); 
                foreach ($data as $value) {
                
                ?>

                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><a href="index.php?update_id=<?php  echo $value['id'] ?>"><button
                                class="btn btn-primary fa fa-edit"></button></a></td>
                    <td><a href="index.php?delete_id=<?php echo $value['id'] ?>"><button
                                class="btn btn-danger fa fa-trash"></button></a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>

</body>

</html>