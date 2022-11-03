<?php
if (isset($_SESSION['user_id']))
    $user = $this->db->getSingleRowIfMatch('users', 'id', $_SESSION['user_id']);
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM users inner join levels on users.level_id=levels.id  WHERE users.id=$id";
    $levels = $this->db->getDataWithQuery($query);
    //echo "<pre>";print_r($levels);die;
} else $levels = null;
//print_r($levels);die;
if ($user['status'] == 0) {
    header('location:logout');
}
if ($user['deleted'] == 1) {
    header('location:logout');
}
if ($user['paid'] == 0) {
    header('location:about');
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'layout/head.php' ?>

<body data-spy="scroll" data-target=".navbar" data-offset="70" style="background-color:white;">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <a href="home">
                <img src="assets/img/logo/logo.png" style="width:350px;height:auto;margin-bottom:-70px;">
            </a>
        </div>
    </div>
    <section class="ftco-section navbar">
        <div class="container-fluid">


            <marquee style=" background-color:#007da1;width:100%;color:white;">
                <?= $setting['home_description'] ?></marquee>
            <div class="w-100 row justify-content-center">
                <div class="col-md-8 col-lg-8 d-flex flex-column justify-content-center ">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-6 d-flex flex-column justify-content-center" style="text-align:center;">
                                <div class=" profile">
                                    <a href="profile">
                                        <i class="fa fa-user" style="font-size:80px;color:#007da1"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="mt-1 mb-5">
                                    <a href="profile" class="btn btn-sm btn-primary" style="width:100px;">Profile</a>

                                </div> <!-- bottom-wrap.// -->
                            </div> <!-- col // -->

                            <div class="col-6 d-flex flex-column justify-content-center" style="text-align:center;">
                                <div class=" profile">
                                    <a href="products">
                                        <i class="fa fa-tasks" style="font-size:80px;color:#007da1"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="mt-0 mb-5">
                                    <a href="products" class="btn btn-sm btn-primary" style="width:100px;">Daily
                                        Task</a>

                                </div> <!-- bottom-wrap.// -->
                            </div> <!-- col // -->
                            <div class="col-6 d-flex flex-column justify-content-center" style="text-align:center;">
                                <div class=" profile">
                                    <a href="wallet">
                                        <i class="fa fa-wallet" style="font-size:80px;color:#007da1"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="mt-0 mb-5">
                                    <a href="wallet" class="btn btn-sm btn-primary" style="width:100px;">Wallet</a>

                                </div> <!-- bottom-wrap.// -->
                            </div> <!-- col // -->

                            <div class="col-6 d-flex flex-column justify-content-center" style="text-align:center;">
                                <div class=" profile">
                                    <a href="team">
                                        <i class="fa fa-group" style="font-size:80px;color:#007da1"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="mt-0 mb-5">
                                    <a href="team" class="btn btn-sm btn-primary" style="width:100px;">My Team</a>

                                </div> <!-- bottom-wrap.// -->
                            </div>
                            <!-- col // -->
                            <div class="col-6 d-flex flex-column justify-content-center" style="text-align:center;">
                                <div class=" profile">
                                    <a>
                                        <i onclick="showmessagegame()" class="fa fa-gamepad"
                                            style="font-size:80px; color:#007da1" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="mt-0 mb-5">
                                    <a onclick="showmessagegame()" class="btn btn-sm btn-primary"
                                        style="width:100px;color:white">Play Game</a>

                                </div> <!-- bottom-wrap.// -->
                                <!-- col // -->
                            </div> <!-- col // -->




                            <div class="col-6 d-flex flex-column justify-content-center" style="text-align:center;">
                                <div class=" profile">
                                    <a href="logout">
                                        <i class="fa fa-sign-out-alt" style="font-size:80px;color:#007da1"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="mt-1">
                                    <a href="logout" class="btn btn-sm btn-primary"
                                        style="width:100px;margin-bottom:30px;">Logout</a>

                                </div> <!-- bottom-wrap.// -->
                            </div>



                        </div> <!-- row.// -->


                    </div>
                </div>
            </div>
            <?php include_once 'layout/footer.php' ?>
    </section>
    <?php include_once 'layout/scripts.php' ?>

    <script>
        function showmessagegame()
        {
            Swal.fire({
		  icon: "error",
		  title: 'Level 6',
		  text: "You Can Play Game On Level 6 And Earn Money"
		})

        }
    </script>

</body>

</html>