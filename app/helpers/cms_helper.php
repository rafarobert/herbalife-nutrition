<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/21/2017
 * Time: 2:17 AM
 */

if ( ! function_exists('btn_edit')){
    function btn_edit($uri, $extra = '')
    {
        return anchor($uri, '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', $extra);
    }
}

if ( ! function_exists('btn_delete')) {
    function btn_delete($uri, $extra = '')
    {
        $extra .= " onclick = oCrud.remove('$uri')";
        return button('<i class="fa fa-times" aria-hidden="true"></i>', $extra);
    }
}

if ( ! function_exists('icon'))
{
    function icon($attributes = '')
    {
        if ($attributes !== '')
        {
            $attributes = _stringify_attributes($attributes);
        }

        if (is_array($attributes)){

            $attributes = _attributes_to_string($attributes);
        }

        $tag = isset($attributes['tag'])?$attributes['tag']:'i';

        $title = isset($attributes['title'])?$attributes['title']:'';

        return '<'.$tag.' '.$attributes.'> '.$title.'</'.$tag.'>';
    }
}



if (!function_exists('is_like')) {

    function is_like($var, $value) {

        if(is_string($var) && is_string($value)){

            if($var == strtoupper($value) || $var == ucfirst($value) || strtolower($value)){

                return true;
            }
        }

        return false;
    }
}


    if (!function_exists('getModSubMod')) {
        function getModSubMod($table)
        {
            if (substr_count($table, '_') == 1) {
                return explode('_', $table);
            } else {
                $parts = explode('_', $table);
                $mod = $parts[0];
                unset($parts[0]);
                return [$mod, implode('_', $parts)];
            }
        }
    }
