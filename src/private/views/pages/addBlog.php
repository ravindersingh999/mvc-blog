<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Dashboard Template · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



  <!-- Bootstrap core CSS -->
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="user">
                <span data-feather="home"></span>
                Blog
              </a>
            </li>

          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Blog</h1>
        </div>

        <form class="row g-3" method="POST" action="">
          <div class="col-md-7">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="col-md-7">
            <label for="content" class="form-label" >Blog Content</label>
            <input type="text" class="form-control" id="content" name="content" style=”height:100px;width:100px“>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary" name="add">Add Blog</button>
          </div>
        </form>
      </main>
    </div>
  </div>


  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>