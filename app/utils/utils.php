<?php


function presentPrice($price)
{
        $price /=  100;
        return number_format($price,2,',','').' €';
}

