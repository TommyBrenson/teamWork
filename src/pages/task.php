<?php if (!$_COOKIE['user_id']) {header('Location: /src/pages/auth.php');}?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php require('../../src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #d4d4d4;' id="snow-animation-container">
  <!-- Header -->
  <?php require('../../src/components/header.php'); ?>

  <!-- Footer -->
  <?php require('../../src/components/footer.php'); ?>

  <section class="vh-100 gradient-custom" style="background-repeat: no-repeat; background-position: center; background-size: cover; background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="row pt-3">
      <div class="col-sm-4 mb-1">
        <div class="card ml-2">
          <div class="card-body">
            <h5 class="card-title">Список задач</h5>
            <h6 class="card-subtitle mb-2 text-muted">Не откладывай свои задачи, скорее выполняй их!</h6>
            <form method="post">
              <ul id="haveTask" class="list-group list-group-flush" style="overflow: auto; max-height:70vh;">
              </ul>
            </form>
            <button type="submit" id="trashAllNotReady" class="btn btn-primary">Очистить список</button>
            <button type="submit" id="readyAll" class="btn btn-primary">Выполнить все задачи</button>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mb-1">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Выполненые задачи</h5>
            <h6 class="card-subtitle mb-2 text-muted">Тут находятся выполненные задачи. Увеличь их количество!</h6>
            <ul class="list-group list-group-flush" id="haveTaskReady" style="overflow: auto; max-height:70vh;">
            </ul>
            <div class="mt-1">
              <button type="submit" id="trashAllReady" class="btn btn-primary">Очистить список</button>
              <button type="submit" id="noReadyAll" class="btn btn-primary">Отметить все задачи как "не выполненные"</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mb-6">
        <div class="card mr-2" style=" max-height:70vh;">
          <div class="card-body">
            <h5 class="card-title">Добавить задачу</h5>
            <h6 class="card-subtitle mb-2 text-muted">Готов совершать новые подвиги!?</h6>
            <form method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="taskValue" placeholder="name@example.com">
                <label for="floatingInput">Название задачи</label>
              </div>
              <div class="form-floating">
                <textarea class="form-control" id="comment" placeholder="Leave a comment here" style="height: 200px; max-height: 45vh;" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Укажите комментарий, чтобы не запутаться!</label>
              </div>
              <button id="addTask" type="submit" class="btn btn-success mt-2">Добавить задачу</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
      <div id="liveToastDanger" class="toast bg-danger hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
          Укажите название вашей задачи!
          <button type="button" class="btn-close float-right" data-bs-dismiss="toast" aria-label="Закрыть"></button>
        </div>
      </div>
    </div>

    <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
      <div id="liveToast" class="toast bg-success hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
          Задача добавлена, ждем выполнения!
          <button type="button" class="btn-close float-right" data-bs-dismiss="toast" aria-label="Закрыть"></button>
        </div>
      </div>
    </div>
  </section>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.14/highcharts.js"></script>
  <script src="https://rawgit.com/gionkunz/chartist-js/master/dist/chartist.min.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
  <!-- snow -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script>
    $(document).ready(function() {
      // Show Tasks
      function loadTasks() {
        $.ajax({
          url: "./task/showTask.php",
          type: "POST",
          success: function(data) {
            $("#haveTask").html(data);
          }
        });
      };

      function loadTasksReady() {
        $.ajax({
          url: "./task/showTaskReady.php",
          type: "POST",
          success: function(data) {
            $("#haveTaskReady").html(data);
          }
        });
      };

      loadTasksReady();
      loadTasks();

      // Add Task
      $("#addTask").on("click", function(e) {
        e.preventDefault();
        var task = $("#taskValue").val();
        var commtask = $("#comment").val();
        if (task != '') {
          $.ajax({
            url: "./task/addTask.php",
            type: "POST",
            data: {
              task: task,
              commtask: commtask
            },
            success: function(data) {
              loadTasks();
              $("#taskValue").val('');
              $("#comment").val('');
              $('#liveToast').toast('show');
              if (data == 0) {
                alert("Something wrong went. Please try again.");
              }
            }
          });
        } else {
          $('#liveToastDanger').toast('show');
        }
      });

      // Remove Task
      $(document).on("click", "#removeBtnNR", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
          url: "./task/removetask.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });

      $(document).on("click", "#removeBtnR", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
          url: "./task/dontRemuveTask.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });

      $(document).on("click", "#trashBtnNR", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
          url: "./task/trash.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });

      //trashAllReady
      $(document).on("click", "#trashAllReady", function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          url: "./task/trashAllReady.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });

      //trashAllNotReady
      $(document).on("click", "#trashAllNotReady", function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          url: "./task/trashAllNotReady.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });

      //allReady
      $(document).on("click", "#readyAll", function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          url: "./task/allReady.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });

      //allNotReady
      $(document).on("click", "#noReadyAll", function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
          url: "./task/allNotReady.php",
          type: "POST",
          data: {
            id: id
          },
          success: function(data) {
            loadTasks();
            loadTasksReady();
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          }
        });
      });
    });
  </script>

  <script>
    $('.toast .btn-close').on('click', function() {
      $(this).parent().parent().hide()
    })
  </script>

</body>
</html>