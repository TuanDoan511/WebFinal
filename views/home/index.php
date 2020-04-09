<?php
    echo "<a href='?controller=home&action=index'>My Drive</a>";
    $url = "";

    foreach (explode("/", $dir) as $item) {
        if ($item == "") {
            continue;
    }
        $url = $url . $item . "/";
        echo "  >  <a href='?controller=home&action=index&dir=$url'>$item</a>";
    }

    echo "<br>";

    $files = scandir($dir_path);
    foreach ($files as $file) {
        if (substr($file, 0, 1) == '.'){
            continue;
        }
        if (is_dir($dir_path . "/" . $file)) {
            $file_path = str_replace($root . "/", "", $dir_path . "/" . $file);
            echo "<a href='?controller=home&action=index&dir=$file_path'>$file<a>";
            echo "<br>";
        }
        else
        {
            $file_path = str_replace($root . "/", "", $dir_path . "/" . $file);
            echo "<a href='?controller=home&action=index&file=$file_path'>$file<a>";
            echo "<br>";
        }
    }
?>
    <br>
    <a href="?controller=logout&action=logout">Logout</a>

    <form action="/Final/" method="get">
        <input type="hidden" name="controller" value="home"/>
        <input type="hidden" name="action" value="create_dir"/>
        <input type="hidden" name="dir" value="<?= substr($dir, 1) ?>"/>
        <input type="text" name="new_folder_name"/>
        <input type="submit" value="create new folder"/>
    </form>