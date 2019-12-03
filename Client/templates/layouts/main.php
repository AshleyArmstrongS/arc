<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Go College</title>

  <!-- Bootstrap  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src = "https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script  integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"></script>
  <script  crossorigin = "anonymous"></script>
  <script  src = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity = "sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin = "anonymous">
  </script>

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="/arc/Client/assets/styles/styles.css">

  <style>

  .foot {
    position: fixed;
    bottom: 0;
    left:0;
    width: 100%;
    background-color: #f1f1f1;
  }

  a {
    color: #000;
    text-decoration: none;
  }

  a:hover {
    background-color: #999;
    color: yellow;
    border-radius: 4px;
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    background-color: #f1f1f1;
  }
  </style>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="opacity: 0.85;">

    <div class="container">
      <div class="navbar-brand" href="">GoCollege</div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav mr-auto">
          <?php if ($_SESSION['LOGGED_IN'] === TRUE) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= SITE_BASE_DIR ?>/"><span class="sr-only">(current)</span> Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= SITE_BASE_DIR ?>/viewUser"><span class="fas fa-search-location"></span>
                Search</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= SITE_BASE_DIR ?>/inbox"><span class="far fa-envelope"></span> Inbox</a>
            </li>
          <?php } ?>
          <?php if (!($_SESSION['LOGGED_IN'] === TRUE)) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= SITE_BASE_DIR ?>/login"><span class="fas fa-users"></span> Log in</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= SITE_BASE_DIR ?>/register"><span class="fas fa-user-cog"></span> Register</a>
            </li>
          <?php } ?>
        </ul>
        <form class="form-inline my-2 my-md-0">
          <?php if ($_SESSION['LOGGED_IN'] === TRUE) { ?>
            <a class="nav-link" style="color:white;"><span class="far fa-user"></span> Hi,<?= $_SESSION['Name']; ?></a>
            <a class="nav-link" style="color:white;" href="<?= SITE_BASE_DIR ?>/logout"><span class="fas fa-sign-out-alt"></span> Logout</a>
          <?php } ?>
        </form>
      </div>
    </div>
  </nav>

<body>
  <div class='container'>
    <?= \Rapid\Renderer::VIEW_PLACEHOLDER ?>
</body>

</html>