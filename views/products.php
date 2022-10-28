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
                                    <div id='vidWrapper'>
                                        <iframe id="video-id-first" src="https://www.youtube.com/embed/nNlEiuqiKAk?enablejsapi=1&amp;origin=http%3A%2F%2F3.7.232.244" gesture="media" allow="encrypted-media" allowfullscreen="" data-gtm-yt-inspected-53610233_3="true" width="320" height="320" frameborder="0"></iframe>
                                    </div>
                                    <button class="my-4 py-3 btn btn-sm btn-primary float-center text-center" style="width:320px;"  onClick="CollectReward(<?=$product['id']?>)">Collect Reward</button>

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

        // var tag = document.createElement('script');
        // tag.src = "https://www.youtube.com/iframe_api";
        // var firstScriptTag = document.getElementsByTagName('script')[0];
        // firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        // var player;
        // var width = document.getElementById("video-id-first").getAttribute("width");
        // var height = document.getElementById("video-id-first").getAttribute("height");
        // var src = document.getElementById("video-id-first").getAttribute("src");
        // //splitting to get the videoId from src.
        // var partsArr = src.split("/");
        // var videoSource = partsArr[partsArr.length - 1].split("?");
        // var videoId = videoSource[videoSource.length - 2];

        // function onYouTubeIframeAPIReady() {
        //     player = new YT.Player('vidWrapper', {
        //         height: height,
        //         width: width,
        //         videoId: videoId,
        //         events: {
        //             'onStateChange': function(event) {

        //                 if (event.data == YT.PlayerState.PLAYING) {
        //                     console.log(event)
        //                     startVideo();
        //                 }
        //                 if (event.data == YT.PlayerState.PAUSED) {
        //                     stopVideo();
        //                 }
        //             }
        //         }
        //     });
        // }

        function startVideo() {
            //write your functionality here.
            alert('Video Started');
        }
    </script>
</body>

</html>