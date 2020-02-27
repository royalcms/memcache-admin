<?php


namespace App\Memadmin;


class Helper
{
    /**
     * array to utf8 & urlencode
     *
     */
    public static function arrayRecursive(&$array, $function, $apply_to_keys_also = false, $cs = null) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                self::arrayRecursive($array[$key], $function, $apply_to_keys_also, $cs);
            } else {
                $array[$key] = $function(self::toutf8($value, $cs));
            }

            if ($apply_to_keys_also && is_string($key)) {
            }
        }
    }
    /**
     * return json string
     *
     * @return string
     */
    public static function array2json($array, $cs)
    {
        self::arrayRecursive($array,'urlencode',true,$cs);
        return json_encode($array);
    }
    /**
     * auto charset to utf8
     *
     * @return string
     */
    public static function toutf8($i, $t)
    {
        switch($t) {
            case 'UTF-8':
                $i=@iconv("UTF-8","UTF-8//IGNORE",$i);
                return $i;
                break;
            case 'GBK':
                $i=@iconv("GBK","UTF-8//IGNORE",$i);
                return $i;
                break;
            case 'GB2312':
                $i=@iconv("GB2312","UTF-8//IGNORE",$i);
                return $i;
                break;
            case 'GB18030':
                $i=@iconv("GB18030","UTF-8//IGNORE",$i);
                return $i;
                break;
            case 'Latin-1':
                $i=@iconv("ISO-8859-1","UTF-8//IGNORE",$i);
                return $i;
                break;
            default:
                $i=@iconv("UTF-8","UTF-8//IGNORE",$i);
                return $i;
        }
    }

    /**
     * debug
     *
     * @param string $state state
     */
    public static function debug($state = '')
    {
        list($usec, $sec) = explode(" ", microtime());
        $time = ((float)$usec + (float)$sec);
        if ($state == '') {
            $GLOBALS['memoryStart'] = memory_get_usage();
            $GLOBALS['timeStart'] = $time;
        } else {
            $GLOBALS['timeEnd'] = $time;
            $GLOBALS['memoryEnd'] = memory_get_usage();
            $memory = ($GLOBALS['memoryEnd'] - $GLOBALS['memoryStart']) - 216;
            printf ("<span id=\"webruntime\">Run Time : %.2f ms</span><span id=\"webrunmem\">Run Memory : {$memory} byte</span>", ($GLOBALS['timeEnd'] - $GLOBALS['timeStart']) * 1000);
            unset($GLOBALS['memoryStart'], $GLOBALS['timeStart'], $GLOBALS['timeStart'], $GLOBALS['timeEnd'], $GLOBALS['memoryEnd']);
        }
    }

}