<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14-10-17
 * Time: 上午9:34
 */

class ToolDebug {
    /*
     * 打印数组
     */
    public static function dArray(array $arr,$isEnd=false)
    {
        header('content-Type:text/html;charset=utf-8');
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        if($isEnd)
            Yii::app()->end();
    }

    /*
     * 打印json
     */
    public static function dJson(array $arr,$isEnd=false)
    {
        header('content-Type:text/html;charset=utf-8');
        echo '<pre>';
        echo json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        echo '</pre>';
        if($isEnd)
            Yii::app()->end();
    }
} 