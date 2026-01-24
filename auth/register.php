<?php require_once '../inc/header.php';?>
  <div class="container py-5">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h3 class="mb-3">Create account</h3>

        <!-- alerts placeholder -->
        <?php require_once '../inc/conn.php';?>
         <?php require_once '../errors/errors.php';?>
         


        <form action = "handle_register.php" method="POST">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" class="form-control" placeholder="mamdouh" value="<?php  if (isset($_SESSION['name'])) echo $_SESSION['name'];?>" />
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email"  class="form-control" placeholder="mamdouh@example.com" value="<?php  if (isset($_SESSION['email'])) echo $_SESSION['email'];unset($_SESSION['email']);?>"" />
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" class="form-control" placeholder="******" type="password" />
          </div>

          <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <p class="mt-3 mb-0">
          Already have account? <a href="login.html">Login</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
