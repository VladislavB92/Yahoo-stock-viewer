<?php

declare(strict_types=1);

namespace App\Models;

class StockAsset
{
    private int $id;
    private string $symbol;
    private float $open;
    private float $high;
    private float $low;
    private float $close;
    private float $adjClose;
    private float $volume;
    private string $date;

    public function __construct(
        string $symbol,
        float $open,
        float $high,
        float $low,
        float $close,
        float $adjClose,
        float $volume,
        string $date
    ) {
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

    public function getOpen(): float
    {
        return $this->open;
    }

    public function getHigh(): float
    {
        return $this->high;
    }

    public function getLow(): float
    {
        return $this->low;
    }

    public function getClose(): float
    {
        return $this->close;
    }

    public function getAdjClose(): float
    {
        return $this->adjClose;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}