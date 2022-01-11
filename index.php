<!DOCTYPE html>
<head><title>ARAULLO, EUGENIO EMMANUEL</title></head>
<body>
<h1>ARAULLO, EUGENIO EMMANUEL (AGOJO): My MD5 cracker</h1>
<h3>Via brute-force, my program attempts to know the PIN value of the MD5 given.</h3>
<?php

// If there is no parameter, this code is all skipped
$goodtext = "PIN: Not Found";
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // static values
    $show = 15;
    $length = 4;
    $limit = 10000;
    $digit = 0;

    print "<pre>Debug Output<br>";
    for($count=0; $count<$limit; $count++){
        $try = strval($count);
        while (strlen($try) < $length) {
            $try = $digit.$try;
        }
        $check = hash('md5', $try);
        if ($count < $show) print "trying: $try\n";
        if ( $check == $md5 ) {
            $goodtext = $try;
            break;
        }
    }
    print "</pre>";
    print "Total Checks: $count";
    print "<h2>PIN: $goodtext</h2>";

    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "<br><br>";
} else {
    $md5 = "";
    print "<h2>$goodtext</h2>";
}
?>
</pre>
<form>
    <?php
        print "<input type='text' name='md5' size='40' value='$md5'>  ";
        print "<input type='submit' value='Crack MD5'>";
    ?>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/ginomeee/md5-cracker"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>
