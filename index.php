<?php

# Hello, if you're reading this, then you're kinda cool. Anyways this is the base setup for the panel, checks if it's setup and sends you to the setup page if it's not.
# If it is, it sends you to the login for the panel.

# Create the cache folder if it doesn't exist
if (!file_exists("cache")) {
    mkdir("cache");
}

# Check if the setup has been run before, checking via setup.lock file
if (!file_exists("cache/setup.lock")) {
    $content = file_get_contents("cache/setup.lock");
    if(strpos($content, "Setup has finished, please delete this file to run the setup again.") == false) {
        header("Location: setup/setup.php");
    }
    header("Location: setup/setup.php");
    exit;
}

# If the setup has been run, send to the login page
header("Location: login/login.php");
?>