<?php

class Row
{
    private string $id;
    private string $date;
    private string $deathCause;
    private string $nonViolentCause;
    private string $violentCircumstances;
    private string $violentCause;

    public function __construct(string $id, string $date, string $deathCause, string $nonViolentCause, string $violentCircumstances, string $violentCause)
    {
        $this->id = $id;
        $this->date = $date;
        $this->deathCause = $deathCause;
        $this->nonViolentCause = $nonViolentCause;
        $this->violentCircumstances = $violentCircumstances;
        $this->violentCause = $violentCause;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getDeathCause(): string
    {
        return $this->deathCause;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNonViolentCause(): string
    {
        return $this->nonViolentCause;
    }

    public function getViolentCause(): string
    {
        return $this->violentCause;
    }

    public function getViolentCircumstances(): string
    {
        return $this->violentCircumstances;
    }
}