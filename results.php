<?php

function grabTheTextFile($url = 'http://google.com/robots.txt'){
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HEADER, false);
  return curl_exec($curl);
  curl_close($curl);
}

  if($_GET["q"]){
  
    $getTextFile = grabTheTextFile("[MYTEXTFILEURL]");
    
    $FileArray = explode($getTextFile, "\n");
    $found = false;
    
    foreach($FileArray as &$FileItem){
    
      $ThisTextFormat = explode($FileItem, ":");
      if($ThisTextFormat[0] == $_GET["q"]){
        $found = true;
        echo $ThisTextFormat[0]." was last logged in on ".$ThisTextFormat[1];
      
      }
      

    }
    
    if(!$found){
      echo"No results found for <b>".$_GET["q"]."</b>";
    }


  }
  else{
    echo"No Results found, please enter a query.";
  }

?>
