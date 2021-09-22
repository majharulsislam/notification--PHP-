<?php require_once('config.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Notification!</title>

    <style>
      form.form_area {
        max-width: 500px;
        margin: 50px auto;
        box-shadow: 0 0 5px #000;
        padding: 25px;
      }

      .btn-group{
        margin:0 auto;
      }
      .btn-group a{
        text-decoration: none;
        color:#fff;
      }
      a.dropdown-item {
        color: #000;
      }
      
      .mycounter {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        background: #fff;
        color:#000;
      }
    </style>
  </head>
  <body>

 <!-- Example single danger button -->
  <div class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="btn-group">
      <a href="" data-bs-toggle="dropdown" aria-expanded="false">
        Notifications
        <?php 
            $stm = $pdo->prepare('SELECT * FROM notifications WHERE status=? ORDER BY date DESC');
            $stm->execute(array('unread'));
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0) :
         ?>
        <span class="mycounter"><?php echo count($result); ?></span>
        <?php endif; ?>
      </a>
      <ul class="dropdown-menu">
        <li>
            <?php 
                if (count($result) > 0) :
                  foreach ($result as $row) :
                    $type = $row['type'];
                    if($type != 'comment') :
             ?>
            <a style ="<?php if($row['status'] == 'unread'){echo 'font-weight:bold';}?>" class="dropdown-item" href="#">
                <small><i><?php echo date('F j,Y,g:i a',strtotime($row['date'])); ?></i></small><br/><?php echo $row['name']; ?> liked your post.
            </a>
            <?php else : ?>
            <a style ="<?php if($row['status'] == 'unread'){echo 'font-weight:bold';}?>" class="dropdown-item" href="#">
                <small><i><?php echo date('F j,Y,g:i a',strtotime($row['date'])); ?></i></small><br/>Someone commented your post.
            </a>
          <?php endif; ?>
            <div class="dropdown-divider"></div>
          <?php endforeach; else : ?>
            <a href="#" class="dropdown-item">No records yet</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>



<!-- Like area form -->
  <?php 
      if (isset($_POST['send_like'])) {
          $like_name = $_POST['like_name'];

          try {
              $stm = $pdo->prepare('INSERT INTO notifications (name,type,status) VALUES (?,?,?)');
              $stm->execute(array($like_name,'like','unread'));

              header('location:index.php');
              $success_like = 'Your Like Added';
              unset($_POST['like_name']);
          }
          catch (Exception $e) {
              $error = $e->getMessage();  
          }
      }

   ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" class="form_area">
            <?php if (isset($success_like)) : ?>
              <div class="alert alert-success"><?php echo $success_like; ?></div>
            <?php endif; ?>
            <div class="form-group">
              <label for="liken">Name</label>
              <input type="text" name="like_name" id="liken" class="form-control mb-3" value="<?php if(isset($_POST['like_name'])){echo $_POST['like_name'];}?>" required>
            </div>
            <div class="form-group">
              <input type="submit" name="send_like" class="btn btn-primary" value="Like">
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Message area form -->
    <?php 
      if (isset($_POST['send_message'])) {
          $message = $_POST['message'];

          try {
              $stm = $pdo->prepare('INSERT INTO notifications (type,message,status) VALUES (?,?,?)');
              $stm->execute(array('comment',$message,'unread'));

              header('location:index.php');
              $success_mess = 'Your message sent success';
              unset($_POST['message']);
          }
          catch (Exception $e) {
              $error = $e->getMessage();  
          }
      }

   ?>
     <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" class="form_area">
            <?php if (isset($success_mess)) : ?>
              <div class="alert alert-success"><?php echo $success_mess; ?></div>
            <?php endif; ?>
            <div class="form-group">
              <label for="sms">Message</label>
              <input type="text" name="message" id="sms" class="form-control mb-3" value="<?php if(isset($_POST['message'])){echo $_POST['message'];}?>" required>
            </div>
            <div class="form-group">
              <input type="submit" name="send_message" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>