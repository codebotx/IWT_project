<?php
if (isset($_POST['SubmitButton'])) { // Check if form was submitted
    $input = $_POST['num']; // Get input text
    $message = "Success! You entered: " . $input;
    $myfile = fopen("./c.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $input);
    fclose($myfile);
    // $handle = popen('../src/ml/mp.py', 'r');
    // echo "'$handle'; " . gettype($handle) . "\n";
    $output = `conda activate base && python mp.py`;
    // echo "<pre> $output </pre>";

}
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Predictor</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }

        h1 {
            font-weight: 400;
        }

        p {
            font-weight: 300;
            font-size: 15px;
        }
    </style>
    <script>
        function formValidation() {
            var x = document.forms["myForm"]["num"].value;
            if (x == "") {
                alert("Please enter a number");
                return false;
            }
        }
    </script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.html">e-SIT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            E-Exam
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Educational Institue</a></li>
                            <li><a class="dropdown-item" href="#">Corporate</a></li>
                            <li><a class="dropdown-item" href="#">Schools</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Entrance Exams</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            E-Repository
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../src/branch.html#1">CSE</a></li>
                            <li><a class="dropdown-item" href="../src/branch.html#2">ECE</a></li>
                            <li><a class="dropdown-item" href="../src/branch.html#3">EEE</a></li>
                            <li><a class="dropdown-item" href="../src/branch.html#4">EIE</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>


                            <li><a class="dropdown-item" href="../src/notes.html">Notes and resources</a></li>
                        </ul>
                    </li>


                    <li>
                        <a class="nav-link " href="../src/openforum.html" role="button" aria-expanded="false">
                            Open Forum
                        </a>

                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="../src/index.html" tabindex="-1">Database Integration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../src/portfolio.html" tabindex="-1">About Me</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1">Marks Predictor</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../src/login.html" tabindex="-1">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class='d-flex align-items-center justify-content-center  mt-5' style=" min-height: 20vh ">
        <div>
            <div class='w-100' style="max-width: 500px">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Marks Predictor</h1>
                        <form action="#" method="post" >
                            <div class="container-fluid pt-2">
                                <div class="mb-3">
                                    <label for="nums" class="form-label">Hours Studied: <p> ( <i>Range between 0-8</i> )</p> </label>

                                    <input type="number"min="0" max="8" class="form-control" id="num" name="num" text='black'>
                                </div>
                            </div>

                            <div class=" d-flex align-items-center justify-content-center ">
                                <button type="submit" class="btn btn-primary mx-1 " id="butsubm" name="SubmitButton" onSubmit = >Predict</button>

                            </div>
                            <div class="card my-2">
                                <div class="card-body" id="uname">
                                    <h5 class="card-title">Predicted Marks:</h5>
                                    <p class="card-text" id="pred">
                                        <?php
                                        if (isset($_POST['SubmitButton'])) {
                                            $myfile = fopen("./output.txt", "r") or die("Unable to open file!");
                                            $pred = fgets($myfile);
                                            echo $pred;
                                            fclose($myfile);
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</body>

</html>