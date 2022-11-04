<?php $user = $this->db->getSingleRowIfMatch('users', 'id', $_SESSION['user_id']);


if ($user['paid'] == 1) {

    header('location:home');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SwaggPay</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="assets/css/custom/verification.css" />
</head>

<body>
    <main>
        <div class="verification">
            <div class="logo">
                <img src="assets/img/logo/logo.png" style="width:350px;height:auto;margin-bottom:-63px;">
            </div>
            <div class="desc">
                <?php if (is_null($user['txt_id']) and $user['account_name'] == "easypaisa") { ?>
                    <h1 class="intro-title"><?= $settings['recharge'] ?></h1>
                <?php } ?>
                <?php if (is_null($user['txt_id']) and $user['account_name'] == "jazzcash") { ?>
                    <h1 class="intro-title"><?= $settings['jazcash_description'] ?></h1>
                <?php } ?>
                <?php if (is_null($user['txt_id']) and $user['account_name'] == "Skrill") { ?>
                    <h1 class="intro-title"><?= $settings['skrill_description'] ?></h1>
                <?php } ?>
                <?php if (!is_null($user['txt_id']) and $user['paid'] == 0 and $user['txtid_rejected'] == 0) { ?>
                <?php } ?>

                <?php if (!is_null($user['txt_id']) and $user['paid'] == 0 and $user['txtid_rejected'] == 0) { ?>
                    <p style="text-align:center">
                        Please Wait Your Account Will be Approved After Review Your Information And Payment
                    <p>
                    <p style="text-align:center">if your Information or TId will wrong and your account will be rejected
                    <p>
                    <p style="text-align:center">
                        It May Take Seven minutes to Two Hours
                    </p>
                    </h4>
                <?php } else { ?>
                    <p class="intro-desc" style="margin-bottom:19px;"><?php echo $settings['description'] ?>
                    </p>

                    <?php if ($user['account_name'] == "easypaisa" && $settings['easypaisa_active'] == 1) { ?>
                        <h3 class="intro-title"><?= $user['account_name'] ?> Account</h3>
                        <h3 class="intro-title">Account No:<?= $settings['easypiasa_no'] ?></h3>
                        <h3 class="intro-title" style="font-size:50;">Account Name:<?= $settings['easypiasa_title'] ?></h3>
                    <?php } ?>
                    <?php if ($user['account_name'] == "easypaisa" && $settings['easypaisa_active'] == 0) { ?>
                        <h3 class="intro-title" style="font-size:30;">Account No:<?= $settings['bankaccount_no'] ?></h3>
                        <h3 class="intro-title" style="font-size:30;">Account Name:<?= $settings['bank_name'] ?></h3>
                        <h3 class="intro-title" style="font-size:30px;">Account Title:<?= $settings['bank_title'] ?></h3>
                    <?php } ?>
                    <?php if ($user['account_name'] == "Skrill" && $settings['Skrill_active'] == 1) { ?>
                        <h3 class="intro-title">Account No:<?= $settings['skrillaccount_no'] ?></h3>
                        <h3 class="intro-title" style="font-size:50;">Account Name:<?= $settings['skrill_title'] ?></h3>
                    <?php } ?>
                    <?php if ($user['account_name'] == "Skrill" && $settings['easypaisa_active'] == 0) { ?>
                        <h3 class="intro-title" style="font-size:30;">Account No:<?= $settings['bankaccount_no'] ?></h3>
                        <h3 class="intro-title" style="font-size:30;">Account Name:<?= $settings['bank_name'] ?></h3>
                        <h3 class="intro-title" style="font-size:30px;">Account Title:<?= $settings['bank_title'] ?></h3>
                    <?php } ?>
                    <?php if ($user['account_name'] == "jazzcash" && $settings['jazzcash_active'] == 0) { ?>
                        <h3 class="intro-title" style="font-size:30px;">Account No:<?= $settings['bankaccount_no'] ?></h3>
                        <h3 class="intro-title" style="font-size:30px;">Account Name:<?= $settings['bank_name'] ?></h3>
                        <h3 class="intro-title" style="font-size:30px;">Account Title:<?= $settings['bank_title'] ?></h3>
                    <?php } ?>

                    <?php if ($user['account_name'] == "jazzcash" && $settings['jazzcash_active'] == 1) {
                    ?>
                        <h3 class="intro-title"><?= $user['account_name'] ?> Account</h3>
                        <h3 class="intro-title">Account No:<?= $settings['jazzacount_no'] ?></h3>
                        <h3 class="intro-title">Account Name:<?= $settings['jazzcash_title'] ?></h3>
                    <?php } ?>
                <?php } ?>

                <?php if ($user['txtid_rejected'] == 1) { ?>
                    <p style="color:red;font-size:20px;">We were not able verify the payment,Please Enter correct TId#</p>
                <?php } ?>
            </div>
            <?php if ($user['txtid_rejected'] == 1  or  is_null($user['txt_id'])) { ?>
                <form action="updateTxtid" method="post">
                    <label for="account">Select Account</label>
                    <select required name="account_type" id="">
                        <!-- <option value="jazzcash">JazzCash</option> -->
                        <option selected value="easypaisa">EasyPaisa</option>

                    </select>
                    <label for="accNo">Enter Account Number</label>
                    <input type="number" id="accNo" name="account_no" />
                    <label for="trxID">Enter TID#</label>
                    <input type="text" id="trxID" name="txt_id" />
                    <button type="submit">Submit</button>
                </form>
            <?php } ?>
        </div>
    </main>
</body>

</html>

<?php include_once 'layout/responses.php' ?>
<?php include_once 'layout/scripts.php' ?>