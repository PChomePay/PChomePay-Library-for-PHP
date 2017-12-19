<?php
/**
 * Created by PhpStorm.
 * User: river
 * Date: 2016/4/21
 * Time: 10:22
 */

namespace PCPayClient\Storage;


class FileTokenStorageAES implements ITokenStorage
{
    private $fileName;
    private $key;

    public function __construct($filePath, $key)
    {
        $this->fileName = $filePath;
        $this->key = $key = pack('H*', $key);
    }

    /**
     * get jsonlized token from storage
     * @return string return jsonlized string
     */
    public function getTokenStr()
    {
        if (file_exists($this->fileName)) {
            $tokenEnc = file_get_contents($this->fileName);
            $ciphertext_dec = base64_decode($tokenEnc);
            $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
            $iv_dec = substr($ciphertext_dec, 0, $iv_size);
            $ciphertext_dec = substr($ciphertext_dec, $iv_size);
            return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
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
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $token, MCRYPT_MODE_CBC, $iv);
        $ciphertext = $iv . $ciphertext;
        $tokenEnc = base64_encode($ciphertext);

        $r = file_put_contents($this->fileName, $tokenEnc, FILE_TEXT);

        return $r !== false;
    }
}