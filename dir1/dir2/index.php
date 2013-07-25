<?php
echo str_replace(DIRECTORY_SEPARATOR, "/", dirname(__FILE__)) ."<br />";
echo $_SERVER["REQUEST_URI"];