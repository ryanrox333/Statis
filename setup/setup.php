<?php

# Create the config file if it doesn't exist
$config = fopen("../config.php", "w");
if (!file_exists('../config.php')) {
    fwrite($config, "Testing Purposes rn");
    fclose($config);
}

# Create the lock file if it doesn't exist
$lock = fopen("../cache/setup.lock", "w");
if (!file_exists('../cache/setup.lock')) {
    fwrite($lock, "Loaded setup. Go through the setup normally.");
    fclose($lock);
}

# If they directly access the setup and it's already been run, send them a msg
if (file_exists('../cache/setup.lock')) {
    $content = file_get_contents("../cache/setup.lock");
    if(strpos($content, "Setup has finished, please delete this file to run the setup again.") !== false) {
        echo "The setup has already been run, please delete the setup.lock file to run the setup again.";   
    }
}

# Let them setup the panel if it hasn't been run yet

?>