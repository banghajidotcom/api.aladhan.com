<?php

namespace AlAdhanApi\Helper;

/**
 * Class Response
 * @package Helper\Response
 */
class Response
{
    /**
     * [build description]
     * @param  [type] $data   [description]
     * @param  [type] $code   [description]
     * @param  [type] $status [description]
     * @return [type]         [description]
     */
    public static function build($data, $code, $status)
    {
        return
            [
                'code' => $code,
                'status' => $status,
                'data' => $data
            ];
    }
}
