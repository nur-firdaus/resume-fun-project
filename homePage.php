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
        <li><a href="index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          
    </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <form action="homePage.php" method="post">
                <div class="form-group mt-3">
                    Write a Linkedin post from this website, it will be automatically publish to linkedin site
                </div> 
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div> 
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

        </div>
        <div class="container mt-5">
        <h1>Simple Blog</h1>
        <hr>
        <form action="add_post.php" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Post</button>
        </form>
        <hr>
    </div>
    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
        <div class="section-title">
            <h2>Shared Status</h2>
        </div>
        <?php
            function writeFile($messageID) {
                $parts = explode(":", $messageID);
                $numericPart = end($parts);
                $numericPart=','.$numericPart;
                // File path
                $filePath = 'dataId.txt'; // Replace with your file path

                // Open the file in append mode or create it if it doesn't exist
                $file = fopen($filePath, 'a');

                if ($file === false) {
                    echo 'Error opening the file';
                } else {
                    // Write the new data to the file
                    fwrite($file, $numericPart);
                    fclose($file);
                    echo 'Data appended successfully!';
                }
            }
            function sendDataWithToken($message) {
                $url = 'https://api.linkedin.com/v2/ugcPosts'; // Replace with your API endpoint
                $token = 'AQUfV-MYs5PIyg1XnN8wqAuBMQpjorG3dji9BRaKL4jgJeck0O_4Q6gVA0Bzu-aPkUyMNXnOm6a1gq2OXssnSQ_5E3x-R9xSn8tEZYIQuTeb_nZ-n3JJu2LJmHu8xcyU742XCGed-7v3IgjVR85hfHQR9G3e4DE08LfKXJRCLSymnw8ZpmhWYzaqJUPWJN-9IyXGmiCSqm74JD6r9-65Ru0eNyZWZsYL2GxR0ncX-feaePoQ-q-emI7Zyu07OMNM5tnyUo95YOdHsXCCMSTYKgBXWYdHsqhAl5mXogifboCybnMqbYBssctccmXnUgVEGYRIyIbhHusS8KmKKvL_dD9KN-6Npg';

                $data = [
                    "author" => "urn:li:person:v7WVtfqLYS",
                    "lifecycleState" => "PUBLISHED",
                    "specificContent" => [
                        "com.linkedin.ugc.ShareContent" => [
                            "shareCommentary" => [
                                "text" => $message
                            ],
                            "shareMediaCategory" => "NONE"
                        ]
                    ],
                    "visibility" => [
                        "com.linkedin.ugc.MemberNetworkVisibility" => "PUBLIC"
                    ]
                ];

                $headers = [
                    'Authorization: Bearer ' . $token,
                    'Content-Type: application/json'
                ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

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
                        echo '<div class="section-title">
                            <h2>'.$decodedResponse['id'].'</h2>
                        </div>';
                        writeFile($decodedResponse['id']);
                        
                    } else {
                        echo 'Error: Unable to decode JSON response';
                    }
                }
                curl_close($curl);
            }


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['message'])) {
                    $message = $_POST['message'];
                    sendDataWithToken(htmlspecialchars($message));
                    // Here, you can process the message as needed
                    // For demonstration, let's just display it
                } else {
                    echo "<p>No message received</p>";
                }
            } 
        ?>
    </section><!-- End Resume Section  https://www.linkedin.com/in/firdaus-forsocialmedia-556b132a3/recent-activity/all/-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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