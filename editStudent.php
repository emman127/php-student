<?php 

    include_once("StudentClass.php");
    
    $student = $sc->get_student();
    $sc->edit_student();

?>

<!DOCTYPE html>
<html lang="en">

    <?php include("components/header.php")?>

    <form action="editStudent.php" method="POST">
        <div>
            <input type="hidden" name="id" value=<?php echo $student['id'] ?> >
        </div>
        <div>
            <input type="text" name="fullname" placeholder="Enter fullname" autocomplete="off" value=<?php echo $student['fullname'] ?> >
        </div>
        <div>
            <input type="date" name="birthdate" id="birtdate" placeholder="Enter birthdate" 
                value=<?php echo $student['birthdate']?> >
        </div>
        <div>
            <input type="number" name="age" id="age" placeholder="Enter age" 
                value=<?php echo $student['age']?> >
        </div>
        <div>
            <input type="submit" name="edit" value="Submit" >
        </div>
    </form>

</html>