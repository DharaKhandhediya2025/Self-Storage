<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ config('global.front_base_url').'images/favicon.ico' }}" type="image/x-icon">
        <title>Buyer Login</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/bootstrap.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/style.css' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'css/responsive.css' }}">
    </head>

    <body>
        <div class="login_wrapper">
            <div class="logo_box">
                <a href="{{ url('/') }}"><img src="{{ config('global.front_base_url').'images/logo.png' }}" alt="logo" class="img-fluid"></a>
            </div>
            <div class="login_main_box">
                <div class="login_box">
                    <!-- <a href="#" class="close_btn"><i class="fa fa-times"></i></a> -->
                    <h3 class="login_text mt-4 mb-5">Login</h3>
                    <form class="login_form">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control login_input">
                        </div>
                        <div class="form-group mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control login_input">
                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                        </div>

                        <button type="submit" class="btn btn-primary login_btn ">Login</button>
                    </form>

                    <div class="text-center">
                        <a href="#" class="forgot_password_text">Forgot Password</a>
                        <h6 class="or_sign_text">Or sign in with</h6>
                        <div class="other_login_box">
                            <a href="#"><img src="{{ config('global.front_base_url').'images/google.png' }}" alt="google-img"></a>
                            <a href="#"><img src="{{ config('global.front_base_url').'images/facebook.png' }}" alt="facebook-img"></a>
                            <a href="#"><img src="{{ config('global.front_base_url').'images/apple-app.png' }}" alt="facebook-img"></a>
                        </div>
                        <p class="new_user_text">New user? <a href="#">Create an account</a></p>
                        <p class="seller_text">You are a seller? <a href="#">Seller login</a></p>
                    </div>
                </div>
            </div>
        </div>

        <link rel="stylesheet" href="{{ config('global.front_base_url').'js/jQuery.js' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'js/bootstrap.js' }}">
        <link rel="stylesheet" href="{{ config('global.front_base_url').'js/custom.js' }}">
    </body>
</html>