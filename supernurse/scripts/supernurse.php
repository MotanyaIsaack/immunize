<?php
// Include the database connection file
include_once('../../database/connection.php');
// Include the send_email file
include_once('../../global_scripts/sendmail.php');
session_start();
//Function that checks if a user is registered
function checkIfUserExists($conn,$data){
    $sql = "SELECT * FROM tbl_users 
            WHERE email='".$data['email']."' AND username='".$data['username']."'";
    $result = $conn->query($sql);
    return ($result->num_rows>0 ? true : false);
}
// Function to insert data to our child table
function insertNurse($conn,$data){
    $sql = "INSERT INTO tbl_users(fullname,username,email,password,phonenumber,bloodgroup,role_id)
            VALUES('".$data['fullname']."','".$data['username']."','".$data['email']."','".$data['password']."',
                    '".$data['phonenumber']."','".$data['bloodgroup']."',".$data['role_id'].")";
    return ($conn->query($sql) === true ? true : false);
}

// Function that suspends a user
function suspendUser($conn,$data){
    $sql = "UPDATE tbl_users SET status = 1 WHERE user_id = ".$data."";
    // echo die(json_encode($sql));
    $conn->query($sql);
    return ($conn->affected_rows > 0 ? true : false);

}
// Function that unsuspends a user
function unsuspendUser($conn,$data){
    $sql = "UPDATE tbl_users SET status = 0 WHERE user_id = ".$data."";
    // echo die(json_encode($sql));
    $conn->query($sql);
    return ($conn->affected_rows > 0 ? true : false);

}

if (isset($_GET['function'])) {
    switch ($_GET['function']) {
        case 'logout':
            call_user_func(
                function (){
                 session_destroy();
                 header('Location: ../../auth/login.php'); 
                }
            );
        break;
        case 'addNurse':
            call_user_func(
                function ($conn){
                    $firstname = (!empty($_POST['firstname']) ? $_POST['firstname'] : false);
                    $lastname = (!empty($_POST['lastname']) ? $_POST['lastname'] : false);
                    $fullname = $firstname." ".$lastname;
                    $email = (!empty($_POST['email']) ? $_POST['email'] : false);
                    $phonenumber = (!empty($_POST['phonenumber']) ? $_POST['phonenumber'] : false);
                    $username = (!empty($_POST['username']) ? $_POST['username'] : false);
                    $password = (!empty($_POST['password']) ? password_hash($_POST['password'],PASSWORD_DEFAULT) : false);
                    $bloodgroup = (!empty($_POST['bloodgroup']) ? $_POST['bloodgroup'] : false);
                    $roleID = 4;
                    $subject = "Login Credentials";
                    $contents = 
                    '
                        <div>
                            <p>Hello '.$fullname.',</p>
                            <p>You have been succesfully registered to Immunize please use the following as your credentials to login to the system.</p>
                            <p><strong>Email: </strong>'.$email.'</p>
                            <p><strong>Password: </strong>'.$_POST['password'].'</p>
                            <p>Do not reply to this email</p>
                            <p>Regards,</p>
                            <p>Immunize</p>
                        </div>
                    ';
                    $data = [
                        'fullname' => $fullname,
                        'email' => $email,
                        'phonenumber' => $phonenumber,
                        'username' => $username,
                        'password' => $password,
                        'bloodgroup' => $bloodgroup,
                        'role_id' => $roleID
                    ];
                    if ($firstname===false || $lastname===false || $email == false || $username ==false ||
                        $password == false || $bloodgroup ==false || $roleID==false){
                        echo json_encode(['msg' => "danger",'data' => "Please Fill In All Fields"]) ;
                        exit();
                    }else{
                        if(!checkIfUserExists($conn,$data) === true){
                            if(insertNurse($conn,$data) === TRUE ){
                                echo (send_mail($fullname,$email,$subject,$contents) === true ?
                                    json_encode(['msg' => "success",'data' => $data['fullname']." Added Successfully and email sent"]) :
                                    json_encode(['msg' => "danger",'data' => $data['fullname']." Added Successfully and email not sent"])
                                );
                                
                            }else{
                                echo json_encode(['msg' => "danger",'data' => "An error occured"]);
                            }
                        }else{
                            echo json_encode(['msg' => "danger",'data' => $data['fullname']." Already Exists"]) ;
                        }
                    }
                  
                },$conn
            );
        break;
        case 'listNurses': 
            call_user_func(
                function ($conn){
                    $sql = "SELECT * FROM tbl_users WHERE role_id=4";
                    $results = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                    $count = 0;
                    for ($i=0; $i < sizeof($results); $i++) { 
                        $results[$i]['number'] = ++$count;
                        if ($results[$i]['status'] === '0') {
                            $results[$i]['actions'] = 
                            '
                                <button type="button" id="action" data-value="suspend" class="btn btn-xs btn-primary mr-5 mb-5">
                                <i class="si si-lock mr-5"></i>Suspend
                                </button>
                            ';
                        }else{
                            $results[$i]['actions'] = 
                            '
                                <button type="button" id="action" data-value="unsuspend" class="btn btn-xs btn-primary mr-5 mb-5">
                                <i class="si si-lock-open mr-5"></i>Unsuspend
                                </button>
                            ';
                        }
                    }
                    echo json_encode($results);
                },$conn
            );
        break;
        case 'suspendNurse':
            call_user_func(
                function ($conn){
                    $data = $_POST['user_id'];
                    echo (suspendUser($conn,$data) === true ?
                            json_encode(['msg'=> 'success','data' => $_POST['fullname'].' has been successfully suspended']) :
                            json_encode(['msg'=> 'danger','data' => $_POST['fullname'].' has not been successfully suspended'])
                    );
                },$conn
            );
        break;
        case 'unsuspendNurse':
            call_user_func(
                function ($conn){
                    $data = $_POST['user_id'];
                    echo (unsuspendUser($conn,$data) === true ?
                            json_encode(['msg'=> 'success','data' => $_POST['fullname'].' has been successfully suspended']) :
                            json_encode(['msg'=> 'danger','data' => $_POST['fullname'].' has not been successfully suspended'])
                    );
                },$conn
            );
        break;
        default:
            break;
    }
}

?>