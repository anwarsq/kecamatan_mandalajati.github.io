<style>
  /* Style inputs, select elements and textareas */
  input[type=text], select, textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
  }

  /* Style the label to display next to the inputs */
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }

  /* Style the submit button */
  .submit {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }

  /* Style the container */
  .container {
    border-radius: 5px;
    background-color: #ffff;
    padding: 20px;
  }

  /* Floating column for labels: 25% width */
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }

  /* Floating column for inputs: 75% width */
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
</style>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "locadata";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $nokk=$_SESSION['akun_nokk'];
  $sql= "SELECT nik, nama FROM data_penduduk WHERE no_kk='$nokk'";
  $result = $conn->query($sql);
  $result;
?>

<div class="container" style="margin-bottom:30px;">
<!-- <php echo "no kk:".$_SESSION['akun_nokk'];?> -->
  <form id="form-lapor" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="namat">Nama</label>
      </div>
      <div class="col-75">
        <!-- <input type="text" id="namat" name="namat" placeholder="Nama terlapor.."> -->
        <select name="namat" id="namat">
          <?php foreach($result as $row=>$value){
                  echo "<option value='".$value['nama']."'".">".$value['nama']."</option>";
              }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="nikt">NIK</label>
      </div>
      <div class="col-75">
        <select name="nikt" id="nikt">
          <?php foreach($result as $row=>$value){
                  echo "<option value='".$value['nik']."'".">".$value['nik']."</option>";
              }
          ?>
        </select>
        <!-- <input type="text" id="nikt" name="nikt" placeholder="NIK Terlapor.."> -->
        <input type="hidden" id="nikp" name="nikp" value="<?php echo $_SESSION['akun_nik'];?>">
        <input type="hidden" id="nokk" name="nokk" value="<?php echo $_SESSION['akun_nokk'];?>">
        <input type="hidden" id="namap" name="namap" value="<?php echo $_SESSION['akun_nama'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="sakit">Sakit</option>
          <option value="sehat">Sehat</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="keterangan">Keterangan</label>
      </div>
      <div class="col-75">
        <textarea id="keterangan" name="keterangan" placeholder="Jelaskan kondisi kesehatan saat ini.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row" style="content:align-center;">
    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    <!-- <input type="submit" class="btn btn-primary" name="submit" value="Simpan"> -->
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(e) {
    $("#form-lapor").on("submit", (function(e) {
    e.preventDefault();
    $.ajax({
        url:'update_kondisi.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: alert("Data sukses dimasukan")
    });
    window.location="?page=laporKondisi";
    }));
    
});
</script>