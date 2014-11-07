<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14-10-30
 * Time: 上午9:59
 */

class ToolTime {
    private $_startTime;

    /*
     * 计时开始时间
     */
    public function __construct(){
        set_time_limit(0);				//不超时连接
        $this->_startTime = microtime();
    }

    /*
     * 计算时间，并且显示 右上角
     */
    public function __destruct(){
        list($m,$s) = explode(' ', $this->_startTime);
        list($m2,$s2) = explode(' ', microtime());
        echo '<h1 style="color: red;background: #fff; width: 200px; height: 50px; line-height: 50px; position: fixed;top: 0; right: 0;">
             执行时间 = ',($m2-$m+$s2-$s),' 秒
            </h1>';
    }
} 