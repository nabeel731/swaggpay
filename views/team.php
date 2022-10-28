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

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">


        <div class="col-md-6 text-center mb-2 mt-2">
          <a href="home">
            <img src="assets/img/logo/logo.png" style="width:350px;height:auto;margin-bottom:-63px;">
          </a>
          <h2 class="heading-section">Add 20 Members In Your Team To Get 500 Rs Daily</h2>
          <h2 class="heading-section">Member:<?= $totalteam[0]['totalteam'] ?></h2>

        </div>
      </div>
      <div class="row justify-content-center">
        <table  class="table table-bordered table-striped">
          <thead>
            <tr>

              <th>Name</th>
              <th>Phone</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($team as $member) { ?>
              <tr>
                <td><?= $member['name'] ?></td>
                <td><?= $member['phone'] ?></td>
                <td><?= $member['level_id'] ?></td>
                <td><a href="nextteam?id=<?= $member['id'] ?>"><button type="button" class="btn btn-primary">See His Team</button></td>
              </tr>
            <?php } ?>


          </tbody>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>

      </div>
  </section>
  <?php include_once 'layout/scripts.php' ?>
  <script>
    $(function() {

      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>
</body>

</html>