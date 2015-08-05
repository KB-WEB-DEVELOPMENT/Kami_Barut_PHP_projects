<html>
    <head></head>

    <body>

        <?php 
                echo '<p><u>Book details</u></p>';

                echo '<p>Title: ' . $bookInfos["title"] . '</p>';
                echo '<p>Author: ' . $bookInfos["author"] . '</p>';
                echo '<p>Description: ' . $bookInfos["description"] . '</p>';

                echo '<p><a href="index.php">Return to booklist</a></p>'; 
        ?>

    </body>
</html>
