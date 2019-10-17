<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Document</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
  <h2 style="text-align: center;">--- DOCUMENTS ---</h2>
  <a style=" position: relative; right:-80%; margin-bottom: 2%;" class="btn btn-success" href="upload.php">Upload Document</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Downloads</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      session_start();
      if (isset($_SESSION['document'])) {
        for($i=0 ; $i<count($_SESSION['document']) ; $i++) { 
          $fileUploads=$_SESSION['document'][$i];
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $fileUploads['name']; ?></td>
            <td><a class="btn btn-primary" href="download.php?file=<?php echo $fileUploads['file_name']; ?>">Download</a></td>
            <td><a class="btn btn-danger" href="remove.php?ordinal=<?= $i ?>&file=<?php echo $fileUploads['file_name']; ?>">Remove</a></td>
          </tr>
          <?php
        }
      }
      ?>
    </table>
  </body>
  </html>