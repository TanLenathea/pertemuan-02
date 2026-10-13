<?php

declare(strict_types=1);

namespace Praktikum;

use InvalidArgumentException;

class Produk
{
    private string $nama;
    private float $harga;
    private int $stok;

    public function __construct(string $nama, float $harga, int $stok)
    {
        if (!is_finite($harga) || $harga < 0 || $stok < 0) {
            throw new InvalidArgumentException(
                'Harga dan stok harus bernilai nol atau lebih.'
            );
        }

        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getHarga(): float
    {
        return $this->harga;
    }

    public function getStok(): int
    {
        return $this->stok;
    }

    public function totalNilai(): float
    {
        return $this->harga * $this->stok;
    }
}
