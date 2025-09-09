<!DOCTYPE html>
<html>
    <head>
        <title>Absolute Cinema</title>
        <link rel="stylesheet" href="../styles.css"/>
    </head>
    <body>
        <div class="headContainer">
            <?php
                include("../include/header.php");
                include("../include/navigation.php");
            ?>
        </div>

          <main>
            <h1>My Tickets</h1>
            <div id="myTickets">
            </div>
          </main>
          <script src="script.js"></script>
          <script>
            window.onload = () => {
                displayTransactions();
            }
        </script>
        <?php
            include("../include/footer.php");
        ?>
    </body>
</html>