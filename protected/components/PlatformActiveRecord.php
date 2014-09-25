<?php

class PlatformActiveRecord extends CActiveRecord {
    public function getDbConnection()
    {
        if(self::$db!==null)
            return self::$db;
        else
        {
            //这里就是我们要修改的
            self::$db=Yii::app()->getComponent('db2');
            //self::$db=Yii::app()->db2;
            if(self::$db instanceof CDbConnection)
                return self::$db;
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db2" CDbConnection application component.'));
        }
    }
} 