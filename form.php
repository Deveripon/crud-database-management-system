
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
   
    <?php
    //get form data
        if(isset($_POST['submit'])){
             $name = $_POST['name'];
             $stu_id = $_POST['student_id'];
             $cell = $_POST['cell'];
             $education = $_POST['education'];
             $location = $_POST['location'];
             $gender = $_POST['gender'] ?? '';


    //   //get photo data       
       
           $file_data = $_FILES['profile_photo'] ;

            $file_name = time(). '_'. rand(). '_'. $file_data['name'];
            $file_tmp_name = $file_data['tmp_name'];
            move_uploaded_file($file_tmp_name,'./assets/img/' . $file_name);




    //form validation
    if(empty($name) || empty($stu_id) || empty($cell) || empty($education) || empty($location)){

       $msg = warning_massage('All Feilds Are Required !','danger');  

    }else{
        $msg = warning_massage('Student added','success');
        
 connect()-> query("INSERT INTO students(name,student_id,cell,gender,education,location,photo) VALUES ('$name','$stu_id','$cell','$gender','$education','$location','$file_name')");
    }

 };

    
    ?>


<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <a href="./index.php" class="btn btn-success">View All Students</a>
            <div class="card shadow my-3">
                <div class="card-body">
                  
                        <form action="" method="POST" enctype="multipart/form-data">
                         <?php  echo $msg ?? ''; ?>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control">

                            </div>
                            <div class="mb-3">
                                <label for="stu_id" class="form-label">Student Id</label>
                                <input name="student_id" type="text" class="form-control">

                            </div>
                            <div class="mb-3">
                                <label for="cell" class="form-label">Cell Number</label>
                                <input name="cell" type="text" class="form-control">

                            </div>
                        <div class="mb-3">
                            <h6 for="Gender" >Gender</h6>
                            <input type="radio" name="gender" id="male" Value="Male"> <label for="male">Male</label> 
                            <input type="radio" name="gender" id="female" Value="Female"> <label for="female">Female</label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Education</label>
                            <select class="form-control" name="education" id="">
                                <option value="">--Select--</option>
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                                <option value="BSC">BSC</option>
                                <option value="BCS">BCS</option>

                            </select>
                        </div>
                             <div class="mb-3">
                            <label for="" class="form-label">Location</label>
                            <select class="form-control" name="location" id="">
                                <option value="">--Select--</option>
                                <option value="Gazipur">Gazipur</option>
                                <option value="Tongi">Tongi</option>
                                <option value="Uttara">Uttara</option>
                                <option value="Dhaka">Dhaka</option>

                            </select>
                        </div>
                            


                            <div class="mb-3">
                                <label for="photo" class="form-label">Student Photo</label>
                                <br>
                                <br>
                        
                                <input  type="file" name="profile_photo" id="profile_photo">
                                <label for="profile_photo" class="upload_image" style="cursor: pointer" ><img src="https://www.freeiconspng.com/uploads/pictures-icon-22.gif" width="45" height="50"alt=""></label>
                            
                                    <img id="priview" width="100%" height="100%"src="" alt="">

                            </div>
                            
                                <div class="mb-3">
                                    <input  type="submit" value="Add Student" class="btn btn-success" name="submit">
                                </div>

                        </form>

                
                </div>
            </div>
        </div>
    </div>
</div>








<!-- JavaScript Bundle with Popper For Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- custom javascript file -->
<script src="./assets/js/custom.js"></script>
<script>


$("#priview").hide();
$('#profile_photo').change(function(event){

let img_url = URL.createObjectURL(event.target.files[0]);
$("#priview").show();
$("#priview").attr('src',img_url);

});

</script>

</body>
</html>