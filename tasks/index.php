<?php require_once '../inc/header.php';?>
<?php require_once '../inc/conn.php';?>
<?php require_once '../inc/functions.php';
check_login();
$user_id = $_SESSION['user_id'];
$query = "select * from tasks where user_id = $user_id";
$result = mysqli_query($conn, $query);


?>


  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="mb-0">My Tasks</h3>
      <div>
        <span class="me-2">Hello, <?php echo $_SESSION['user_name'];?></span>
        <a class="btn btn-outline-danger btn-sm" href="../auth/logout.php">Logout</a>
      </div>
    </div>

    <div class="card shadow-sm mb-3">
      <div class="card-body">
        <h5 class="mb-3">Add Task</h5>
        <?php require_once '../errors/errors.php';?>
    <?php require_once '../errors/success.php';?>

        <form action="store.php" method="POST" class="row g-2">
          <div class="col-md-5">
            <input name="title" class="form-control" placeholder="Task title" value="<?php if (isset($_SESSION['title'])) echo $_SESSION['title']; ?>" />
          </div>
          <div class="col-md-5">
            <input name="description" class="form-control" placeholder="Short description" value=" <?php if (isset($_SESSION['description'])) echo $_SESSION['description']; ?>"/>
          </div>
          <div class="col-md-2">
            <button type="submit" name="submit" class="btn btn-primary w-100">Add</button>
          </div>
        </form>
      </div>
    </div>

   
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>



            <?php
            if (mysqli_num_rows($result) >= 1) {
              $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach($tasks as $task){

?>
              <tr>
                <td><?php echo $task['id'] ;?></td>
                <td><?php echo $task['title'] ;?></td>
                <td><?php echo $task['description'] ;?></td>
                <td><span class="badge <?php echo ($task['status'] == 'pending') ? ' bg-warning' : 'bg-success' ?>  text-dark"><?php echo $task['status'] ;?></span></td>
                <td class="text-end d-flex justify-content-end align-items-center gap-3">

                <?php if ($task['status'] == 'pending'): ?>
    <a class="btn btn-sm btn-success" href="toggle.php?id=<?= $task['id'] ?>">
        Mark Done
    </a>
<?php else: ?>
    <a class="btn btn-sm btn-warning" href="toggle.php?id=<?= $task['id'] ?>">
        Mark Pending
    </a>
<?php endif; ?>  

                  <a class="btn btn-sm btn-secondary" href="edit.php?id=<?php echo $task['id'] ;?>">Edit</a>

<form action="delete.php?id=<?php echo $task['id'] ;?>" method="POST">

<button
type="submit" name="submit" class="btn btn-sm btn-danger"> delete</button>
</form>

                </td>
              </tr>
              <?php
}


            }


            else{
              ?>

<div class="alert alert-danger"> You have no tasks</div>
<?php
            }
            
            ?>
            
        
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
