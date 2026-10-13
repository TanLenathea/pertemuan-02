<?php

declare(strict_types=1);

namespace Praktikum;

use InvalidArgumentException;

class Mahasiswa
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        float $ipk
    ) {
        if (!is_finite($ipk) || $ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus berada pada rentang 0 sampai 4.'
            );
        }

        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->ipk = $ipk;
    }

    public function info(): string
    {
        return sprintf(
            'NIM: %s | Nama: %s | Prodi: %s | IPK: %s',
            $this->nim,
            $this->nama,
            $this->prodi,
            number_format($this->ipk, 2, ',', '.')
        );
    }

    public function predikat(): string
    {
        // Batas IPK merupakan asumsi latihan; sesuaikan dengan ketentuan dosen.
        if ($this->ipk >= 3.51) {
            return 'Cumlaude';
        }

        if ($this->ipk >= 3.01) {
            return 'Sangat Memuaskan';
        }

        if ($this->ipk >= 2.76) {
            return 'Memuaskan';
        }

        return 'Belum memenuhi batas predikat';
    }
}
