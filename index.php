<!DOCTYPE html>
<html lang="en">

<head>
    <title>QR Scanner</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="circle1"></div>
        <div class="circle2"></div>
        <div class="circle3"></div>

        <div class="main">
            <div class="text-content col-lg-6 col-md-6 col-sm-6">
                <div class="text-overlay">
                    <p class="heading">STUDENT QR ID SCANNER</p>
                    <p class="sub-head">Scan your qrcode here!</p>

                    <div class="form-div col-lg-6 col-md-6 col-sm-6">
                        <form action="index1.php" method="post" class="form-horizontal" id="form-id">
                            <input type="text" name="text" id="text" readonyy="" placeholder="QR CODE VALUE">
                        </form>

                    </div>
                </div>
            </div>

            <div class="camera-container  col-md-6 col-sm-6">
                <video id="preview" class="preview" width="100%" height="50%"></video>
                <div class="ocrloader  col-md-6 col-sm-6">

                    <p>Scanning</p>
                    <em></em>
                    <span></span>
                </div>

                <div class="qr-container  col-md-6 col-sm-6">
                    <img src="qr.png" id="qr" alt="">
                </div>
            </div>

        </div>
    </div>
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found!');
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
            document.forms[0].submit();
        });
    </script>
</body>

</html>

</html>