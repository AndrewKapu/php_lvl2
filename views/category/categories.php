<?php
foreach ($categories as $category){
    $content .= "<a href='?c=category&a=show'>{$category->name}</a>";
}
    echo $content;
?>