<!DOCTYPE html>
<head><title>Charles Severance MD5 Cracker</title></head>
<body>
<h1>ARAULLO, EUGENIO EMMANUEL (AGOJO): My MD5 cracker</h1>
<h2>Via brute-force, my program attempts to know the PIN value of the MD5 given.</h2>
Debug Output:
<?php

// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // static values
    $show = 10;
    $length = 6;
    $limit = 1000000;
    $digit = 0;
    $goodtext = "No Input";
    print "<pre>";
    for($count=0; $count<=$limit; $count++){
        $try = strval($count);
        while (strlen($try) < $length) {
            $try = $digit.$try;
        }
        $check = hash('md5', $try);
        if ($count < $show) print "trying: $try\n";
        if ( $check == $md5 ) {
            $goodtext = $try;
            print "\n<h1>PIN: $goodtext\n</h1>";
            break;
        }
    }
    print "</pre>";

    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
} else print "No Input";
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<form>
<input type="text" name="md5" size="40">
<input type="submit" value="Crack MD5">
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>
