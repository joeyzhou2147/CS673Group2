<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/3/15
 * Time: 18:45
 */
?>
<div id="login-form" style="border: 1px lightblue solid;">

    <input type="radio" checked id="login" name="switch" class="hide">
    <input type="radio" id="signup" name="switch" class="hide">

    <div>
        <ul class="form-header">
            <li><label for="login"><i class="fa fa-lock"></i> LOGIN<label for="login"></li>
            <li><label for="signup"><i class="fa fa-credit-card"></i> REGISTER</label></li>
        </ul>
    </div>

    <div class="section-out">
        <section class="login-section">
            <div class="login">
                <form action="/cs673group2/index.php/welcome" method="post">
                    <ul class="ul-list">
                        <li><input type="email" required class="input" placeholder="Your Email" name="login_email"/><span class="icon"><i class="fa fa-user"></i></span></li>
                        <li><input type="password" required class="input" placeholder="Password" name="login_password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
                        <li><span class="remember"><input type="checkbox" id="log_in_check"> <label for="check">Remember Me</label></span><span class="remember"><a href="">Forget Password</a></span></li>
                        <li><input type="submit" value="SIGN IN" class="btn"></li>
                    </ul>
                </form>
            </div>

            <div class="social-login">Or sign in with &nbsp;
                <a href="" class="fb"><i class="fa fa-facebook"></i></a>
                <a href="" class="tw"><i class="fa fa-twitter"></i></a>
                <a href="" class="gp"><i class="fa fa-google-plus"></i></a>
                <a href="" class="in"><i class="fa fa-linkedin"></i></a>
            </div>
        </section>

        <section class="signup-section">
            <div class="login">
                <form action="/cs673group2/index.php/sign_up" method="POST">
                    <ul class="ul-list">
                        <li><input type="email" required class="input" placeholder="Your Email" name="register_email"/><span class="icon"><i class="fa fa-user"></i></span></li>
                        <li><input type="password" required class="input" placeholder="Password" name="register_password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
                        <li><input type="checkbox" id="sign_up_check" onclick="EnableSubmit(this)"> <label for="check1">I accept terms and conditions</label></li>
                        <li><input type="submit" id="sign_up_submit" value="SIGN UP" class="btn" disabled></li>
                    </ul>
                </form>
            </div>

            <div class="social-login">Or sign up with &nbsp;
                <a href="" class="fb"><i class="fa fa-facebook"></i></a>
                <a href="" class="tw"><i class="fa fa-twitter"></i></a>
                <a href="" class="gp"><i class="fa fa-google-plus"></i></a>
                <a href="" class="in"><i class="fa fa-linkedin"></i></a>
            </div>

        </section>
    </div>

</div>
<div>
    <p align="center" style="color:red;"><?php if(isset($message)){echo $message;}?></p>
</div>