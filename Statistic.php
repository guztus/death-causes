<?php

require_once "Row.php";

class Statistic
{
    private Row $header;
    private array $data = [];

    public function addData(Row ...$rows)
    {
        $this->data = array_merge($this->data, $rows);
    }

    public function addHeader(Row $headerRow)
    {
        $this->header = $headerRow;
    }

    public function getHeader(): Row
    {
        return $this->header;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getTotalReports(): int
    {
        return count($this->data);
    }

    public function getByDeathCause(string $deathCause): array
    {
        return array_filter($this->data, function (Row $row) use ($deathCause) {
            return $row->getDeathCause() == $deathCause;
        });
    }

    public function getDeathCauseCount(string $deathCause): int
    {
        return count($this->getByDeathCause($deathCause));
    }

    public function getByNonViolentCause(string $nonViolentCause): array
    {
        return array_filter($this->data, function (Row $row) use ($nonViolentCause) {
            return strpos($row->getNonViolentCause(), $nonViolentCause);
        });
    }

    public function getByViolentCause(string $violentCause): array
    {
        return array_filter($this->data, function (Row $row) use ($violentCause) {
            return strpos($row->getByViolentCause(), $violentCause);
        });
    }
}