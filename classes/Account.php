<?php
class Account {
    public int $number;
    public string $type;
    public int $balance;

    public function __construct(int $number, string $type, int $balance)
    {
        $this->number = $number;
        $this->type = $type;
        $this->balance = $balance;
    }

    public function deposit(float $amount) :float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount) :float
    {
        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance() :float
    {
        return $this->balance
    }
}