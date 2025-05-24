<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/swiper-bundle.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/main.css">

  <title>Form Login</title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>img/logo/logo_lumintu1.ico">

  <style>
    .forgot:hover {
      color: #CCA274 !important;
    }

    .btn-primary {
      background-color: #DDB07F !important;
      border-color: #DDB07F !important;
    }

    .btn-primary:hover {
      background-color: #CCA274 !important;
      border-color: #CCA274 !important;
    }

    .btn-primary:active {
      background-color: #CCA274 !important;
      border-color: #CCA274 !important;
    }

    .btn-primary:visited {
      background-color: #CCA274 !important;
      border-color: #CCA274 !important;
    }
  </style>
</head>

<body class="gradient-background">

  <section class="form-login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 d-flex align-items-center mt-5 mt-lg-0">
          <div class="container custom--px">
            <div class="logo text-center">
    
              <?php if ($this->session->flashdata('fail')) : ?>
                <div class="flash-fail" data-flash="<?= $this->session->flashdata('fail'); ?>"></div>
                <?php unset($_SESSION['fail']); ?>
              <?php endif; ?>
              <h4>FORM LOGIN <?= $this->session->flashdata('fail')?></h4>
              <img class="w-[150px] logo-incareer" src="<?= base_url('assets') ?>/img/logo/logo_primary.svg" alt="Logo In Career">
            </div>
            <div class="header-title text-center">
              <h2>Join for the Bright Future</h2>
              <small class="text-muted">In Career is an LMS that focuses on career development in IT from Lumintu Logic with participants aged 25 years and over, who want to develop their careers in the IT field. </small>
            </div>
            <form method="post" action="<?= site_url('Auth/login_action') ?>" class="mt-5">
              <div class="container d-flex justify-content-between align-content-center form-group">
                <div class="input-group">
                  <input type="email" name="email" id="email" required>
                  <label for="email">Enter your Email</label>
                </div>
                <!-- <div class="box d-flex align-items-center">
                              <i class="fas fa-at"></i>
                            </div> -->
              </div>
              <br>
              <div class="container d-flex justify-content-between align-content-center form-group">
                <div class="input-group">
                  <input type="password" name="password" id="password" required>
                  <label for="password">Enter your Password</label>
                </div>
              </div>
              <!-- <div class="container d-flex justify-content-between align-content-center form-group  mt-4">
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Select Role</option>
                              <option value="Students">Student</option>
                              <option value="Company">Company</option>
                              <option value="Mentor">Mentor</option>
                            </select>
                          </div> -->
              <div class="container d-flex justify-content-between align-content-center form-group mt-3">
                <div class="">
                  <a href="register.php" style="color:#DDB07F;" class="forgot">Create an Account!</a>
                </div>
                <!-- <div class="check-group">
                                <input type="checkbox" name="remember"> &nbsp; Remember Me
                              </div> -->
                <a href="forgotpassword.html" style="color:#DDB07F;" class="forgot">Forgot the Password?</a>
              </div>
              <div class="container mt-5">
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                <div class="my-2">
                  <a href="index.html" style="color:#DDB07F;" class="forgot">Back to Landing Page</a>
                </div>
              </div>
              <!-- <div class="text-left">
                            <a href="index.html"style="color:#DDB07F;" class="forgot">Back to Landing Page</a>
                          </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/swiper-bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {
      const flashFail = $('.flash-fail').data('flash')
      console.info(flashFail)
      if (flashFail) {
        Swal.fire({
          title: "Something Wrong",
          text: `${flashFail}`,
          icon: "warning"
        });
      }
    })
  </script>
</body>

</html>