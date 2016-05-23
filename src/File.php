<?php

namespace Andychey\Util;


class File
{
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
        } else if (Client::isFirefox()) {
            header("Content-Disposition: attachment; filename*=\"utf8''" . $filename . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $filename . '"');
        }

        header("Content-Length: ". filesize($file));
        
        readfile($file);
    }
}