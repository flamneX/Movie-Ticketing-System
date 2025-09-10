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
            <h1>Ticket Details</h1>
            <div id="ticketInfo"></div>
        </main>
        <script src="script.js"></script>
          <script>
            window.onload = () => {
                displayTickets();
            }
        </script>
        <?php
            include("../include/footer.php");
        ?>
    </body>
</html>