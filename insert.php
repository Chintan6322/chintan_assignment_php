<?php
   include('config.php');
  // Get data
   $getdata="select * from refrigerator";
   $alldata=mysqli_query($db,$getdata);

 //Insert data
     if(isset($_REQUEST['ins'])){
           $name=$_REQUEST['name'];
           $price=$_REQUEST['price'];
           $quantity=$_REQUEST['quantity'];
           $model=$_REQUEST['model'];
           $des=$_REQUEST['description'];
           $color=$_REQUEST['color'];


           $sql="insert into refrigerator(name,price,quantity,model,description,color)values('$name','$price','$quantity','$model','$des','$color')";
           mysqli_query($db,$sql);
           header('location:insert.php');
     }

  // Delete data
    
  if(isset($_REQUEST['del'])){
     
    $ids=$_REQUEST['del'];
    $sql="delete from refrigerator where refrigerator_id='$ids'";
    mysqli_query($db,$sql);
    header('location:insert.php');
  }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    
</head>
<body>
    <form>
        <h2 align="center">Refrigerator Store</h2>
      <div>Refrigerator Name</div>
      <div><input type="text" name="name" class="txt"></div>

      <div> Price</div>
      <div><input type="text" name="price" class="txt"></div>

      <div> Quantity</div>
      <div><input type="text" name="quantity" class="txt"></div>

      <div>Model</div>
      <select name="model" class="txt">
        <option hidden>Select Model</option>
        <option value="single door">Single Door</option>
        <option value="double door">Double Door</option>
        <option value="latest">Latest</option>
        <option value="smart">Smart</option>
      </select>

       
      <div> Description</div>
      <div><input type="text" name="description" class="txt"></div>

      <div> Color</div>
      <div><input type="text" name="color" class="txt"></div>

      <div><input type="submit" name="ins" class="btn"></div>
      

    </form>
    <table border='1' align='center'>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Model</th>
        <th>Description</th>
        <th>Color</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    <?php
       while($w=mysqli_fetch_array($alldata)){
       ?>
       <tr>
          <td><?php echo $w['refrigerator_id']; ?></td>
          <td><?php echo $w['name']; ?></td>
          <td><?php echo $w['price']; ?></td>
          <td><?php echo $w['quantity']; ?></td>
          <td><?php echo $w['model']; ?></td>
          <td><?php echo $w['description']; ?></td>
          <td><?php echo $w['color']; ?></td>
          <td><a href="insert.php? del=<?php echo $w['refrigerator_id']; ?>">Delete</td>
          <td><a href="edit.php? edt=<?php echo $w['refrigerator_id']; ?>">Update</td>
       </tr>
       <?php
       }
    ?>
    </table>
</body>
</html>