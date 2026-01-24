<?php require_once '../inc/header.php';?>
<?php require_once '../inc/conn.php';?>
<?php require_once '../inc/functions.php';
check_login();
$user_id = $_SESSION['user_id'];
if(!isset($_GET['id'])){
    redirect("index.php");
    exit();
}else{
$task_id = $_GET['id'];
$query = "select * from tasks where user_id = $user_id and id = $task_id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 1){
    $task = mysqli_fetch_assoc($result);
}else{
    redirect("index.php");
    exit();

}
}
?>

  <div class="container py-5">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h3 class="mb-3">Edit Task</h3>
        <?php require_once '../errors/errors.php';?>
    <?php require_once '../errors/success.php';?>

        <form action = "handle_edit.php?id=<?php echo $task['id']; ?>" method="POST">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" class="form-control" value="<?php echo $task['title']; ?>" />
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <input name="description" class="form-control" value="<?php echo $task['description']; ?>" />
          </div>

          <button name="submit" type="submit" class="btn btn-primary">Update</button>
          <a class="btn btn-light" href="index.php">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>