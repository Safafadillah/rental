<?php

class RentalMotor {
  private $nama;
  private $lama_rental;
  private $jenis_motor;
  private $harga_motor = [
    "Vario Tahun 2009" => 100000,
    "Vario 125 Old" => 120000,
    "Vario 110" => 130000,
    "Vario 125 New" => 140000,
    "Vario 150" => 150000,
    "Vario 160" => 160000,
  ];
  private $pajak = 10000;
  private $members = ["Safa", "safa", "liya"];
  private $total_harga;
  private $is_member = false;

  public function __construct($nama, $lama_rental, $jenis_motor) {
    $this->nama = $nama;
    $this->lama_rental = $lama_rental;
    $this->jenis_motor = $jenis_motor;
  }

  public function calculateTotal() {
    if(array_key_exists($this->jenis_motor, $this->harga_motor)) {
      $this->total_harga = $this->harga_motor[$this->jenis_motor] * $this->lama_rental;
    } else {
      echo "<p>Jenis motor tidak valid.</p>";
      return;
    }

    if(in_array($this->nama, $this->members)) {
      $diskon = $this->total_harga * 0.05;
      $this->total_harga -= $diskon;
      $this->is_member = true;
    }

    $this->total_harga += $this->pajak;
  }

  public function displayReceipt() {
    echo "<h3><span style='color: green';>Bukti Pembayaran</span></h3>";
    echo "<p><span style='color: white';>Nama : " . htmlspecialchars($this->nama) . "</span></p>";
    if ($this->is_member) {
        echo "<p><span style='color: white';>Anda adalah member dan mendapatkan diskon 5%.</span></p>";
    }
    echo "<p><span style='color: white';>Lama Waktu Sewa: " . htmlspecialchars($this->lama_rental) . " hari</span></p>";
    echo "<p><span style='color: white';>Jenis Motor Sewa: " . htmlspecialchars($this->jenis_motor) . "</span></p>";
    echo "<p><span style='color: white';>Total Pajak: Rp. " . number_format($this->pajak, 0, ".", ".") . "</span></p>";
    echo "<p><span style='color: white';>Total Harga Yang Harus di Bayar: Rp. " . number_format($this->total_harga, 2, ",", ".") . "</span></p>";
  }
}
?>
