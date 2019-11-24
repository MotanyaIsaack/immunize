<?php
    include_once('../../database/connection.php');
    session_start();

    //Function that checks if a user is registered
    function checkIfUserExists($conn,$data)
    {
        $sql = "SELECT password FROM tbl_users 
                WHERE email='".$data['email']."'";
        $result = $conn->query($sql);
        $hash = $result->fetch_all(MYSQLI_ASSOC);
        return (password_verify($data['password'],$hash[0]['password']) ? true : false);
    }
    //Function that gets the role of a user from user data
    function getUserData($conn,$data){
        $sql = "SELECT * FROM tbl_users
                WHERE email = '".$data['email']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }
    
    //Function that sets session on login
    function setSessions($userData){
        $_SESSION['user_id'] = $userData[0]['user_id'];
        $_SESSION['role_id'] = $userData[0]['role_id'];
        $_SESSION['fullname'] = $userData[0]['fullname'];
        $_SESSION['email'] = $userData[0]['email'];
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = [
            'email' => $email,
            'password' => $password
        ];
        if(checkIfUserExists($conn,$data) == TRUE){
            $userData = getUserData($conn,$data);
            switch ($userData[0]['role_id']) {
                case 4:
                    setSessions($userData);
                    header("Location: ../../nurse/dashboard.php");
                    break;
                case 5:
                    setSessions($userData);
                    header("Location: ../../supernurse/dashboard.php");
                    break;
                default:
                setSessions($userData);
                    header("Location: ../../parent/dashboard.php");
                    break;
            }

        }
        

    }
?>