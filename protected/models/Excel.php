<?php
/**
 * 导出到excel文件(一般导出中文的都会乱码，需要进行编码转换）
 * 使用方法如下
 * $excel = new Excel();
 * $excel->addHeader(array('列1','列2','列3','列4'));
 * $excel->addBody(
array(
array('数据1','数据2','数据3','数据4'),
array('数据1','数据2','数据3','数据4'),
array('数据1','数据2','数据3','数据4'),
array('数据1','数据2','数据3','数据4')
)
);
 * $excel->downLoad();
 */
class Excel{
    private $head;
    private $body;

    /**
     *
     * @param type $arr 一维数组
     */
    public function addHeader($arr){
        foreach($arr as $headVal){
            $headVal = $this->charset($headVal);
            $this->head .= "{$headVal}\t ";
        }
        $this->head .= "\n";
    }

    /**
     *
     * @param type $arr 二维数组
     */
    public function addBody($arr){
        foreach($arr as $arrBody){
            foreach($arrBody as $bodyVal){
                $bodyVal = $this->charset($bodyVal);
                $this->body .= "{$bodyVal}\t ";
            }
            $this->body .= "\n";
        }
    }

    /**
     * 下载excel文件
     */
    public function downLoad($filename=''){
        if(!$filename)
            $filename = date('YmdHis',time()).'.xls';
//        header("Content-type:application/vnd.ms-excel");
//        header("Content-Disposition:attachment;filename=$filename");
        header("Content-Type:charset=gb2312");
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header("Content-Disposition:attachment;filename=".$filename);
        header("Content-Transfer-Encoding:binary");
        if($this->head)
            echo $this->head;
        echo $this->body;
    }

    /**
     * 编码转换
     * @param type $string
     * @return string
     */
    public function charset($string){
        return iconv("utf-8", "gb2312", $string);
    }
}
?>