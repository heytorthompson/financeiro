<?php

/*
 ************************************************************************
 PagSeguro Config File
 ************************************************************************
 */

$PagSeguroConfig = array();

//$PagSeguroConfig['environment'] = array();
$PagSeguroConfig['environment'] = "production"; // production, sandbox

$PagSeguroConfig['credentials'] = array();
$PagSeguroConfig['credentials']['email'] = "your_pagseguro_email";
$PagSeguroConfig['credentials']['token']['production'] = "827946C622AA4CDE890E651ACEBF95FB";
$PagSeguroConfig['credentials']['token']['sandbox'] = "your_sandbox_pagseguro_token";

$PagSeguroConfig['application'] = array();
$PagSeguroConfig['application']['charset'] = "UTF-8"; // UTF-8, ISO-8859-1

$PagSeguroConfig['log'] = array();
$PagSeguroConfig['log']['active'] = false;
$PagSeguroConfig['log']['fileLocation'] = "";
