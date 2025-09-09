<!DOCTYPE html>
<html>
    <head>
        <title>Payment Gateway</title>
        <link rel="stylesheet" href="../styles.css"/>
    </head>
    <body>
        <main>
            <div class="container">
                <h1>Payment</h1>
                <img src="" id="QR" width="400px" height="500px"><br>
                <a href="success.php"><button>CONFIRM PAYMENT</button></a>
            </div>
        </main>
        <script>
            const images = [
                "../images/QR/Angel.png",
                "../images/QR/Jeck.png",
                "../images/QR/Leon.png",
                "../images/QR/Quak.png",
            ];
            let randomIndex = Math.floor(Math.random() * images.length);
            console.log(randomIndex);
            document.getElementById("QR").src = images[randomIndex];
        </script>
    </body>
</html>