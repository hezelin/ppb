<?php

/*
 * 系统工具，常用函数
 * @author harry
 * @time 2014-8-9
 */

class ToolBase {

    /*
     * 获取随机数
     */
    public static function getSalt($len=8)
    {
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        for($i=0,$salt='';$i<$len;$i++)
            $salt.=$str[mt_rand(0,61)];
        return $salt;
    }

    /*
     * 循环嵌套建立目录
     */
    public static function newDir($dir,$preDir=''){
        $parts = explode('/', $dir);
        $dir = $preDir;
        foreach($parts as $part)
            if(!is_dir($dir .= "/$part")) mkdir($dir,0755);
        return $dir;
    }

    /*
     * 图片压缩
     * @param string $srcFile 图片源包含绝对路径,
     * @param string $dstFile 压缩后图片路径包含图片名
     * @param int : $max_width 宽度，$max_height 高度，$imgQuality 清晰度
     */
    public static function mt($srcFile,$dstFile,$max_width=150,$max_height=150,$imgQuality=100){
        ini_set("gd.jpeg_ignore_warning", 1);
        $data=@getimagesize($srcFile);
        if(  ($data[1]*$max_width-$data[0]*$max_height)>=0 && $data[1]>$max_height ){
            $height=$max_height;
            $width=intval($height*$data[0]/$data[1]);
        }
        else if(  ($data[1]*$max_width-$data[0]*$max_height)<0 && $data[0]>$max_width ){
            $width=$max_width;
            $height=intval($width*$data[1]/$data[0]);
        }
        else if( $data[0]<=$max_width && $data[1]<=$max_height){
            $width=$data[0];
            $height=$data[1];
        }

        switch($data[2]){
            case 1:
                $im=@imagecreatefromgif($srcFile);
                break;
            case 2:
                $im=@imagecreatefromjpeg($srcFile);
                break;
            case 3:
                $im=@imagecreatefrompng($srcFile);
                break;
        }
        $srcW=@imagesx($im);
        $srcH=@imagesy($im);
        $ni=@imagecreatetruecolor($width,$height);
        @imagecopyresampled($ni,$im,0,0,0,0,$width,$height,$srcW,$srcH);
        switch($data[2]){
            case 'gif':@imagepng($ni,$dstFile, $imgQuality); break;
            case 'jpeg':@imagejpeg($ni,$dstFile, $imgQuality); break;
            case 'png':@imagepng($ni,$dstFile, $imgQuality); break;
            default:@imagejpeg($ni,$dstFile, $imgQuality); break;
        }
        return array('width'=>$width,'height'=>$height);
    }

    /*
     * 截取图片
     * bool imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
     * dst_image 目标图象连接资源。
     * src_image 源图象连接资源。
     * dst_x 目标 X 坐标点。
     * dst_y 目标 Y 坐标点。
     * src_x 源的 X 坐标点。
     * src_y 源的 Y 坐标点。
     * dst_w 目标宽度。
     * dst_h 目标高度。
     * src_w 源图象的宽度。
     * src_h 源图象的高度。
     */
    public static function cutImg($srcFile,$dstFile,$max_width=236,$max_height=9800,$imgQuality=100){
        ini_set("gd.jpeg_ignore_warning", 1);
        $data=@getimagesize($srcFile);
        $isCut = false;
        if( $data[0] > 236 && ( $data[1] - $data[0]*3) >0 ){

            // 缩略图 宽236px,高度当> 700 的时候，随机剪切为 520,540,580,620,680
            $rand = array(520,540,580,620,680);
            $width = 236;
            $height = $rand[array_rand($rand)];
            $isCut = true;

        }
        else if(  ($data[1]*$max_width-$data[0]*$max_height)>=0 && $data[1]>$max_height ){
            $height=$max_height;
            $width=intval($height*$data[0]/$data[1]);
        }
        else if(  ($data[1]*$max_width-$data[0]*$max_height)<0 && $data[0]>$max_width ){
            $width=$max_width;
            $height=intval($width*$data[1]/$data[0]);
        }
        else if( $data[0]<=$max_width && $data[1]<=$max_height){
            $width=$data[0];
            $height=$data[1];
        }

        switch($data[2]){
            case 1:
                $im=@imagecreatefromgif($srcFile);
                break;
            case 2:
                $im=@imagecreatefromjpeg($srcFile);
                break;
            case 3:
                $im=@imagecreatefrompng($srcFile);
                break;
        }
        $srcW=@imagesx($im);
        if($isCut) $srcH = $srcW*$height/$width;
        else $srcH=@imagesy($im);

        $ni=@imagecreatetruecolor($width,$height);
        @imagecopyresampled($ni,$im,0,0,0,0,$width,$height,$srcW,$srcH);
        switch($data[2]){
            case 'gif':@imagepng($ni,$dstFile, $imgQuality); break;
            case 'jpeg':@imagejpeg($ni,$dstFile, $imgQuality); break;
            case 'png':@imagepng($ni,$dstFile, $imgQuality); break;
            default:@imagejpeg($ni,$dstFile, $imgQuality); break;
        }
        return array('width'=>$width,'height'=>$height);
    }
} 