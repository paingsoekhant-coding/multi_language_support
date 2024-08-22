<?php
include('language.php');
$eng = '';
$franc = '';
$language = '';
if ((isset($_GET['language']) && $_GET['language'] == 'eng') || !isset($_GET['language'])) {
    $eng = "selected";
    $language = 'eng';
} else {
    $franc = "selected";
    $language = 'franc';
}

$con = new mysqli('localhost', 'root', '', 'multi_language');
$sql_query = "SELECT * FROM content WHERE language='$language'";
$r = $con->query($sql_query);
$data = $r->fetch_all(MYSQLI_ASSOC);

// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Language</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg mt-5 d-flex justify-content-between">
        <div class="container-lg">
            <a class="navbar-brand" href="" style="color:darkviolet;">
                <h4 class="fw-bold"><?php echo $navBar[$language][0]; ?></h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-dark fs-5" aria-current="page" href=""><?php echo $navBar[$language][1]; ?></a>
                    <a class="nav-link  fs-5" href=""><?php echo $navBar[$language][2]; ?></a>
                    <a class="nav-link  fs-5" href=""><?php echo $navBar[$language][3]; ?></a>
                    <a class="nav-link  fs-5" href=""><?php echo $navBar[$language][4]; ?></a>
                    <a class="nav-link  fs-5" href=""><?php echo $navBar[$language][5]; ?></a>
                </div>

            </div>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                <h6 class="m-3">Language</h6>
                <div class="navbar-nav">

                    <select onchange="set_language()" name="" class="form-select" id="language">

                        <option value="eng" <?php echo $eng ?>>English</option>
                        <option value="franc" <?php echo $franc ?>>French</option>
                    </select>

                </div>

            </div>

        </div>
    </nav>

    <div class="container mt-4">
        <p><?php echo $data[0]['page_content']; ?></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function set_language() {
            var language = jQuery('#language').val();
            window.location.href = 'http://localhost:8000/?language=' + language;
        }
    </script>
</body>

</html>