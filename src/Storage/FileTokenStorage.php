<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/21
 * Time: 10:22
 */

namespace PCPayClient\Storage;


class FileTokenStorage implements ITokenStorage
{
    private $fileName;

    public function __construct($filePath = null)
    {
        if($filePath == null){
            $this->fileName = dirname(__FILE__, 2)."token.json";
        }else{
            $this->fileName = $filePath;
        }
    }

    /**
     * get jsonlized token from storage
     * @return string return jsonlized string
     */
    public function getTokenStr()
    {
        if(file_exists($this->fileName)) {
            return file_get_contents($this->fileName);
        }

        return false;
    }

    /**
     * save jsonlized token to storage
     * @param $token string
     * @return boolean true while success, false when fail.
     */
    public function saveTokenStr($token)
    {
        $r = file_put_contents($this->fileName, $token, FILE_TEXT);

        return $r !== false;
    }
}