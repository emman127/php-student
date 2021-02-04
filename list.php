<?php 

    include_once("StudentClass.php");

    $list = $sc->student_list();

?>

<!DOCTYPE html>
<html lang="en">

    <?php include("components/header.php")?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>FULLNAME</th>
                <th>BIRTHDATE</th>
                <th>AGE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $student): ?>
            <tr>
                <td><?php echo $student['id'] ?></td>
                <td><?php echo $student['fullname'] ?></td>
                <td><?php echo $student['birthdate'] ?></td>
                <td><?php echo $student['age'] ?></td>
                <td><a href="editStudent.php?id=<?php echo $student['id']?>">UPDATE</a></td>
                <td><a href="delete.php?id=<?php echo $student['id'] ?>">DELETE</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</html>