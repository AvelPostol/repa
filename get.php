<?php
require_once (__DIR__.'/crest.php');

$contact = CRest::call(
    'crm.deal.list',
    [
        'select' => ['ID', 'DATE_CREATE', 'UF_CRM_1693988021524', 'UF_CRM_1693572313224', '*', 'STAGE_ID', 'CATEGORY_ID', 'ASSIGNED_BY_ID'], 
        'filter' => ['CATEGORY_ID' => 0],
    ]
);

header('Content-Type: application/json');
echo json_encode($contact);
