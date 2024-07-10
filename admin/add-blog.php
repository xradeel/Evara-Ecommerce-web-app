<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Evara Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    <script src="assets/ckeditor5/build/ckeditor.js"></script>
</head>

<body>
    <div class="screen-overlay"></div>
    <?php require("components/side-bar.php") ?>
    <main class="main-wrap">
        <?php require("components/header.php") ?>
        <section class="content-main">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Add New Blog</h2>
                </div>
            </div>
            <form method="post" action="scripts/add-blog.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Basic</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Blog title</label>
                                    <input type="text" placeholder="Type here" name="title" class="form-control" id="title">

                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Blog Summary</label>
                                    <textarea id="short-description" placeholder="Type here" name="summary" id="shortDes" class="form-control" rows="4" maxlength="200"></textarea>
                                    <small id="charCount">0 / 200</small>

                                </div>
                                <div class="mb-4">
                                    <label for="author" class="form-label">Author Name</label>
                                    <input type="text" placeholder="Type here" name="author" class="form-control" id="author">

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Tags</label>
                                            <div class="row gx-2">
                                                <input placeholder="fashion" name="tags" id="tags" type="text" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Read Time</label>
                                            <input placeholder="10" name="read_time" id="read_time" type="text" class="form-control">
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-4" id="ckeditor">
                                    <label class="form-label">Blog Content</label>
                                    <textarea name="content" id="content" cols="30" rows="10"></textarea>

                                </div>
                                <div>
                                    <button class="btn btn-md mt-4 rounded font-sm hover-up" type="submit">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Media</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-upload" style="text-align:left">
                                    <img src="assets/imgs/theme/upload.svg" alt="">
                                    <label class=" p-1" for="blog_pic">Select Blog thumbnail</label>
                                    <input class="form-control" name="blog_pic" id="blog_pic" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> ©, Evara - T-Shirts .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        All rights reserved
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/select2.min.js"></script>
    <script src="assets/js/vendors/perfect-scrollbar.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
</body>



</html>