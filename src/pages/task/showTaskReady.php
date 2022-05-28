<?php
            
    $id_user = $_COOKIE['user_id'];
            
    $server = "localhost";
    $username = "root";
    $password = "00g65O2317";
    $database = "myself_progress_bd";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }

            $sql = "SELECT * FROM `task` WHERE `id_user`= $id_user AND `ready_task`= 1";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            
                ?>


                <li class="list-group-item">
                    <div class="form-check ml-0 pl-0">
                    <label class="form-check-label" for="flexCheckDefault" data-toggle="tooltip" data-placement="right" title="<?php echo $row['comment_task']; ?>">
                    <strike><?php echo $row['name_task']; ?></strike>
                    </label>
                    <button type="submit" id="removeBtnR" class="btn btn-warning float-left" data-id="<?php echo $row['id_task']; ?>"><i class="fa fa-arrow-left"></i></button>
                    <button type="submit" id="trashBtnNR" class="btn btn-danger float-right" data-id="<?php echo $row['id_task']; ?>"><i class="fa fa-trash-o"></i></button>

                    </div>
                </li>
            
                <?php
                }
            
             } 
             else{
                ?> 
                <h6 class="card-subtitle mt-2 mb-2 text-muted">Выполненные задачи отсутствую! Скорее выполняй их...</h6>
            <?php
            }
?>