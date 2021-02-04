<?php 

    include_once("StudentClass.php");
 
    $sc->add_student();

?>

<!DOCTYPE html>
<html lang="en">

    <?php include("components/header.php")?>

    <form action="student.php" method="POST">
        <div>
            <input type="text" name="fullname" placeholder="Enter fullname" autocomplete="off"/>
        </div>
        <div>
            <input type="date" name="birthdate" id="birtdate" placeholder="Enter birthdate" />
        </div>
        <div>
            <input type="number" name="age" id="age" placeholder="Enter age" />
        </div>
        <div>
            <input type="submit" name="save" value="Submit" />
        </div>
    </form>

</html>