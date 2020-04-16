<?php
echo "<style>td{border: 2px dashed };</style>";
if (!$_REQUEST["month"] == "") {
    $month = $_REQUEST["month"];
} else {
    $month = date('Y-m');
};
try {
    $mStartDate = new DateTime("$month-01 00:00:00", new DateTimeZone("Europe/Moscow"));
} catch (Exception $e) {
}
//var_dump($mStartDate);
//var_dump($mStartDate->format('d w m'));
$calendar = array();
$step = new DateInterval("P1D");
$daysInMonth = $mStartDate->format("t");
$period = new DatePeriod($mStartDate, $step, (int)$daysInMonth - 1);
//$weekdays = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
$firstNumberOfDayInMonth = $mStartDate->format("w");
switch ($firstNumberOfDayInMonth) {
    case 0:
        $calendar = array_fill(0, 6, "*");
        break;
    default:
        $calendar = array_fill(0, $firstNumberOfDayInMonth - 1, "*");
        break;
}
foreach ($period as $date) {
    array_push($calendar, date_format($date, "j"));
}
for ($i = 0; $i < 35 - sizeof($calendar) + 2; $i++) {
    array_push($calendar, "*");
}
$table = "<table>";
$dayCounter = 0;
for ($j = 1; $j < 6; $j++) {
    $table .= "<tr>";
    for ($i = 1; $i < 8; $i++) {
        $color = '#000000';
        if ($i >= 6) {
            $color = 'ff0000';
        }
        if (date("j") == $calendar[$dayCounter]) {
            $fontweight = "bold";
        } else {
            $fontweight = "normal";
        }
        $table .= "<td style='color:{$color}; font-weight: {$fontweight}'>" . $calendar[$dayCounter] . "</td>";
        $dayCounter++;
    }
    $table .= "</tr>";
}
$table .= "</table>";
echo $table;
?>
