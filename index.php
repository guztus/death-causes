<?php

//$handle = fopen('vtmec-causes-of-death.csv', "r");
//$csv = fgetcsv($handle, 1000, ",");
//
//var_dump($csv);

class Row
{
    private string $date;
    private string $reason;
    private array $causes;

    public function __construct(string $date, string $reason, array $causes = [])
    {
        $this->date = $date;
        $this->reason = $reason;
        $this->causes = $causes;
    }
}

$rows = [];

$row = 1;
if (($handle = fopen("vtmec-causes-of-death.csv", "r")) !== false) {

    while (($data = fgetcsv($handle, 1000)) !== false) {
        $num = count($data);

        $row++;

        $deathCause = "Sirds asinsvadu slimības";
//        what we want is stored in $data[3]. so return only those RESULTS that match "Sirds asinsvadu slimības".
        if (strpos($data[3], $deathCause)) {
            echo "$row: " . PHP_EOL;

            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . PHP_EOL;
            }
            echo PHP_EOL;
        }

        $causes = explode(';', $data[3]);
        $rows[] = new Row($data[1], $data[2], array_filter($causes));

    }

    fclose($handle);
}