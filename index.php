<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>linkedin MY Own Post</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Post</span></a></li>
        <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>My Post</span></a></li>
        <li><a href="loginUI.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
            
    </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <?php
        $url = 'https://api.linkedin.com/v2/userinfo'; // Replace with your API endpoint
        $token = 'AQUfV-MYs5PIyg1XnN8wqAuBMQpjorG3dji9BRaKL4jgJeck0O_4Q6gVA0Bzu-aPkUyMNXnOm6a1gq2OXssnSQ_5E3x-R9xSn8tEZYIQuTeb_nZ-n3JJu2LJmHu8xcyU742XCGed-7v3IgjVR85hfHQR9G3e4DE08LfKXJRCLSymnw8ZpmhWYzaqJUPWJN-9IyXGmiCSqm74JD6r9-65Ru0eNyZWZsYL2GxR0ncX-feaePoQ-q-emI7Zyu07OMNM5tnyUo95YOdHsXCCMSTYKgBXWYdHsqhAl5mXogifboCybnMqbYBssctccmXnUgVEGYRIyIbhHusS8KmKKvL_dD9KN-6Npg';

        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json', // Adjust content type if needed
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'Error: ' . curl_error($curl);
        } else {
            // Decode JSON response
            $decodedResponse = json_decode($response, true);

            // Check if decoding was successful
            if ($decodedResponse !== null) {
                // Output HTML
                echo '<p>raw : '.$response.'</p>';
                echo '<div class="container" data-aos="zoom-in" data-aos-delay="100">';
                echo '<h1>Blog Site Integrate With Linkedin Post</h1>';
                echo '<h2><span class="typed" data-typed-items="'.$decodedResponse['name'].'"></span></h2>';
                echo '<img src="' .$decodedResponse['picture']. '" alt="API Image">';
                echo '<h3>'.$decodedResponse['email'].'</h3>';
                echo '<p>Feel free to visit my profile:</p>
                <a target="_blank" href="https://www.linkedin.com/in/firdaus-forsocialmedia-556b132a3/recent-activity/all/" class="btn btn-primary">Visit My linkedin</a>';
                echo '</div>';

                
            } else {
                echo 'Error: Unable to decode JSON response';
            }
        }

        curl_close($curl);
    ?>

    
      
  </section><!-- End Hero -->
  
  <section id="contact" class="contact"></section>
    
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Blogger Post</h2>
            <p>Welcome to a world of inspiration, musings, and discoveries! Here, words dance and ideas flourish.
                This space is where stories find their voice, where thoughts take flight, and where moments are captured in ink and keystrokes.
                Join me on a journey through the realms of imagination, where every post is a brushstroke painting the canvas of shared experiences.
                Together, let's explore, learn, and uncover the beauty in the ordinary, the magic in the mundane, and the extraordinary in the everyday.
                Welcome to a place where curiosity thrives, and each click opens the door to a new adventure. Embrace the magic of words and ideas—welcome to my world.</p>
        </div>
        <?php
            $file = "posts.txt";
            if (file_exists($file)) {
                $posts = file_get_contents($file);
                $postList = explode("---", $posts);
                foreach ($postList as $post) {
                    if (trim($post) !== "") {
                        $data = explode("\n", trim($post));
                        echo '<div id='.$data[0].'class="card mt-3">';
                        echo '<div class="card-body">';
                        echo "<h5 class='card-title'>$data[0]</h5>";
                        echo "<p class='card-text'>$data[1]</p>";
                        echo '</div>';
                        echo '</div>';
                    }
                }
            } else {
                echo "No posts yet.";
            }
        ?>
    </div>

  <main id="main">


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">



            <?php
                // File path
                $file = 'dataId.txt';

                // Check if the file exists and is readable
                if (file_exists($file) && is_readable($file)) {
                    // Read the file content
                    $content = file_get_contents($file);

                    // Explode the content into an array based on comma separator
                    $records = explode(',', $content);

                    // Loop through each record and echo
                    foreach ($records as $record) {
                        echo'
                        <div class="col-lg-2 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        </div>
                        <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box iconbox-blue">
                            <h4><a href="">'.$record.'</a></h4>
                                <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:share:'.trim($record).'" height="267" width="504" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        </div>
                        ';
                    }
                } else {
                    echo 'The file does not exist or is not readable.';
                }
            ?>
            </div>
        </div>

    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>