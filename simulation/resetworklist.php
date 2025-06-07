<?php
// File: reset_worklist.php

$jsonFile = '../worklist.json';

// Overwrite the file with an empty JSON array
file_put_contents($jsonFile, "[]");

echo "<h2>The WorkList has been reset successfully.</h2>";
echo "<p><a href='inputworklist.php'>Go back to the form</a></p>";


