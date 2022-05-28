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
$sql = "SELECT * FROM `zametki` WHERE `id_user`= $id_user";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>
        <form method="POST" class="formChangeZametki" id="formChangeZametki">
            <div class="form-group" style="max-height:700px;">
                <label for="exampleFormControlTextarea1">Поле для ваших заметок...</label>
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" name="main_text" rows="10" style="max-height:550px;"><?php echo $row['main_text']; ?></textarea>
            </div>
        </form>
        <button type="button" id="saveCangeZametki" class="btn btn-primary">Сохранить</button>
    <?php
    }
} else {
    ?>
    <h6 class="card-subtitle mt-2 mb-2 text-muted">Нет дейтсующих заметок!</h6>
<?php
}
?>