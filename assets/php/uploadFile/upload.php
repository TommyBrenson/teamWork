<?php  
$id_user = $_COOKIE['user_id'];
$sname = "localhost";
$uname = "root";
$password = "00g65O2317";

$db_name = "myself_progress_bd";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}


# check if image sent
if (isset($_FILES['my_image'])) {

	
	# getting image data and store them in var
	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error    = $_FILES['my_image']['error'];

	# if there is not error occurred while uploading
	if ($error === 0) {
		if ($img_size > 1000000) {
			# error message
			$em = "Вы пытаетесь загрузить файл большого размера!";

			# response array
			$error = array('error' => 1, 'em'=> $em);



		    echo json_encode($error);
		    exit();
		}else {
			# get image extension store it in var
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

	
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
			if (in_array($img_ex_lc, $allowed_exs)) {

				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

				# crating upload path on root directory
				$img_upload_path = "../../../uploads/".$new_img_name;

				# move uploaded image to 'uploads' folder
				move_uploaded_file($tmp_name, $img_upload_path);

				# inserting imge name into database

                $sql = "UPDATE users SET img ='$new_img_name' WHERE id_user = $id_user";
                mysqli_query($conn, $sql);
                
                # response array
				$res = array('error' => 0, 'src'=> $new_img_name);

                echo json_encode($res);
			    exit();

			}else {
				# error message
				$em = "Вы пытаетесь загрузить файл недопустимого формата!";

				# response array
				$error = array('error' => 1, 'em'=> $em);


			    echo json_encode($error);
			    exit();
			}
		}
	}else {
		# error message
		$em = "Не известная ошибка! Обратитесь к администратору сервиса...";

		# response array
		$error = array('error' => 1, 'em'=> $em);
	    echo json_encode($error);
	    exit();
	}
}



?>
