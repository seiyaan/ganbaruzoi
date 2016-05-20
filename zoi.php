<?
header('Content-Type: application/json; charset=utf-8');
require_once("./db/database.php");
require_once("./site_information.php");

$mode = $_POST['mode'];
if (($mode === "add" || $mode === "load") && checkReferer()) {
    $db = new ganbaruzoiDateBase();

    $upper_limited = false;
    if (IP_COUNT_LIMIT <= $db->getIpCount()) {
        $upper_limited = true;
    }

    if ($mode === "add") {
        if ($upper_limited === false) {
            $db->addCount();
        }
    }

    $result = array(
        'success' => true,
        'upper_limited' => $upper_limited,
        'today' => $db->getTodayCount(),
        'total' => $db->getTotalCount(),
        'yesterday' => $db->getYesterdayCount(),
        'today_your' => $db->getIpCount(),
    );
} else {
    $result = array(
        'success' => false,
        'upper_limited' => true,
        'today' => 0,
        'total' => 0,
        'yesterday' => 0,
        'today_your' => 0,
    );
}

$json = json_encode($result);
echo $json;

exit;


function checkReferer()
{
    $result = false;
    $siteUrl = "/^" . urlencode(SITE_URL) . "/";
    if (0 < preg_match($siteUrl, urlencode($_SERVER["HTTP_REFERER"]))) {
        $result = true;
    }
    return $result;
}

