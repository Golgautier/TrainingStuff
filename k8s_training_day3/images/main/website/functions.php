<?php

function DisplayValue( $label, $value)
{
    ?>
    <li><?
        if ($value) 
        {
            ?><image id="status" src="images/ok.png" /><?
        }
        else
        {
            ?><image id="status" src="images/ko.png" /><?
        }
        
        if ( is_bool($value))
        {
            if ($value)
            {
                $value="True";
            }
            else
            {
                $value="False";
            }
        }

        print("$label : $value");
    ?></li>
    <?
}