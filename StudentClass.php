<?php 

    class StudentClass {
        private $server = "mysql:host=localhost;dbname=new_tut";
        private $user = "root";
        private $password = "";
        private $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        protected $con;

        public function get_connection() {
            try{
                $this->con = new PDO($this->server, $this->user, $this->password, $this->options);
                return $this->con;
            }catch(PDOException $e) {
                echo "ERROR: " .$e.getMessage();
            }
        }

        // list of student
        public function student_list() {
            $con = $this->get_connection();
            $stmt = $con->prepare("SELECT * FROM new_student");
            $stmt->execute();
            $students = $stmt->fetchall();
            $count = $stmt->rowCount();
            if($count > 0) {
                return $students;
            }
            else {
                return 0;
            }
        }

        // add student 
        public function add_student() {
            if(isset($_POST['save'])) {
                $fname = htmlspecialchars($_POST['fullname']);
                $bdate = htmlspecialchars($_POST['birthdate']);
                $age = htmlspecialchars($_POST['age']);

                $con = $this->get_connection();
                $stmt = $con->prepare("INSERT INTO new_student (`fullname`, `birthdate`, `age`) VALUES (?,?,?)");
                $stmt->execute([ $fname, $bdate, $age ]);
                header('location: list.php');
            }
        } 

        // edit student
        public function edit_student() {
            if(isset($_POST['edit'])) {
                $id = htmlspecialchars($_POST['id']);
                $fname = htmlspecialchars($_POST['fullname']);
                $bdate = htmlspecialchars($_POST['birthdate']);
                $age = htmlspecialchars($_POST['age']);

                $con = $this->get_connection();
                $stmt = $con->prepare("UPDATE new_student SET `fullname`= '$fname', `birthdate`= '$bdate', `age`= '$age' WHERE id = ? ");
                $stmt->execute([ $id ]);
                header('location: list.php');
            }
        }

        public function get_student() {
            if(isset($_GET['id'])) {
                $id = htmlspecialchars($_GET['id']);

                $con = $this->get_connection();
                $stmt = $con->prepare("SELECT * FROM new_student WHERE id = $id ");
                $stmt->execute();
                $student = $stmt->fetch();
                $count = $stmt->rowCount();
                if($count > 0) {
                    return $student;
                }
                else {
                    return 0;
                }

            }
        }

        public function delete_student() {
            if(isset($_GET['id'])) {
                $id = htmlspecialchars($_GET['id']);

                $con = $this->get_connection();
                $stmt = $con->prepare("DELETE FROM new_student WHERE id = ? ");
                $success = $stmt->execute([ $id ]);
                if($success){
                    header('location: list.php');
                }
            }
        }

    }

    $sc = new StudentClass();

?>