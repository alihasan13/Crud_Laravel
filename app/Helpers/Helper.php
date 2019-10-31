<?php 
namespace App\Helpers;

Class Helper{
    public static function pageDefine($qpArr){
        //link for same page after query
        $qpStr = '';
        if (!empty($qpArr)) {
            $qpStr .= '?';
            foreach ($qpArr as $key => $value) {
//                echo $value;exit;
                if ($value != '') {
                    
                    $qpStr .= $key . '=' . $value . '&';
                }
            }
            
            $qpStr = trim($qpStr, '&');
//            echo $qpStr;exit;
            return $qpStr;
        }
    }
}

?>