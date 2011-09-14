<?php
/*
A little proxy script. See README file for license information.
*/

function postData($params, $format = "json") {
    
    
    $params['format'] = $format;
    $fields_string=  http_build_query($params,'','&');
    rtrim($fields_string,'&');
    //$this->log->lwrite("posting qs ".$fields_string);
    $handle = curl_init("http://ws.audioscrobbler.com/2.0/");
    curl_setopt($handle, CURLOPT_POST, true);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $fields_string);
    //curl_exec outputs to stdout. We don't output anything other so its okay
    if( ! $res = curl_exec($handle)) 
    { 
      //  trigger_error(curl_error($handle)); 
    } 
    curl_close($handle);
    //$this->log->lwrite("Result ".$res);
    return $res;
  }

postData($_POST);
?>