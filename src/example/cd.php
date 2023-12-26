<?php

use SurpriseTech\DingtalkApi\Services\ImCardService;

$card_data = [
    'orderSource' => '收款',
    'orderName' => time(),
    'orderTime' => date('Y-m-d'),
];
$dingtalk = new ImCardService();
$dingtalk->sendCard(
    '风险卡片',
    '01b66ccf-5c89-411c-af5b-7e853f1b5588',
    $card_data,
    0,
    null,
    ['211034130726141746']
);
