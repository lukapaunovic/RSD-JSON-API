<?php
$html = file_get_contents('https://www.nbs.rs/kursnaListaModul/zaDevize.faces?lang=lat');
file_put_contents('nbs.html', $html);
