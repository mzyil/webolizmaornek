<?php
/**
 * Created by PhpStorm.
 * User: Melih
 * Date: 11/27/2016
 * Time: 2:59 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Collection;

class ViewHelpers
{
    /**
     * @param Collection $data
     * @param $valueField
     * @param $optionName
     * @return array
     */
    public static function formSelectFlatter(Collection $data, $valueField, $optionName)
    {
        $returnArray = [];
        foreach ($data as $currData){
            $returnArray[$currData->$valueField] = $currData->$optionName;
        }
        return $returnArray;
    }
}