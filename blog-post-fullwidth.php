<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <title>Evara - eCommerce HTML Template</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
  <link rel="stylesheet" href="assets/css/maind134.css?v=3.4" />
</head>

<body>
  <?php
  require("components/header-two.php");
  require("components/header-mobile.php");
  require("helpers/config.php");

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $Query = "SELECT * FROM blogs WHERE accesstoken = '$id'";
    $Result = mysqli_query($conn, $Query);

    if ($Result && mysqli_num_rows($Result) > 0) {
      $row = mysqli_fetch_assoc($Result);
  ?>
      <main class="main">
        <div class="page-header breadcrumb-wrap">
          <div class="container">
            <div class="breadcrumb">
              <a href="index.php" rel="nofollow">Home</a>
              <span></span> Blog <span></span> Technology
            </div>
          </div>
        </div>
        <section class="mt-50 mb-50">
          <div class="container custom">
            <div class="row">
              <div class="col-lg-10 m-auto">
                <div class="single-page pl-30">
                  <div class="single-header style-2">
                    <h1 class="mb-30">
                      <?php echo $row['title']; ?>
                    </h1>
                    <div class="single-header-meta">
                      <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                        <span class="post-by">By <a href="#"><?php echo $row['author']; ?></a></span>
                        <span class="post-on has-dot">9 April 2020</span>
                        <span class="time-reading has-dot"><?php echo $row['read_time']; ?></span>
                        <span class="hit-count has-dot">29k Views</span>
                      </div>
                      <div class="social-icons single-share">
                        <ul class="text-grey-5 d-inline-block">
                          <li><strong class="mr-10">Share this:</strong></li>
                          <li class="social-facebook">
                            <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt="" /></a>
                          </li>
                          <li class="social-twitter">
                            <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt="" /></a>
                          </li>
                          <li class="social-instagram">
                            <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt="" /></a>
                          </li>
                          <li class="social-linkedin">
                            <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt="" /></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <figure class="single-thumbnail">
                    <img src="uploads/blogs/<?php echo $row['image']; ?>" alt="" />
                  </figure>
                  <div class="single-content">
                    <?php echo $row['content']; ?>
                  </div>
                  <div class="entry-bottom mt-50 mb-30 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn">
                    <div class="tags w-50 w-sm-100">
                      <?php
                      $tags = explode(',', $row['tags']);
                      foreach ($tags as $tag) {
                      ?>
                        <a href="blog-category-big.php" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10"><?php echo $tag; ?></a>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="social-icons single-share">
                      <ul class="text-grey-5 d-inline-block">
                        <li><strong class="mr-10">Share this:</strong></li>
                        <li class="social-facebook">
                          <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt="" /></a>
                        </li>
                        <li class="social-twitter">
                          <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt="" /></a>
                        </li>
                        <li class="social-instagram">
                          <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt="" /></a>
                        </li>
                        <li class="social-linkedin">
                          <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt="" /></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

  <?php
    } else {
      echo "No blogs found.";
    }
  } else {
    echo "Invalid Request Bro";
  }

  require("components/footer-one.php");
  require("components/pre-loader.php");
  ?>

  <?php require("components/js-links.php") ?>
</body>

</html>