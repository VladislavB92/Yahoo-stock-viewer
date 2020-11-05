<?php

declare(strict_types=1);

namespace App\Models;

class Stock
{
    private int $id;
    private string $symbol;
    private string $open;
    private string $high;
    private string $low;
    private string $close;
    private string $adjClose;
    private string $volume;
    private string $date;

    public function __construct(
        int $id,
        string $symbol,
        string $open,
        string $high,
        string $low,
        string $close,
        string $adjClose,
        string $volume,
        string $date
    ) {
        $this->id = $id;
        $this->symbol = $symbol;
        $this->open = $open;
        $this->high = $high;
        $this->low = $low;
        $this->close = $close;
        $this->adjClose = $adjClose;
        $this->volume = $volume;
        $this->date = $date;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getOpen(): string
    {
        return $this->open;
    }

    public function getHigh(): string
    {
        return $this->high;
    }

    public function getLow(): string
    {
        return $this->low;
    }

    public function getClose(): string
    {
        return $this->close;
    }

    public function getAdjClose(): string
    {
        return $this->adjClose;
    }

    public function getVolume(): string
    {
        return $this->volume;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
