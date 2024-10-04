<?
function h1(){ 
  global $APPLICATION; 
  $hide_h1 = $APPLICATION->GetPageProperty("HIDE_H1");  
  if($hide_h1=="Y"){ 
  return false; 
  }else{ 
    $h1 = $APPLICATION->GetTitle(false); 
    $output = '<h1 class="title">'.$h1.'</h1>'; 
   } 
   return $output; 
 } 

function body_class(){
  global $APPLICATION;
  $body_class = $APPLICATION->GetPageProperty("body_class");
  if(!empty($body_class)){
    return $body_class;
  }else{
    return 'page';
  }
}
function top_title(){ 
  global $APPLICATION; 
  $top_title = $APPLICATION->GetPageProperty("top_title");

  if(!empty($top_title)){
    return $top_title;
  }else{
    return false;
  }
}
function top_anons(){ 
  global $APPLICATION; 
  $top_anons = $APPLICATION->GetPageProperty("top_anons");
  if(!empty($top_anons)){
    return $top_anons;
  }else{
    return false;
  }
}
