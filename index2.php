<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Motor</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <div class="container">
    <h2>Rental Motor</h2>
    <form action="" method="post">
      <label for="nama">Nama:</label>
      <input type="text" id="nama" name="nama" required>
      
      <label for="lama_rental">Lama Waktu Rental (per hari):</label>
      <input type="number" id="lama_rental" name="lama_rental" min="1" required>

      <label for="jenis_motor">Jenis Motor:</label>
      <select name="jenis_motor" id="jenis_motor" required>
        <option hidden>Pilih Motor</option>
        <option value="Vario Tahun 2009">Vario th2009</option>
        <option value="Vario 125 Old">Vario 125 old</option>
        <option value="Vario 110">Vario 110</option>
        <option value="Vario 125 New">Vario 125new</option>
        <option value="Vario 150">Vario 150</option>
        <option value="Vario 160">Vario 160</option>
      </select>
      
      <button type="submit" name="submit">Submit</button>
      <div class="Back">
        <button><a href="index1.php" class="btn btn-primary btn-xl text-uppercase">
          <i class="fas fa-check me-1"></i>Back</a></button>
      </div>
    </form>
    
    <?php
      if(isset($_POST['submit'])) {
        require_once 'RentalMotor.php';
        $rental = new RentalMotor($_POST['nama'], $_POST['lama_rental'], $_POST['jenis_motor']);
        $rental->calculateTotal();
        $rental->displayReceipt();
      }
    ?>
  </div>
</body>
</html>
