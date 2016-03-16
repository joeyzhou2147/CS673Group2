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
                <form action="">
                    <ul class="ul-list">
                        <li><input type="email" required class="input" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>
                        <li><input type="password" required class="input" placeholder="Password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
                        <li><span class="remember"><input type="checkbox" id="check"> <label for="check">Remember Me</label></span><span class="remember"><a href="">Forget Password</a></span></li>
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
                <form action="">
                    <ul class="ul-list">
                        <li><input type="email" required class="input" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>
                        <li><input type="password" required class="input" placeholder="Password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
                        <li><input type="checkbox" id="check1"> <label for="check1">I accept terms and conditions</label></li>
                        <li><input type="submit" value="SIGN UP" class="btn"></li>
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