<?php

function get_campaign_details($username){
    global $db;
    $query = $db->query("SELECT name_person, name_candidate, election_year, election_type, office_sought, username, email FROM campaigns WHERE username = '$username'");
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($query)
    return $query;
}

?>