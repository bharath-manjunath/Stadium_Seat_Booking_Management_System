<?php

session_start();

include_once "../Shared/connection.php";
include "admin_session_login.php";
include "option_page.html";


?>

<!DOCTYPE html>
<html>
    <head>

        <title>Edit Stadium</title>

    </head>
    <body>

        <?php

        $old_sname = $_GET['sname'];

        $query = "SELECT * from stadium where sname = '$old_sname';";
        $sql_obj = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($sql_obj);

        $image = $row['simg'];
        $address = $row['address'];
        $city = $row['city'];

        $query = "SELECT * from seat where sname = '$old_sname' and class = 'diamond';";
        $sql_obj = mysqli_query($conn, $query);
        $diamond = mysqli_num_rows($sql_obj);

        $query = "SELECT * from seat where sname = '$old_sname' and class = 'gold';";
        $sql_obj = mysqli_query($conn, $query);
        $gold = mysqli_num_rows($sql_obj);

        $query = "SELECT * from seat where sname = '$old_sname' and class = 'silver';";
        $sql_obj = mysqli_query($conn, $query);
        $silver = mysqli_num_rows($sql_obj);

        ?>
        <div class='d-flex justify-content-center align-items-center mt-5 mb-5'>
            <form action='edit_stadium_php.php?old_sname=<?php echo $old_sname ?>' method='post' enctype='multipart/form-data' class='w-25 bg-warning p-4 text-center'>
                <div>
                    <h2>Update Stadium</h2>
                    <input type='text' name='sname' value='<?php echo $old_sname ?>' placeholder='Enter Stadium Name' class='mt-3 form-control' required>
                    <img width='200px' class='mt-2' src='../Images/<?php echo $image ?>'>
                    <input type='file' name='simg' id='img' accept='image/*' class='mt-3 form-control' style='display: none;'>
                    <label for='img' class='mt-3 form-control btn btn-primary forlabel'>Select Another Image</label>
                    
                    <input type='text' name='address' value='<?php echo $address ?>' placeholder='Enter Stadium Address' class='mt-3 form-control' required>
                    <input type='text' name='city' value='<?php echo $city ?>' placeholder='Enter Stadium City' class='mt-3 form-control' required>
                </div>
                <div>
                    <h4 class='mt-3'>Seats in Each Division</h4>
                    <input type='number' placeholder='class diamond' name='diamond' value='<?php echo $diamond ?>' min='1' step='1' class='mt-3 form-control' required>
                    <input type='number' placeholder='class gold' name='gold' value='<?php echo $gold ?>' min='1' step='1' class='mt-3 form-control' required>
                    <input type='number' placeholder='class silver' name='silver' value='<?php echo $silver ?>' min='1' step='1' class='mt-3 form-control' required>
                </div>
                <input type='submit' value='Update Stadium Details' class='mt-3 form-control btn btn-success'>
            </form>
        </div>
    
    </body>
</html>