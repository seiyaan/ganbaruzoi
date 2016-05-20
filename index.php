<?php

require_once("./site_information.php");
require_once("./MySmarty.class.php");
require_once("./db/database.php");

$template = "index.tpl";

$objSmarty = new MySmarty();
$db = new ganbaruzoiDateBase();
$zoiCount = array(
    'today' => $db->getTodayCount(),
    'total' => $db->getTotalCount(),
    'yesterday' => $db->getYesterdayCount(),
    'today_your' => $db->getIpCount(),
);

$testMode = false;
$objSmarty->assign("zoiCount", $zoiCount);
$objSmarty->display($template);
