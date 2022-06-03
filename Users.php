<?php
    include ('connect.php');
    class User extends Database{
            function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool 
        {
            return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
        }

        function isValidTelephoneNumber(string $telephone, int $minDigits = 9, int $maxDigits = 14): bool 
        {
            $telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone); 
        
            return $this->isDigits($telephone, $minDigits, $maxDigits); 
        }

        public function getInfoByNumPhone(string $numPhone)
        {
            return $this->get_data("SELECT * FROM users WHERE num_phone = '$numPhone'");
        }

        public function getInfoUsers()
        {
            $sql = "SELECT * FROM users";
            $data = $this->get_data($sql);
            return $data;
        }

        public function getInfoUserById($userId)
        {
            $sql = "SELECT * FROM users WHERE id = '$userId'";
            $data = $this->get_data($sql)[0];
            return $data;
        }

        public function uploadAvatar($data)
        {
            if(!isset($_FILES['image'])){
                return 'You have not selected avatar !';
            }

            $temp_name = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $type = explode('/', $_FILES['image']['type']);
            $extension = end($type);
            $allowed = ['png', 'jpg', 'jpeg', 'jfif'];

            if(!in_array($extension, $allowed)){
                return 'File phải có định dạng png, jpg, jpeg, ifif ';
            }

            if($file_size >= 5000000){
                return 'Dung lượng file quá lớn !';
            }
            
            
            $path = '../img/avatar/' . $data . '.' . $extension;

            $is_upload_success = move_uploaded_file($temp_name, $path);

            if(!$is_upload_success){
                return 'Thêm ảnh thất bại !';
            }

            return '';

        }

        public function insertUser($data)
        {
            $name = trim($data['name']);
            $fullName = trim($data['full-name']);
            $email = trim($data['email']);
            $phone = trim($data['phone']);
            $pass = trim($data['password']);
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            $gender = trim($data['gender']);

            if(empty($name) || empty($email) || empty($fullName) || empty($phone) || empty($pass) || empty($gender)){

                echo "<script>alert('You have to enter infomation!!!')</script>";
                return;
            }

            $isNum = is_numeric($phone) ;
            if(!$isNum){
                echo "<script>alert('Number Phone does not contain character !!!')</script>";
                return;
            }


            $isPw = strpos($pass, ' ');
            if($isPw){
                echo "<script>alert('Password does not contain spaces !!!')</script>";
                return;
            }

            if(count($this->getInfoByNumPhone($phone)) > 0) {
                echo '<script>alert("Number phone is exists !")</script>';
                return;
            }

            // if(!isset($_FILES['image'])){
            //     return 'File ảnh không tồn tại !';
            // }
            $upAvatar = $this->uploadAvatar($name);
                if (strlen($upAvatar) > 0) {
                    echo "<script>alert('" . $upAvatar . "')</script>";
                    return;
                }

            $type = explode('/', $_FILES['image']['type']);
            $image = $name . '.' . end($type);

            $user = [
                'username'              => $name,
                'full_name'             => $fullName,
                'password_current'      => $pass,
                'email'                 => $email,
                'num_phone'             => $phone,
                'image'                 => $image,
                'password_hash'         =>$pass_hash,
                'gender'                => $gender,
                'permission'            => 1,
            ];

            $insert = $this->insert('users', $user);

            if($insert){
                echo '<script>alert("Register is SUCCESS !");
                        window.location = ("userLogin.php");
                        </script>';
                // echo '<script></script>';
                return;
            }
            else{
                echo '<script>alert("Register is NOT SUCCESS !")</script>';
                return;
            }

        }

        public function deleteUser($id)
        {
            $delete = $this->delete('users', 'id= ' . $id);
            
            if($delete){
                echo    '<script>
                            alert("Delete is SUCCESS !");
                            window.location = ("userList.php");
                        </script>';
                return;
            }
            else{
                // echo    '<script>
                //             alert("Delete is not SUCCESS !");
                //             window.location = ("userDelete.php");
                //         </script>';
                echo "Xóa không thành công!!!";
                return;
            }
        }

        public function updateUser($data, $userId)
        {
            $name = trim($data['name']);
            $fullName = trim($data['full-name']);
            $email = trim($data['email']);
            $phone = trim($data['phone']);
            $pass = trim($data['password']);
            $gender = trim($data['gender']);

            if(empty($name) || empty($email) || empty($fullName) || empty($phone) || empty($pass) || empty($gender)){

                echo "<script>alert('You have to enter infomation!!!')</script>";
                return;
            }

            $isNum = is_numeric($phone) ;
            if(!$isNum){
                echo "<script>alert('Number Phone does not contain character !!!')</script>";
                return;
            }


            $isPw = strpos($pass, ' ');
            if($isPw){
                echo "<script>alert('Password does not contain spaces !!!')</script>";
                return;
            }

            if(count($this->getInfoByNumPhone($phone)) > 1) {
                echo '<script>alert("Number phone is exists !")</script>';
                return;
            }

            $upAvatar = $this->uploadAvatar($name);
                if (strlen($upAvatar) > 0) {
                    echo "<script>alert('" . $upAvatar . "')</script>";
                    return;
                }

            $type = explode('/', $_FILES['image']['type']);
            $image = $name . '.' . end($type);

            $user = [
                'username'              => $name,
                'full_name'             => $fullName,
                'password_current'      => $pass,
                'email'                 => $email,
                'num_phone'             => $phone,
                'image'                 => $image,
                'gender'                => $gender,
                'permission'            => 1,
            ];

            $update = $this->update('users', $user, 'id = "'. $userId . '"');

            if($update){
                echo    '<script>
                            alert("Update is SUCCESS !");
                            window.location = ("userList.php");
                        </script>';
                return;
            }
            else{
                echo    '<script>
                            alert("Update is not SUCCESS !");
                            window.location = ("userList.php");
                        </script>';
                return;
            }

        }

        public function login($numPhone, $password)
        {
            $numP = $this->getInfoByNumPhone($numPhone);
            if(!count($numP)) {
                echo '<script>alert("Number phone not exist !!!")</script>';
                return [
                    'num_phone' => $numPhone,
                    'password' => $password
                ];
            }

            if(!password_verify($password, $numP[0]['password_hash'])) {
                echo '<script>alert("Incorrect password !!!")</script>';
                return [
                    'num_phone' => $numPhone,
                    'password' => $password
                ];
            }
            $_SESSION['role'] = $numP[0]['permission'];
            $_SESSION['username'] = $numP[0]['username'];
            $_SESSION['id'] = $numP[0]['id'];
            $_SESSION['avatar'] = $numP[0]['image'];

            echo '<script>alert("Login success !!!"); window.location="./index.php";</script>';
                return;
        }

        public function logout()
        {
            session_destroy();
            var_dump($_SESSION);
            if(!isset($_SESSION['role'])){
                echo '<script>alert("Đăng xuất thành công");</script>';
                echo '<script>window.location="index.php";</script>';
                return;
            }

        }

    }
?>