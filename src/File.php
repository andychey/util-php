<?php

namespace Andychey\Util;


class File
{
    /**
     * 创建文件的目录结构
     *
     * @param $filename
     * @param int $mode
     */
    public static function mkdirForFile($filename, $mode = 0755)
    {
        $dir = dirname($filename);
        if (! is_dir($dir)) {
            mkdir($dir, $mode, TRUE);
        }
    }
    
    /**
     * 文件下载
     *
     * @param $file
     */
    public static function download($file)
    {
        $filename = basename($file);

        header("Content-type: application/octet-stream");
        
        // 中文文件名
        if (Client::isIE()) {
            $encoded_filename = rawurlencode($filename);
            header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $filename . '"');
        }

        header("Content-Length: " . filesize($file));
        
        readfile($file);
    }
}