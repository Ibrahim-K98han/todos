<?php
header("Access-Control-Allow-Origin: *");
include './connection.php';

if(isset($_POST['id']) && isset($_POST['user_id'])){
    $id = $_POST['id'];
    $userId = $_POST['user_id'];

    $sql = "DELETE FROM todos WHERE id = '$id' and user_id = '$userId'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $data = [
            'success' => true,
            'message' => 'Todo deleted successfully'
        ];
    }else{
        $data = [
            'success' => false,
            'message' => 'Todo deleting failed'
        ];
    }
    echo json_encode($data);
}else{
    $data = [
        'success' => false,
        'message' => 'Please fill all the fields'
    ];
    echo json_encode($data);
}

?>