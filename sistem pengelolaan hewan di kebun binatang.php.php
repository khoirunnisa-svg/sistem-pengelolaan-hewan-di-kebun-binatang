<?php
// ==========================================
// 1. CLASS INDUK (ENTITY) & 3. ENCAPSULATION
// ==========================================
class Hewan {
    // Encapsulation: Menggunakan access modifier protected agar bisa diakses class turunan
    protected $id;
    protected $nama;

    // 3. CONSTRUCTOR: Menginisialisasi objek saat pertama kali dibuat
    public function __construct($id, $nama) {
        $this->id = $id;
        $this->nama = $nama;
    }

    // Getter dan Setter (Encapsulation untuk mengambil & mengubah nilai properti)
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    // Method umum
    public function displayInfo() {
        return "ID: {$this->id} | Nama Hewan: {$this->nama}";
    }

    public function suara() {
        return "Hewan ini mengeluarkan suara.";
    }
}

// ==========================================
// 2. CLASS TURUNAN & INHERITANCE
// ==========================================
class Mamalia extends Hewan {
    protected $jumlahKaki;

    public function __construct($id, $nama, $jumlahKaki) {
        // Memanggil constructor dari class induk
        parent::__construct($id, $nama);
        $this->jumlahKaki = $jumlahKaki;
    }

    public function getJumlahKaki() {
        return $this->jumlahKaki;
    }

    // 3. POLYMORPHISM: Melakukan Override method displayInfo dari class induk
    public function displayInfo() {
        return "<b>[Kategori: Mamalia]</b><br>ID: {$this->id} <br>Nama: {$this->nama} <br>Jumlah Kaki: {$this->jumlahKaki}";
    }

    // Override method suara
    public function suara() {
        return "Suara: Aummm / Mengaum keras!";
    }
}

class Burung extends Hewan {
    protected $warnaBulu;

    public function __construct($id, $nama, $warnaBulu) {
        parent::__construct($id, $nama);
        $this->warnaBulu = $warnaBulu;
    }

    public function getWarnaBulu() {
        return $this->warnaBulu;
    }

    // 3. POLYMORPHISM: Melakukan Override method displayInfo dari class induk
    public function displayInfo() {
        return "<b>[Kategori: Burung]</b><br>ID: {$this->id} <br>Nama: {$this->nama} <br>Warna Bulu: {$this->warnaBulu}";
    }

    // Override method suara
    public function suara() {
        return "Suara: Cicit cuit berkicau!";
    }
}

// ==========================================
// 4. IMPLEMENTASI DI INDEX.PHP & OUTPUT
// ==========================================
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Kebun Binatang - OOP PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        .card { background: #fff; padding: 15px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { color: #333; }
    </style>
</head>
<body>

    <h2>Sistem Pengelolaan Hewan di Kebun Binatang</h2>
    <hr>

    <?php
    // Membuat objek pertama dari class turunan Mamalia
    $hewan1 = new Mamalia("M-001", "Singa Afrika", 4);
    echo "<div class='card'>";
    echo $hewan1->displayInfo() . "<br>";
    echo $hewan1->suara();
    echo "</div>";

    // Membuat objek kedua dari class turunan Burung
    $hewan2 = new Burung("B-001", "Burung Cendrawasih", "Kuning Emas");
    echo "<div class='card'>";
    echo $hewan2->displayInfo() . "<br>";
    echo $hewan2->suara();
    echo "</div>";

    // Demonstrasi penggunaan Setter (Encapsulation) untuk mengubah data
    $hewan1->setNama("Singa Jantan Senior");
    echo "<div class='card'>";
    echo "<b>Setelah Menggunakan Setter (Ubah Nama):</b><br>";
    echo "Nama Baru: " . $hewan1->getNama() . " (ID: " . $hewan1->getId() . ")";
    echo "</div>";
    ?>

</body>
</html>