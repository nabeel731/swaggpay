<?php
$helper = new Helper();
$sharingID = $helper->encrypt_decrypt($_SESSION['user_id']);
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

<body>
    <section class="ftco-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <a href="home">
                        <img src="https://raw.githubusercontent.com/nabeel731/suzbibitassests/main/images/logo.jpg" style="width:300px;height:90px;">
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 d-flex flex-column justify-content-center ">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="row justify-content-center">
                            <?php if ($user['level_id'] == 1) { ?>


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <p>Add One Member In Your Team To Open Your Daily Task</p>
                                        <?php if ($team[0]['total'] == 0) { ?>
                                            <a href="#" onClick="shareURL('<?= $sharingID ?>')" class="btn btn-sm btn-primary" style="width:100px;">Add</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" style="width:100px;">Completed</a>
                                        <?php } ?>
                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50 </span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(2,'https://play.google.com/store/apps/details?id=com.svs.yiskart&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->
                                <!-- col // -->

                                <p style="text-align:center;">Increase Your Level For Get More Daily Task</p>
                            <?php } ?>


                            <?php if ($user['level_id'] == 2) { ?>


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <p>Add One Member In Your Team To Open Your Daily Task</p>
                                        <?php if ($team[0]['total'] == 0) { ?>
                                            <a href="#" onClick="shareURL('<?= $sharingID ?>')" class="btn btn-sm btn-primary" style="width:100px;">Add</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" style="width:100px;">Completed</a>
                                        <?php } ?>
                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(3,'https://play.google.com/store/apps/details?id=com.dropshipping.dropshipkpi&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->

                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(4,'https://play.google.com/store/apps/details?id=com.dropshipping.dropshipkpi&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->
                                <p style="text-align:center;">Increase Your Level For Get More Daily Task</p>
                            <?php } ?>

                            <?php if ($user['level_id'] == 3) { ?>


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <p>Add One Member In Your Team To Open Your Daily Task</p>
                                        <?php if ($team[0]['total'] == 0) { ?>
                                            <a href="#" onClick="shareURL('<?= $sharingID ?>')" class="btn btn-sm btn-primary" style="width:100px;">Add</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" style="width:100px;">Completed</a>
                                        <?php } ?>
                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(5,'https://play.google.com/store/apps/details?id=com.printful.app&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->

                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(6,'https://play.google.com/store/apps/details?id=com.accordion.mockup&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->

                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(7,'https://play.google.com/store/apps/details?id=com.sk.logomaker&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->
								<p style="text-align:center;">Add One Member In Your Team To Open Your Daily Task</p>
                                <p style="text-align:center;">Increase Your Level For Get More Daily Task</p>
                            <?php } ?>
                            <?php if ($user['level_id'] == 4) { ?>


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">
					
                                    <div class="mt-0 mb-5">
                                        <p>Add One Member In Your Team To Open Your Daily Task</p>
                                        <?php if ($team[0]['total'] == 0) { ?>
                                            <a href="#" onClick="shareURL('<?= $sharingID ?>')" class="btn btn-sm btn-primary" style="width:100px;">Add</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" style="width:100px;">Completed</a>
                                        <?php } ?>
                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->


                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(8,'https://play.google.com/store/apps/details?id=com.bg.logomaker&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->

                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(9,'https://play.google.com/store/apps/details?id=com.ist.logomaker&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->

                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(10,'https://play.google.com/store/apps/details?id=com.ist.quotescreator&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>


                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->

                                <div class="col-12 d-flex flex-column justify-content-center" style="text-align:center;">

                                    <div class="mt-0 mb-5">
                                        <span>Download Application ang get Rs 50</span>
                                        <?php if ($team[0]['total'] > 0) { ?>
                                            <a onClick="earnmoney(11,'https://play.google.com/store/apps/details?id=com.ist.memeto.meme&hl=en&gl=US')" class="btn btn-sm btn-primary" style="width:100px;">Complete</a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-primary" disabled style="width:100px;">Complete</a>
                                        <?php } ?>

                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- col // -->



                                <p style="text-align:center;">Increase Your Team For Get More Daily Task</p>
                            <?php } ?>
							
							<?php if($user['level_id'] == 0) {?>
							<p style="text-align:center;">Your Daily Task Will Be Show on Level1 and You Need 5 Member in Your Team To Get Level1</p>
							<?php } ?>

                        </div> <!-- row.// -->


                    </div>
                </div>
            </div>
            <?php include_once 'layout/footer.php' ?>
    </section>
    <?php include_once 'layout/scripts.php' ?>
    <script>
        function earnmoney(id,url) {


            $.ajax({
                type: "POST",
                url: 'earnmoney',
                data: {
                    Id: id
                },
                success: function(data) {
                    console.log(data);
                    if (data == "successful") {
                        location.href = url;

                    } else if (data == "unsuccessful") {
                        swal.fire({
                            title: "OOO00ppppss",
                            text: "Error Processing Your Request",
                            icon: "error",
                        });
                    } else if (data == "alreadycollect") {
                        swal.fire({
                            title: "OOO00ppppss",
                            text: "You Have Already Complete Daily Task",
                            icon: "error",
                        });
                    }
                }
            });

        }
    </script>
</body>

</html>