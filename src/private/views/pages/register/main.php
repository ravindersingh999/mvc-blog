<?php
// echo '<pre>';
// var_dump($data);
// echo '</pre>';
?>
<main class="form-signin">
  <form method="POST" action="">
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

    <div class="form-floating">
      <input type="name" class="form-control" id="floatingInput" placeholder="username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="name" class="form-control" id="floatingInput" placeholder="Full Name" name="name">
      <label for="floatingInput">Full Name</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating text-danger">
        <?php echo isset($_SESSION['msg'])?$_SESSION['msg']:""; ?>
    </div>

    <div class="checkbox mb-3 mt-1">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Sign up</button>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
  </form>
</main>

