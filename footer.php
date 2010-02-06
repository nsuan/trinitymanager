<?php
$end = microtime_float();
$execution = round($end - $start,3);
$output .= '<div class="footer">
		Page generated in '.$execution.' seconds <br /> TrinityManager v0.1 <br />
		<a href="http://www.trinitycore.org/"><img src="images/logo-trinity.png" alt="trinity core" class="footer"/></a>
        <a href="http://validator.w3.org/check?uri=referer"><img src="images/logo-html.png" alt="xhtml" class="footer"/></a>
		<a href="http://jigsaw.w3.org/css-validator/check?uri=referer&profile=css3"><img src="images/logo-css.png" alt="css" class="footer"/></a>
		<a href="http://www.php.net"><img src="images/logo-php.png" alt="php" class="footer"/></a>
		<a href="http://www.mysql.com"><img src="images/logo-mysql.png" alt="mysql" class="footer"/></a>


</div>
</body>
</html>';
?>