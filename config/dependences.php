<?php
    # We introduce a simple packing system that loads css from css and
    # js from js folders. The index.package.json file holds the filenames of each 
    # file category as well as some other general informations about the site

    # index.package.json holds the main style and js files of all the website
    $main = json_decode(file_get_contents('config/index.package.json'), true);

    if (isset($_GET['Blog'])) {
        $_Title = "Blog";

        $blog = json_decode(file_get_contents('blog/config/blog.package.json'), true);
        $AppInclude = array_merge_recursive($main, $blog);

    } else if (isset($_GET['About'])) {
        $_Title = "AboutMe";
        $AppInclude = $main;

    } else if (isset($_GET['Contact'])) {
        $_Title = "Contact";
        $AppInclude = $main;

    } else if (isset($_GET['Members'])){
        $_Title = "Members";

        $members = json_decode(file_get_contents('members/config/members.package.json'), true);
        $AppInclude = array_merge_recursive($main, $members);

    } else {
        $_Title = "Index";
        $AppInclude = $main;
    }
?>
