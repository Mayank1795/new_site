<?php
function get_campaign_id($name){
    global $db;
    $query = $db->query("SELECT campaignID FROM campaigns WHERE name_candidate = '$name'");
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!$query) {
            return $db->errorInfo();;
        } else {
            return $query[0]['campaignID'];
        }

}

function get_contributor_name(){
    global $db;
    $query = $db->query("SELECT name_candidate FROM campaigns ORDER BY name_candidate");
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!$query) {
            return $db->errorInfo();;
        } else {
            return $query;
        }
}

// Functions to filter user inputs
function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
        return $field;
    }else{
        return FALSE;
    }
}    
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    }else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    }else{
        return FALSE;
    }
}
 
 function filterNumeric($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_NUMBER_INT);
    if(!empty($field)){
        return $field;
    }else{
        return FALSE;
    }
}
 
?>