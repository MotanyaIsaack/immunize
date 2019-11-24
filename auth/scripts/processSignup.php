<?php
    include_once('../../database/connection.php');
    session_start();
    if (isset($_GET['function'])) {
        switch ($_GET['function']) {
            case 'getRoles':
                call_user_func(
                    function ($conn){
                        $msg = "";
                        $sql = "SELECT * FROM tbl_roles WHERE role_name!='Supernurse'";
                        $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                        echo (empty($result) ? json_encode(['msg'=>'Error']) : json_encode(['msg'=>'Success','result'=>$result]));
                    },$conn
                );
                break;
            
            default:
                break;
        }
    }
    //Function that checks if a user is registered
    function checkIfUserExists($conn,$data)
    {
        $sql = "SELECT * FROM tbl_users 
                WHERE email='".$data['email']."' AND username='".$data['username']."'";
        $result = $conn->query($sql);
        return ($result->num_rows>0 ? true : false);
    }
    //Function to process signup
    if (isset($_POST['signup'])) {
        $firstname = (!empty($_POST['firstname']) ? $_POST['firstname'] : false);
        $lastname = (!empty($_POST['lastname']) ? $_POST['lastname'] : false);
        $fullname = $firstname." ".$lastname;
        $email = (!empty($_POST['email']) ? $_POST['email'] : false);
        $phonenumber = (!empty($_POST['phonenumber']) ? $_POST['phonenumber'] : false);
        $username = (!empty($_POST['username']) ? $_POST['username'] : false);
        $password = (!empty($_POST['password']) ? password_hash($_POST['password'],PASSWORD_DEFAULT) : false);
        $bloodgroup = (!empty($_POST['bloodgroup']) ? $_POST['bloodgroup'] : false);
        $roleID = (!empty($_POST['role']) ? $_POST['role'] : false);
        $data = [
            'fullname' => $fullname,
            'email' => $email,
            'phonenumber' => $phonenumber,
            'username' => $username,
            'password' => $password,
            'bloodgroup' => $bloodgroup,
            'role_id' => $roleID
        ];

        if ($firstname=="false" || $lastname=="false" || $email == "false" || $username =="false" ||
         $password == "false" || $bloodgroup =="false" || $roleID=="false"){
             $_SESSION['error'] = "Please fill all the fields";
             header('Location: ../signup.php');
         }else{
            if (checkIfUserExists($conn,$data) == true) {
                $_SESSION['message'] = "User Exists";
                header('Location: ../signup.php');
            }else{
                switch ($roleID) {
                    case 1:
                        $sql = "INSERT INTO tbl_users(fullname,username,email,password,phonenumber,bloodgroup,role_id)
                            VALUES('".$fullname."','".$username."','".$email."','".$password."','".$phonenumber."','".$bloodgroup."'
                                        ,'".$roleID."')";
                        if ($conn->query($sql) === TRUE) {
                            $user_id = $conn->insert_id;
                            $parentSql = "INSERT INTO tbl_fatherbiodata(bloodgroup,user_id)
                            VALUES('".$bloodgroup."','".$user_id."')";
                            $conn->query($parentSql);
                            $_SESSION['message'] = "Registration Successful";
                            header('Location: ../login.php');
                        }else{
                            $_SESSION['message'] = "An Error Occured";
                            header('Location: ../signup.php');
                        }
                        break;
                    case 2:
                        $sql = "INSERT INTO tbl_users(fullname,username,email,password,phonenumber,bloodgroup,role_id)
                            VALUES('".$fullname."','".$username."','".$email."','".$password."','".$phonenumber."','".$bloodgroup."'
                                        ,'".$roleID."')";
                        if ($conn->query($sql) === TRUE) {
                            $user_id = $conn->insert_id;
                            $parentSql = "INSERT INTO tbl_motherbiodata(bloodgroup,user_id)
                            VALUES('".$bloodgroup."','".$user_id."')";
                            $conn->query($parentSql);
                            $_SESSION['message'] = "Registration Successful";
                            header('Location: ../login.php');
                            exit();
                        }else{
                            $_SESSION['message'] = "An Error Occured";
                            header('Location: ../signup.php');
                            exit();
                        }
                        break;
                    case 3:
                        $sql = "INSERT INTO tbl_users(fullname,username,email,password,phonenumber,bloodgroup,role_id)
                            VALUES('".$fullname."','".$username."','".$email."','".$password."','".$phonenumber."','".$bloodgroup."'
                                        ,'".$roleID."')";
                        if ($conn->query($sql) === TRUE) {
                            $user_id = $conn->insert_id;
                            $parentSql = "INSERT INTO tbl_guardianbiodata(bloodgroup,user_id)
                            VALUES('".$bloodgroup."','".$user_id."')";
                            $conn->query($parentSql);
                            $_SESSION['message'] = "Registration Successful";
                            header('Location: ../login.php');
                            exit();
                        }else{
                            $_SESSION['message'] = "An Error Occured";
                            header('Location: ../signup.php');
                            exit();
                        }
                        break;
                    case 4:
                        $sql = "INSERT INTO tbl_users(fullname,username,email,password,phonenumber,bloodgroup,role_id)
                            VALUES('".$fullname."','".$username."','".$email."','".$password."','".$phonenumber."','".$bloodgroup."'
                                        ,'".$roleID."')";
                        if ($conn->query($sql) === TRUE) {
                            $user_id = $conn->insert_id;
                            // $parentSql = "INSERT INTO tbl_guardianbiodata(bloodgroup,user_id)
                            // VALUES('".$bloodgroup."','".$user_id."')";
                            // $conn->query($parentSql);
                            $_SESSION['message'] = "Registration Successful";
                            header('Location: ../login.php');
                            exit();
                        }else{
                            $_SESSION['message'] = "An Error Occured";
                            header('Location: ../signup.php');
                            exit();
                        }
                        break;
                    
                    default:
                        break;
                }
            }
         
         }
    }
?>