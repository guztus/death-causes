<?php declare(strict_types=1);

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

//        if ($row == 500) {
//            break;
//        }
    }
    fclose($handle);
}

$searchInput = "vardarbīg";

$percentageOfTotal = "" . round(($statistic->getFoundReportCount($searchInput) / $statistic->getTotalReportCount()) * 100);
echo "From {$statistic->getTotalReportCount()} reports {$statistic->getFoundReportCount($searchInput)} matched the search query." . PHP_EOL;
echo "Approx {$percentageOfTotal}%" . PHP_EOL;