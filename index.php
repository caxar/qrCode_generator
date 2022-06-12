<?PHP 
    if(isset($_POST['submit'])) {
        $data = $_POST['data'];
        function getQr($data) {
            $size = $_POST['size']; // получение размера из формы
            $color = str_replace('#', '', $_POST['color']); // удаление знака # из цвета 
            $api = "http://chart.apis.google.com/chart?";                
            return $api.'chs=' . $size . '&cht=qr&chl=' . urlencode($data).'&chco='.$color;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>QR</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Create QR Code</h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Title Qr-code</label>
                                <input type="text" name="data" class="form-control" placeholder="QR code">
                            </div>
                            <div class="form-group">
                                <label for="">Size</label>
                                <input type="text" name="size" class="form-control" placeholder="200x200">
                            </div>
                            <div class="form-group">
                                <label for="">Pick color</label>
                                <input type="color" name="color" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block mt-3" type="submit" name="submit">Generate</button>
                            </div>
                            <h2>Result:</h2>
                        </form>
                        <?php if(isset($_POST['data'])){ ?>
                                    <div class="text-center ">
                                        <img src="<?php echo getQr(trim($_POST['data'])); ?>" />
                                    </div>
                                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>