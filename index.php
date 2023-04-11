<?php require './xuly/Shared/connect_db_view.php'; ?>
<?php require './view/Shared/head_before.php'; ?>
<body>
    <header class="header-section">
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a>
                                <img style="max-width: 100px;" src="./style/img/logo.png" alt="logo_ks">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <section class="blog-section blog-page spad">
        <div class="container">

            <!-- Login Start -->
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <!-- Tabs Titles -->
                    <h2 class="active" id="tieude-form"> Đăng nhập </h2>

                    <!-- Login Form -->
                    <form class="form-login" name="dangnhap" method="POST">
                        <div class="col-lg-12">
                            <input type="text" id="login" class="fadeIn second" name="username" placeholder="Tài khoản">
                        </div>
                        <div class="col-lg-12">
                            <input type="password" id="password" class="fadeIn third" name="password"
                                placeholder="Mật khẩu">
                        </div>
                        <div class="col-lg-12">

                            <input name="submit" type="submit" id="submit" class="fadeIn fourth" value="Đăng nhập">

                        </div>

                        <?php
                            if(isset($_POST["submit"]))
                                require './xuly/xl_login.php';
                        ?>

                    </form>

                    <!-- Remind Passowrd -->
                    <!-- <div id="formFooter">
                        <a class="underlineHover" href="#">Forgot Password?</a>
                    </div> -->

                </div>
            </div>

        </div>
    </section>


    <!-- Footer Section Begin -->
    <?php //require './view/Shared/footer.php'; ?>
</body>