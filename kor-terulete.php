<?php

function kor_terulete($szam, $r=3.14){
    return ($szam * $szam) * $r;
}

print "A kör területe: ". kor_terulete(15);

?>