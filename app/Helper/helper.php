<?php
    class Helper{

        public static function _getPrice($price, $tygia= 1)
        {
            if(\LaravelLocalization::getCurrentLocale() == 'en'){
                $price = number_format($price/$tygia, 2);
            }else{
                $price =number_format($price);
            }
            return $price;
        }
    }
