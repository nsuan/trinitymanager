<?php
$end = microtime_float();
$execution = round($end - $start,3);
$output .= '<div class="footer">
		Page generated in '.$execution.' seconds <br /> TrinityManager v0.1 <br />
		<a href="http://www.trinitycore.org/"><img src="images/logo-trinity.png" alt="php" class="footer" border="0" /></a>
		<a href="http://www.mysql.com/"><img src="images/logo-mysql.png" alt="mysql" class="footer" border="0" /></a>
		<a href="http://www.php.net/"><img src="images/logo-php.png" alt="php" class="footer" border="0" /></a>
		<img src="images/logo-css.png" alt="css" class="footer" />
		<img src="images/logo-html.png" alt="html" class="footer" />

</div>
</body>
</html>';
?>