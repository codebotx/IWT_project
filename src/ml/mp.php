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
</head>

<body>

    <div class='d-flex align-items-center justify-content-center  mt-5' style=" min-height: 20vh ">
        <div>
            <div class='w-100' style="max-width: 500px">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Marks Predictor</h1>
                        <form action="#" method="post">
                            <div class="container-fluid pt-2">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Hours Studied: <p> ( <i>Range between 0-8</i> )</p> </label>

                                    <input type="number" class="form-control" id="num" name="num">
                                </div>
                            </div>

                            <div class=" d-flex align-items-center justify-content-center ">
                                <button type="submit" class="btn btn-primary mx-1 " id="butsubm" name="SubmitButton">Predict</button>

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