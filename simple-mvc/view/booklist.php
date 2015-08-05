<html>
    <head></head>

    <body>

        <p><u>Bookstore - List of books available</u></p>

        <table>
                <tr><td>Title</td><td>Author</td><td>Description</td></tr>

              <?php 
                   echo '<tr></tr>'
                      . '<tr></tr>'
                      . '<tr><td><a href="index.php?book=' . $books["title"] . '">' . $books["title"] . '</a></td><td>' .  $books["author"].  '</td><td>'.   $books["description"].  '</td></tr>';
                ?>
        </table>

    </body>
</html>
