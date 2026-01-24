<?php require_once '../inc/header.php';?>

  <div class="container py-5">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h3 class="mb-3">Login</h3>

        <?php require_once '../inc/conn.php';?>
         <?php require_once '../errors/errors.php';?>
         <?php require_once '../errors/success.php';?>
         
         <form action = "handle_login.php" method="POST">
         <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email"  class="form-control" placeholder="mamdouh@example.com" value="<?php  if (isset($_SESSION['email'])) echo $_SESSION['email'];?>"" />
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" class="form-control" placeholder="******" type="password" />
          </div>

          <button  type="submit" name="submit" class="btn btn-dark w-100">Login</button>
        </form>

        <p class="mt-3 mb-0">
          No account? <a href="register.php">Register</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
