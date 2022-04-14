
<?php

include_once('./autoload.php');
?>
 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dbpro | welcome to database management system</title>

   <!-- //link bootstrap css  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- main stylesheet file -->
<link rel="stylesheet" href="./assets/css/style.css">

</head>
<body>
   

<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="./form.php" class="btn btn-success">Add New Student</a>
            <div class="card shadow my-3">
                <div class="card-body">
                   <table class="table table-striped ">
                        <thead class="table-success">
                            <tr>
                                <td>Serial No</td>
                                <td>Name</td>
                                <td>Students Id</td>
                                <td>Cell Number</td>
                                <td>Photos</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        
                        
                     $data =    connect() -> query("SELECT * FROM students");
 
                     while( $student_info =  $data ->fetch_object()):

                        ?>


                        <tr>
                                <td><?php echo $student_info->id ?></td>
                                <td><?php echo $student_info->name ?></td>
                                <td><?php echo $student_info->student_id ?></td>
                                <td><?php echo $student_info->cell ?></td>
                                <td><img src="./assets/img/<?php echo $student_info->photo ?>" width="50" height="50"alt=""></td>
                                <td>
                                    <a href="#" class="btn-sm btn-primary">View</a>
                                    <a href="#" class="btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                           
                       <?php endwhile; ?>
                       
                       
                        </tbody>

                   </table> 

                </div>
            </div>
        </div>
    </div>
</div>








<!-- JavaScript Bundle with Popper For Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- custom javascript file -->
<script src="./assets/js/custom.js"></script>


</body>
</html>