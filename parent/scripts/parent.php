<?php
include_once('../../database/connection.php');
session_start();
//Function that checks if a child exists
function checkIfChildExists($conn,$data){
    $sql = "SELECT * FROM tbl_child WHERE child_name = '".$data['child_name']."'
            AND dob='".$data['dob']."' AND gender='".$data['gender']."'
            AND user_id = ".$data['user_id']."";
    $result = $conn->query($sql);
    return ($result->num_rows>0 ? true : false);
}
// Function to insert data to our child table
function insertChild($conn,$data){
    $sql = "INSERT INTO `tbl_child` (`child_id`,`child_name`,`dob`,`gender`,`blood-group`,`user_id`) 
            VALUES(NULL,'".$data['child_name']."','".$data['dob']."','".$data['gender']."',
                    '".$data['blood-group']."',".$data['user_id'].")";
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
        case 'addChild':
            call_user_func(
                function ($conn){
                    $sirname = $_POST['sirname'];
                    $firstname = $_POST['firstname'];
                    $othername = $_POST['othername'];
                    $fullname = $sirname ." ".$firstname." ".$othername; 
                    $dob = $_POST['dob'];
                    $gender = $_POST['gender'];
                    $bloodgroup = $_POST['bloodgroup'];
                    $user_id = $_SESSION['user_id'];
                    $data = [
                        'child_name' => $fullname,
                        'dob' => $dob,
                        'gender' => $gender,
                        'blood-group' => $bloodgroup,
                        'user_id' => $user_id
                    ];
                    if(!checkIfChildExists($conn,$data) === true){
                        echo (insertChild($conn,$data) === TRUE ? 
                                json_encode(['msg' => "success",'data' => $data['child_name']." Added Successfully"]) :
                                json_encode(['msg' => "danger",'data' => "An error occured"]));
                    }else{
                        echo json_encode(['msg' => "danger",'data' => $data['child_name']." Already Exists"]) ;
                    }
                },$conn
            );
        break;
        case 'listChildren': 
            call_user_func(
                function ($conn){
                    $sql = "SELECT * FROM tbl_child WHERE user_id=".$_SESSION['user_id']."";
                    $results = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                    $count = 0;
                    foreach ($results as $result => $value) {
                        $results[$result]['number'] = ++$count;
                        $results[$result]['actions'] = 
                        '
                            <button type="button" class="btn btn-xs btn-primary mr-5 mb-5">
                            <i class="si si-eye mr-5"></i>View More
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