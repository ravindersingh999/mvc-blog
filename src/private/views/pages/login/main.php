<main class="form-signin">
  <form action="" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <div class="form-floating text-danger">
      <?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ""; ?>
    </div>
    <button class="w-100 btn btn-lg btn-success" name="login" type="submit">Sign in</button>
  </form>
  <p class="mt-2">New User?<a href="register">Sign Up</a></p>
  
  <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</main>