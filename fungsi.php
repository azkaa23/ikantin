<?php

class Produk
{
    public $mieRebus;
    public $mieRebustelur;
    public $mieGoreng;
    public $mieGorengtelur;
    public $jmlRebus;
    public $jmlRebustelur;
    public $jmlGoreng;
    public $jmlGorengtelur;
    public $hargaRebus;
    public $hargaRebustelur;
    public $hargaGoreng;
    public $hargaGorengtelur;
    public $totalSeluruh;
    public $totalHargaMierebus;
    public $totalHargaMierebustelur;
    public $totalHargaMiegoreng;
    public $totalHargaMiegorengtelur;

    function __construct()
    {
        $this->hargaRebus = 6000;
        $this->hargaRebustelur = 9000;
        $this->hargaGoreng = 7000;
        $this->hargaGorengtelur = 10000;
    }
}

class Jumlah extends Produk
{
    public function getJumlah($jmlRebus, $jmlRebustelur, $jmlGoreng, $jmlGorengtelur)
    {
        $this->jmlRebus = $jmlRebus;
        $this->jmlRebustelur = $jmlRebustelur;
        $this->jmlGoreng = $jmlGoreng;
        $this->jmlGorengtelur = $jmlGorengtelur;
    }

    public function setHarga()
    {
        $this->totalHargaMierebus = $this->hargaRebus * $this->jmlRebus;
        $this->totalHargaMierebustelur = $this->hargaRebustelur * $this->jmlRebustelur;
        $this->totalHargaMiegoreng = $this->hargaGoreng * $this->jmlGoreng;
        $this->totalHargaMiegorengtelur = $this->hargaGorengtelur * $this->jmlGorengtelur;
        $this->totalSeluruh = $this->totalHargaMierebus + $this->totalHargaMierebustelur + $this->totalHargaMiegoreng + $this->totalHargaMiegorengtelur;
    }

    public function cetakStruk()
    {
        echo "<br>";
        echo "<b> iKantin Wikrama </b> ";
        echo "<br>";
        echo "Mie Rebus: $this->jmlRebus x Rp. $this->hargaRebus : <b> $this->totalHargaMierebus</b>";
        echo "<br>";
        echo "Mie Rebus Telur: $this->jmlRebustelur x Rp. $this->hargaRebustelur : <b> $this->totalHargaMierebustelur</b>";
        echo "<br>";
        echo "Mie Goreng: $this->jmlGoreng Rp. $this->hargaGoreng : <b> $this->totalHargaMiegoreng</b>";
        echo "<br>";
        echo "Mie Goreng Telur: $this->jmlGorengtelur x Rp. $this->hargaGorengtelur : <b> $this->totalHargaMiegorengtelur</b>";
        echo "<br><br>";
        echo "Total Bayar : Rp. <b> $this->totalSeluruh</b>";
        echo "<br>";
    }
}
