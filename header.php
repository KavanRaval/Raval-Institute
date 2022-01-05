<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer.css" rel="stylesheet">

    <title>RAVAL INSTITUTE</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <style>
        #hall_of_fame_head {
            background-color: blue;
            color: white;
        }

        #hall_of_fame_sentence {
            background-color: orange;
        }

        .why_us_css {
            padding: 10vh 20vh;

            color: black;
            text-align: justify;
            text-justify: inter-word;
        }

        .about_us_css {
            padding: 10vh 12vh;

            color: black;
            text-align: justify;
            text-justify: inter-word;
        }

        .contact_us_css {
            padding: 10vh 12vh;
            background: black;
            color: white;
            text-align: justify;
            text-justify: inter-word;
        }

        body {
            background-color: #e6ccb3;
        }

        #img_1,
        #img_2,
        #img_4 {
            color: black;
        }

        .footer {
            background-color: #800000;
            color: white;
            text-align: center;
        }

        #construction {
            color: red;
            background-color: white;
        }

        #backtotop:hover {
            fill: #800000;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>

<body>
    <?php

    $CURRENT_PAGE = basename($_SERVER['PHP_SELF']);
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-sm-top" style="background-color: #800000">
        <div class="container-fluid">
            <a class="navbar-brand" href="#top"><img id="logo" width="170px" height="70px" src="ravalinstitute_logo.png" alt="Raval Institute" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo $CURRENT_PAGE == "index.php" ? "active" : "" ?>">
                        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                    </li>

                    <li class="nav-item <?php echo $CURRENT_PAGE == "aboutus.php" ? "active" : "" ?>">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item <?php echo $CURRENT_PAGE == "contactus.php" ? "active" : "" ?>">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>

                    <?php
                    if (isset($_SESSION['USERNAME'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;"><?php echo $_SESSION['USERNAME']; ?></a>
                        </li>


                        <?php
                        if (isset($_SESSION['TYPE']) && $_SESSION['TYPE'] == "2") {
                        ?>
                            <li class="nav-item <?php echo $CURRENT_PAGE == "dashboard.php" ? "active" : "" ?>">
                                <a class="nav-link" href='dashboard.php'>Dashboard</a>
                            </li>
                            <li class="nav-item <?php echo $CURRENT_PAGE == "result.php" ? "active" : "" ?>">
                                <a class="nav-link" href="result.php">Our Results</a>
                            </li>
                        <?php } else {
                        ?>

                            <li class="nav-item <?php echo $CURRENT_PAGE == "dashboard_faculty.php" ? "active" : "" ?>">
                                <a class="nav-link" href='dashboard_faculty.php'>Dashboard</a>
                            </li>
                            <li class="nav-item <?php echo $CURRENT_PAGE == "add_result.php" ? "active" : "" ?>">
                                <a class="nav-link" href="add_result.php">Add Results</a>
                            </li>
                            <li class="nav-item <?php echo $CURRENT_PAGE == "facultyresult.php" ? "active" : "" ?>">
                                <a class="nav-link" href="facultyresult.php">All Results</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link" href='logout.php'>Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item <?php echo $CURRENT_PAGE == "login.php" ? "active" : "" ?>">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>