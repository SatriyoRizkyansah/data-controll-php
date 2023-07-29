<?php 
require 'functions.php';

if( isset($_POST["registrasi"]) ){

    if( registrasi($_POST) > 0 ) {
        // $registSucc = true;
        echo'
        <div class="alert alert-success text-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                          Registrasi user berhasil. <br>
                        </div>
                        </div>';
    } else {
        echo '       
        <div class="alert alert-danger text-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                          Username sudah terdaftar/ Konfirmasi password tidak sesuai!
                        </div>
                      </div>
';
    }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>REGISTRASI</title>

    <!-- icon bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <!-- bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

    <!-- my css -->
    <link rel="stylesheet" href="css/login.css" />

    <!-- Alert icon -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg> 
  </head>
  <body>

    <div class="container">
      <div class="input">
        <h3 class="text-primary text-center p-2">REGISTRASI</h3>

        <form action="" method="post" >

        <input type="text" class="form-control mt-4" name="username" placeholder="username" />

        <input type="password" class="form-control mt-2" name="password" placeholder="password" />

        <input type="password" class="form-control mt-2" name="password2" placeholder="confirm password" />

        <button type="submit" class="btn btn-primary mt-3" name="registrasi">REGIST</button>

        </form>
      </div>
      <div class="footer p-3 text-center bg-primary">
        <span class="color-white"
          >Already have accounts? <a href="login.php" style="text-decoration: none; color: white"> <i class="bi bi-person-fill-down"> LOGIN</i></a></span
        >
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
