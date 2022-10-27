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

<body style="background-color:white;">
    <section class="ftco-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-2 mt-2">
                    <a href="home">
                        <img src="assets/img/logo/logo.png" style="width:350px;height:auto;margin-bottom:-63px;">
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-8">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="row">
                            <?php foreach ($products as $product) { ?>
                                <div class="d-flex flex-column col-lg-6 mb-5 col-md-6 col-12">
                                    <div onClick="CollectReward(<?= $product['id'] ?>)">

                                        <iframe width="350" height="320" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                    </div>

                                    <button class="my-4 py-3 btn btn-sm btn-primary float-center" onClick="CollectReward(<?= $product['id'] ?>)">Collect Reward</button>


                                </div> <!-- col // -->

                            <?php } ?>
                        </div> <!-- row.// -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once 'layout/scripts.php' ?>
    <?php include_once 'layout/responses.php' ?>
    <script>
        function CollectReward(id) {
           
            makeAjaxCall('CollectReward?id=' + id).then(res => {
                console.log(res);
                if (res['message'] == "already collect") {
                    swal.fire({
                        title: "OOO00ppppss!",
                        text: "You Have  Collect Already Reward Today",
                        icon: "error",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (res['message'] == "successful") {
                    swal.fire({
                        title: "Done",
                        text: "Your Reward Have Been Collecetd",
                        icon: "success",
                    });
                } else if (res['message'] == "20 days already") {
                    swal.fire({
                        title: "Success",
                        text: "Now Add One More Member In Your Team For Collect More Rewad",
                        icon: "error",
                    });
                }

            });
        }
    </script>
</body>

</html>