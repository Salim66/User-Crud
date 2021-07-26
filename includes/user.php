<?php require_once('init.php'); ?>
<?php

    // assign variable 
    $status = '';
    if(isset($_GET['status'])){
        $status = $_GET['status'];
    }
 
    // Check whether the user request add or not
    if($status == 'add'){
        // Check whether the form submitted or not
        if(isset($_POST['name'])){
            
            // Get user form data
            $name    = $_POST['name'];
            $email   = $_POST['email'];
            $phone   = $_POST['phone'];
            $address = $_POST['address'];

            if(!empty($_FILES['photo'])){
                $img_name  = $_FILES['photo']['name'];
                $tmp_name  = $_FILES['photo']['tmp_name'];

                $explode           = explode('.', $img_name);
                $unique_photo_name = md5(time().rand()).'.'.$explode[1];

                if(move_uploaded_file($tmp_name, UPLOADS_PATH.$unique_photo_name)){
                    echo "File uploaded successfully ):";
                }else {
                    echo "File not uploaded, Plese try again!";
                }
            }

            // Database query
            $sql  = "INSERT INTO users (name, email, phone, address, photo) ";
            $sql .= " VALUES ('{$name}', '{$email}', '{$phone}', '{$address}', '$unique_photo_name')";
            $result_set = $connection->query($sql);

            if($result_set){
                echo "User added successfully ):";
            }else {
                echo "Something wasn't wrong, Plese try again!";
            }

        }
    }


    // check whether the user request all or not
    if($status == 'all'){
        
        $sql = "SELECT * FROM users";
        $result_set = $connection->query($sql);

        $user_array = [];

        while($data = $result_set->fetch_assoc()){
            array_push($user_array, $data);
        }

        echo json_encode($user_array);

    }


    // Check whether the user request delete or not
    if($status == 'delete'){
        
        // Get url id
        $id = $_GET['id'];
        
        if($id){

            $sql1 = "SELECT * FROM users WHERE id=$id";
            $user = $connection->query($sql1);

            $result = $user->fetch_assoc();

            $sql = "DELETE FROM users WHERE id=$id";
            $result_set = $connection->query($sql);
            

            if($result_set){
                if(file_exists(UPLOADS_PATH).$result['photo']){
                    unlink(UPLOADS_PATH.$result['photo']);
                }
                echo "User deleted successfully ):";
            }else {
                echo "Something wasn't wrong, Plese try again!";
            }
        }

    }


    // Check whether the user request view or not
    if($status == 'view'){
        
        // Get url data
        $id = $_GET['id'];

        if($id){
            $sql1 = "SELECT * FROM users WHERE id=$id";
            $user = $connection->query($sql1);

            $result = $user->fetch_assoc();
            echo json_encode($result);
        }

    }


    // Check whether the user request edit or not
    if($status == 'edit'){
        
        // Get url data
        $id = $_GET['id'];

        if($id){
            $sql1 = "SELECT * FROM users WHERE id=$id";
            $user = $connection->query($sql1);

            $result = $user->fetch_assoc();
            echo json_encode($result);
        }

    }


    // Check whether the user request update or not
    if($status == 'update'){

        // Check whether the user update form submitted or not
        if(isset($_POST['name'])){
            
            // Get user form data
            $id      = $_POST['id'];
            $name    = $_POST['name'];
            $email   = $_POST['email'];
            $phone   = $_POST['phone'];
            $address = $_POST['address'];
            // print_r($_FILES['photo']);

            // echo $id." ".$name ." ". $email ." ".$phone." ".$address;

            // Find edit user
            $sql1 = "SELECT * FROM users WHERE id=$id";
            $user = $connection->query($sql1);
            $result = $user->fetch_assoc();

            

            if(!empty($_FILES['photo']['name'])){
                $img_name  = $_FILES['photo']['name'];
                $tmp_name  = $_FILES['photo']['tmp_name'];

                $explode           = explode('.', $img_name);
                $unique_photo_name = md5(time().rand()).'.'.$explode[1];

                if(move_uploaded_file($tmp_name, UPLOADS_PATH.$unique_photo_name)){

                    if(file_exists(UPLOADS_PATH).$result['photo'] && !empty($result['photo'])){
                        unlink(UPLOADS_PATH.$result['photo']);
                    }

                    echo "File uploaded successfully ):";

                }else {

                    echo "File not uploaded, Plese try again!";

                }
            }else {
                $unique_photo_name = $result['photo'];
            }

            // Database query
            $sql  = "UPDATE users SET";
            $sql .= " name='{$name}', email='{$email}', phone='{$phone}', address='{$address}', photo='$unique_photo_name'";
            $sql .= " WHERE id={$id}";
            $result_set = $connection->query($sql);

            if($result_set){
                echo "User updated successfully ):";
            }else {
                echo "Something wasn't wrong, Plese try again!";
            }

        }

    }



    // Check whether the user request search or not
    if($status == 'search'){
       
        $search    = $_POST['search'];

        
        if(!empty($search)){
            $sql = "SELECT * FROM users WHERE name LIKE '%{$search}%' OR email LIKE '%{$search}%' OR address LIKE '%{$search}%' OR phone LIKE '%{$search}%'";
        }else {
            $sql = "SELECT * FROM users";
        }

        $result_set = $connection->query($sql);

        $user_array = [];

        while($data = $result_set->fetch_assoc()){
            array_push($user_array, $data);
        }

        echo json_encode($user_array);

    }
    

?>