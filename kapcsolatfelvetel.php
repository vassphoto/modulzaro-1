<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Kapcsolatfelvételi űrlap</title>
</head>

<body>

    <div class="container pt-5">

            <h2 class="col-12 text-center">Kapcsolatfelvétel</h2>

            <div class="col-md-8 col-lg-6 mx-auto">
                <!--   -->
                <form class="row g-3" action="" method="post">

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Vezetéknév</label>
                        <input type="text" class="form-control" id="vezeteknev" name="vezeteknev" placeholder="Vezetéknév">
                    </div>

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Keresztnév</label>
                        <input type="text" class="form-control" id="keresztnev" name="keresztnev" placeholder="Keresztnév">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Telefonszám</label>
                        <input type="phone" class="form-control" id="telefonszam" name="telefonszam" placeholder="Telefonszám">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail cím</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail cím">
                    </div>

                    <div class=" col-12">
                        <label for="targy" class="form-label">Tárgy</label>
                        <input type="text" class="form-control" id="targy" name="targy" placeholder="Üzenet tárgya">
                    </div>

                    <div class=" col-md-12">
                        <label for="uzenet" class="form-label">Üzenet</label>
                        <textarea class="form-control" id="uzenet" rows="3" name="uzenet" placeholder="Üzenet szövege"></textarea>
                    </div>

                    <div class=" col-12 text-center pt-3">
                        <button type="submit" name="elkuldve" class="btn btn-success">Üzenet küldése</button>
                    </div>
                </form>
                <!--   -->
            </div>

            <br>

            <div class="row">

            <?php

            if (isset($_POST["elkuldve"])) {

                $errors = [];
                $length = strlen($_POST["vezeteknev"]);

                if ($length < 2 ||  $length > 60) {
                    $errors[] = 'A vezetéknév minimum 2 maximum 60 karakter lehet!';
                }

                $length = strlen($_POST["keresztnev"]);

                if ($length < 2 ||  $length > 60) {
                    $errors[] = 'A keresztnév minimum 2 maximum 60 karakter lehet!';
                }

                $length = strlen($_POST["telefonszam"]);

                if ($length < 9 ||  $length > 12) {
                    $errors[] = 'A telefonszám minimum 9 maximum 12 karakter lehet!';
                }

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
                    $errors[] = 'Érvénytelen e-mail cím!';
                }

                $length = strlen($_POST["targy"]);

                if ($length < 2 ||  $length > 60) {
                    $errors[] = 'A tárgy minimum 2 maximum 60 karakter lehet!';
                }

                $length = strlen($_POST["uzenet"]);

                if ($length < 10 ||  $length > 600) {
                    $errors[] = 'Az üzenet szövege minimum 10 maximum 600 karakter lehet!';
                }

                if (count($errors) > 0) {
                    //hiba
                    echo '<div class="alert alert-danger col-md-8 col-lg-6 mx-auto" role="alert">';
                    foreach ($errors as $error) {
                        echo "$error <br>";
                    }
                    echo '</div>';
                }   else {
                    echo '<div class="alert alert-success col-md-8 col-lg-6 mx-auto" role="alert">
                    Sikeres Kapcsolatfelvétel!
                </div>';
                }
            }

            ?>            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>