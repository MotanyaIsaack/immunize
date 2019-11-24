<?php
include_once('../../database/connection.php');
session_start();
//Function that checks if a user is registered
function checkIfUserExists($conn,$data)
{
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
                    // die(var_dump($firstname));
                    $lastname = (!empty($_POST['lastname']) ? $_POST['lastname'] : false);
                    $fullname = $firstname." ".$lastname;
                    $email = (!empty($_POST['email']) ? $_POST['email'] : false);
                    $phonenumber = (!empty($_POST['phonenumber']) ? $_POST['phonenumber'] : false);
                    $username = (!empty($_POST['username']) ? $_POST['username'] : false);
                    $password = (!empty($_POST['password']) ? password_hash($_POST['password'],PASSWORD_DEFAULT) : false);
                    $bloodgroup = (!empty($_POST['bloodgroup']) ? $_POST['bloodgroup'] : false);
                    $roleID = 4;
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
                            echo (insertNurse($conn,$data) === TRUE ? 
                                    json_encode(['msg' => "success",'data' => $data['fullname']." Added Successfully"]) :
                                    json_encode(['msg' => "danger",'data' => "An error occured"]));
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
                    foreach ($results as $result => $value) {
                        $results[$result]['number'] = ++$count;
                        $results[$result]['actions'] = 
                        '
                            <button type="button" class="btn btn-xs btn-primary mr-5 mb-5">
                            <i class="si si-eye mr-5"></i>Suspend
                            </button>
                        ';
                    }
                    echo json_encode($results);
                },$conn
            );
        break;
        default:
            break;
    }
}

?>