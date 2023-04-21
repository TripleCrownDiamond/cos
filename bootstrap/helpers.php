<?php
use Illuminate\Support\Str;

define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");
define("OPERATIONS", "operations");
define("CREDIT", "credit");
define("DEBIT", "debit");

define("DEFAULTPASSOWRD", "password");

function userFullName() {
    return auth()->user()->first_name . " " . auth()->user()->last_name ;
}

function userBalance() {
    return auth()->user()->balance;
}

function getAgency() {
    return auth()->user()->agency->agency_name;     
}

function getAgencyId() {
    return auth()->user()->agency->id;     
}

function getRolesName(){
    $rolesName = "";
    $i= 0;
    foreach(auth()->user()->roles as $role){
    $rolesName .= $role->role_name;
    // I
    if($i< sizeof(auth()->user()->roles) -1){
        $rolesName .= ",";
    }
        $i ++;
    }

    if($rolesName === "admin") {
        return "Agence";
    }elseif($rolesName === "manager"){
        return "Manager";
    }else{
        return "Partenaire";
    }
    
}

function welcomeText()
{

    $rolesName = "";
    $i= 0;
    foreach(auth()->user()->roles as $role){
    $rolesName .= $role->role_name;
    // I
    if($i< sizeof(auth()->user()->roles) -1){
        $rolesName .= ",";
    }
        $i ++;
    }

    if($rolesName === "admin") {
        return "Vous êtes l'administrateur de";
    }else if($rolesName === "manager"){
        return "Vous êtes le gérant de";
    }else{
        return "Votre compte a été créé par";
    }
    
}

function setMenuClass($route, $classe){
    $routeActuel = request()->route()->getName();

    if(contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route ){
        return "active";
    }
    return "";
}

function contains($container, $content){
    return Str::contains($container, $content);
}