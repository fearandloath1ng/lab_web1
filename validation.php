<?php



function valid($X, $Y, $R)
{
    if(filter_input(INPUT_GET, "X_checkbox", FILTER_VALIDATE_FLOAT) && filter_input(INPUT_GET, "Y", FILTER_VALIDATE_FLOAT) && filter_input(INPUT_GET, "R", FILTER_VALIDATE_FLOAT)) {
        $FX = floatval($X);
        $FY = floatval($Y);
        $FR = floatval($R);

        if(($FX >= -4 && $FX <= 4) && ($FY > -3 && $FY < 3) && ($FR >= 1 && $FR <= 5)) { // лень вбивать все точки

            return true;
        }


    }

return false;
}



?>