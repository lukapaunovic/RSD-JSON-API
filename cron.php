<?php
$html = file_get_contents('https://www.nbs.rs/kursnaListaModul/zaDevize.faces?lang=lat');
if (strpos($html,"zaDevize") == false) {
        echo "Connection timed out or the site has changed, check for RSD-JSON-API update on github https://github.com/lukapaunovic/RSD-JSON-API";
        die();
}
file_put_contents('/home/hostleo/public_html/come/nbs.html', $html);
