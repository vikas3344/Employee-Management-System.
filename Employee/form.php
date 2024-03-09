<?php include("connection.php") ?>

<?php
if(isset($_POST['searchdata'])){
    $search=$_POST['search'];
    $qurey="SELECT * FROM `form` WHERE id='$search' ";
    $data = mysqli_query($conn,$qurey);
    $result=mysqli_fetch_assoc($data);
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center">
    <form action="#" method="POST">
        <h1>Employee Data Entry Automation Software</h1>
        <div class="form">
        
            <input type="text" name="search" class="textfield" placeholder="Search Id" 
            value="<?php if(isset($_POST['searchdata']))
             { 
                echo $result['id'];
             }
             ?>">

            <input type="text" name="name" class="textfield" placeholder="Employee Nmae"
             value="<?php if(isset($_POST['searchdata'])){ echo $result['emp_name']; } ?>">

            <select class="textfield" name="gender">
                <option>Select Gender</option>
                <option value="Male"
                <?php 
                if(isset($_POST['searchdata'])){
                    if($result['emp_gender']=='Male'){
                        echo "selected";
                    }
                }
                ?>
                >Male</option>
                <option value="Female"
                <?php 
            if(isset($_POST['searchdata'])){
                if($result['emp_gender']=='Female'){
                    echo "selected";
                }   }
                ?>
                >Female</option>
                <option value="Other"
                <?php 
            if(isset($_POST['searchdata'])){
                if($result['emp_gender']=='Other'){
                    echo "selected";
                }
            }
            ?>
                >Others</option>
            </select>

            <input type="text" name="email" class="textfield" placeholder="Email Address"
            value="<?php if(isset($_POST['searchdata']))
             { 
                echo $result['emp_email'];
             }
             ?>">
            
            <select class="textfield" name="department">
                <option>Select Department</option>
                <option value="IT"
                <?php 
                if(isset($_POST['searchdata'])){
                   if($result['emp_department']=='IT'){
                    echo "selected";
                   }
                 }
                ?>
                >IT</option>
                <option value="HR"
                <?php 
                if(isset($_POST['searchdata'])){
                   if($result['emp_department']=='HR'){
                    echo "selected";
                   }
                 }
                ?>
                >HR</option>
                <option value="Accounts"
                <?php 
                if(isset($_POST['searchdata'])){
                   if($result['emp_department']=='Accounts'){
                    echo "selected";
                   }
                 }
                ?>
                >Accounts</option>
                <option value="Marketing"
                <?php 
                if(isset($_POST['searchdata'])){
                   if($result['emp_department']=='Marketing'){
                    echo "selected";
                   }
                 }
                ?>
                >Marketing</option>
                <option value="Business Development"
                <?php 
                if(isset($_POST['searchdata'])){
                   if($result['emp_department']=='Business Development'){
                    echo "selected";
                   }
                 }
                ?>
                >Business Development</option>
            </select>      
        <textarea  name="address" placeholder="Address" class="textfield"> <?php if(isset($_POST['searchdata'])){ echo $result['emp_address'];}
             ?></textarea>
           
        <div class="buttons">
        <input type="submit" name="searchdata" value="Search" class="btn">
        <input type="submit" name="save" value="Save" class="btn">
        <input type="submit" name="update" value="Update" class="btn">
        <input type="submit" name="delete" value="Delete" class="btn" onclick="return checkdelete()">
        <input type="reset" name="clear" value="Clear" class="btn">
        
        </div>
        </div>
        </form>
    </div>
</body>
</html>

<!-- delte se pahle pucho delete karna hai ya nahi -->
<script>
    function checkdelete(){
        // kaha return karna hai button pe delte wale pe
      return confirm('Are you sure you want to delete record');
    }
</script>



<?php
//---Insert  ka Code 
if(isset($_POST['save'])){
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $address=$_POST['address'];

  $query = "INSERT INTO `form`(`emp_name`, `emp_gender`, `emp_email`, `emp_department`, `emp_address`) 
    VALUES ('$name','$gender','$email','$department','$address')";

   $data = mysqli_query($conn,$query);
   if($data){
      echo "<script> alert('Data Inserted into Database')</script>";
   }else{
    echo "<script> alert('Failed to inset data')</script>"; 
   }
}
?>

<!-- delete ka code -->
<?php
  if(isset($_POST['delete'])){
    $id=$_POST['search'];
    $query ="DELETE FROM `form` WHERE id='$id' ";
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script> alert('Record delete')</script>";
    }else{
        echo "<script> alert('delete Failed')</script>";
    }
  }
?>

<!-- Edit data  -->

<?php
  if(isset($_POST['update'])){
    $id=$_POST['search'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $address=$_POST['address'];

    $query="UPDATE `form` SET `emp_name`='$name',`emp_gender`='$gender',`emp_email`='$email',`emp_department`='$department',`emp_address`='$address' WHERE id='$id' ";
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script> alert('Record Updated')</script>";
    }else{
        echo "<script> alert('Update Failed')</script>";
    }

}
?>

