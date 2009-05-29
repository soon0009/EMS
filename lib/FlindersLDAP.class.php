<?php
class FlindersLDAP
{

  public static function checkPassword($username, $password) {
    $servername = "ldap.flinders.edu.au";
    $port       = 389;
    $root       = "ou=people,o=flinders";
    $connection = ldap_connect($servername, $port);
    if ($connection) {
      $search = ldap_search($connection, $root, "(&(cn=$username)(flindersPersonType=H))", array("dn"));
      $search_result = ldap_get_entries($connection, $search);
      if ($search_result['count']) {
        $dn = $search_result[0]["dn"];
        $ldapbind = @ldap_bind($connection, $dn, $password);
        if ($ldapbind) {
          return true;
        }
      }
    }
    return false;
  }
}
