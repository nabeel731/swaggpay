<!DOCTYPE html>
<html lang="en">
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
<?php include_once 'layout/head.php' ?>

<body>

    <div class="container bootstrap snippet" style="margin-bottom:100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-2 mt-2">
                <a href="home">
                <img src="assets/img/logo/logo.png"style="width:350px;height:auto;margin-bottom:-63px;">
                </a>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->

            </div>
            <!--/col-3-->
            <div class="col-sm-9">

                <div class="tab-content">
                    <div class="tab-pane active" id="home">


                        <div class="form-group">

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <label for="first_name">
                                    <h4>Name</h4>
                                </label>
                                <input type="text" class="form-control" id="name" value="<?= $user['name'] ?>" placeholder="Name" title="enter your  name if any." readonly>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" class="form-control" id="phone" value="<?= $user['phone'] ?>" placeholder="enter phone" title="enter your phone number if any." readonly>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" id="email" value="<?= $user['email'] ?>" placeholder="you@email.com" title="enter your email." readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <label for="email">
                                    <h4>Gender</h4>
                                </label>
                                <input type="text" value="<?= $user['gender'] ?>" class="form-control" id="location" title="enter a location" readonly>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <label for="email">
                                    <h4>User Level</h4>
                                </label>
                                <input type="text" value="User Level<?= $user['level_id'] ?>" class="form-control" id="location" readonly>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>


                            </div>
                        </div>

                        </form>

                        <hr>

                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="messages">

                        <h2></h2>

                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="form-group">

                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <label for="first_name">
                                            <h4>Name</h4>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $user['name'] ?>" placeholder="Name" title="enter your  name if any.">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <label for="phone">
                                            <h4>Phone</h4>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $user['phone'] ?>" placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" placeholder="you@email.com" title="enter your email.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <label for="email">
                                            <h4>Address</h4>
                                        </label>
                                        <input type="text" class="form-control" name="address" id="email" value="<?= $user['address'] ?>" placeholder="enter your address." title="enter your address.">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <label for="email">
                                            <h4>city</h4>
                                        </label>
                                        <input type="text" value="<?= $user['city'] ?>" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </div>
                        </form>

                    </div>
                    <!--/tab-pane-->
                    <div class="tab-pane" id="settings">


                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>First name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Last name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone">
                                        <h4>Phone</h4>
                                    </label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="mobile">
                                        <h4>Mobile</h4>
                                    </label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Location</h4>
                                    </label>
                                    <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password">
                                        <h4>Password</h4>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password2">
                                        <h4>Verify</h4>
                                    </label>
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
    <?php include_once 'layout/footer.php' ?>
    <?php include_once 'layout/responses.php' ?>
    <?php include_once 'layout/scripts.php' ?>
</body>