<?php

namespace Baratheon;

use Dayle\Blog as Cms;

// app/routes.php

$post = new Cms\Content\Post; // loads Post() in Dayle\Blog\Content\
$page = new Cms\Content\Page; // loads Page() in Dayle\Blog\Content\
$tag  = new Cms\Tag; // loads Tag() in Dayle\Blog\ 


?>
