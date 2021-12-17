<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>UrHome.com</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>

  <body class="d-flex text-center bg-dark text-white align-center">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <div style="
      display: block;
      position: sticky;
      top: 28%;
      width: 10%;
      height: 10%;
      margin-left: 5%;">
      <h2>U</h2>
      <h2>r</h2>
      <h2>H</h2>
      <h2>o</h2>
      <h2>m</h2>
      <h2>e</h2>
    </div>


    <div class="cover-container d-flex w-100 h-100 mx-auto p-3 flex-column" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
      <h1>Charts</h1>
      <div class="container">
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Filter<span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="form2.php?kota=Semua" style="text-decoration:none;">Semua</a></li>
            <li><a href="form2.php?kota=Batu" style="text-decoration:none;">Batu</a></li>
            <li><a href="form2.php?kota=Jember" style="text-decoration:none;">Jember</a></li>
            <li><a href="form2.php?kota=Pasuruan" style="text-decoration:none;">Pasuruan</a></li>
            <li><a href="form2.php?kota=Sidoarjo" style="text-decoration:none;">Sidoarjo</a></li>
            <li><a href="form2.php?kota=Surabaya" style="text-decoration:none;">Surabaya</a></li>
            <!-- <li class="divider"></li>
            <li><a href="#">Separated link</a></li> -->
          </ul>
      </div><br><br>
       
        <?php 
          if(!isset($_GET['kota'])){
            echo "<meta http-equiv='refresh' content='0;url=form2.php?kota=Semua',301>";
          }

          include "home.php"; 
        ?>
        <br><br>
      <p class="lead">
      <a href="index.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Kembali ke halaman utama</a>
    </p><br><br><br>
      </div>
    </div>


    <div style="
      display: block;
      position: sticky;
      top: 27%;
      width: 10%;
      height: 10%;
      margin-right: 5%;">
      <h2>U</h2>
      <h2>r</h2>
      <h2>H</h2>
      <h2>o</h2>
      <h2>m</h2>
      <h2>e</h2>
    </div>

    
  </body>
</html>
