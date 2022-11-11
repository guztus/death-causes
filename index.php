<?php

require_once "Row.php";
require_once "Statistic.php";

$statistic = new Statistic();

$row = -1;
if (($handle = fopen("vtmec-causes-of-death.csv", "r")) !== false) {

    while (($data = fgetcsv($handle, 1000)) !== false) {
        $row++;
        if ($row == 0) {
            $statistic->addHeader(new Row($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]));
            continue;
        }

        $newRow = new Row($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
        $statistic->addData($newRow);

        if ($row == 7) {
            break;
        }
    }
    fclose($handle);
}

//var_dump($statistic->getData());
var_dump($statistic->getByDeathCause('Nevardarbīga nāve'));
var_dump($statistic->getDeathCauseCount('Nevardarbīga nāve'));
//var_dump($statistic->getByNonViolentCause('Sirds asinsvadu slimības'));


var_dump("Total reports: " . $statistic->getTotalReports());