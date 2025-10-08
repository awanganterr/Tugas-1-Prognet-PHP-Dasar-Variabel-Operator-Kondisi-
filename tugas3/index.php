<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Mahasiswa</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #f6f8fa;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #2c3e50;
    }

    .container {
      width: 80%;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    a.button {
      display: inline-block;
      background-color: #3498db;
      color: white;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 5px;
      transition: 0.2s;
    }

    a.button:hover {
      background-color: #2980b9;
    }

    input[type="text"] {
      width: 30%;
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th {
      background-color: #3498db;
      color: white;
      padding: 10px;
      text-align: center;
    }

    td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #dff9fb;
    }

    .aksi a {
      color: #e74c3c;
      text-decoration: none;
      font-weight: bold;
    }

    .aksi a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Daftar Mahasiswa</h2>
    <a href="tambah.php" class="button">+ Tambah Mahasiswa</a>
    <br><br>

    <input type="text" id="keyword" placeholder="🔍 Cari mahasiswa..." />
    <table>
      <thead>
        <tr>
          <th>NO</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Prodi</th>
          <th>Aksi</th>
          <th>Aksi Nilai</th>
        </tr>
      </thead>
      <tbody id="hasil">
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa");
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$i}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['prodi']}</td>
                    <td class='aksi'>
                      <a href='edit.php?id={$row['id']}'>Edit</a> | 
                      <a href='hapus.php?id={$row['id']}'
                         onclick=\"return confirm('Yakin hapus data ini?')\">Hapus</a>
                    </td>
                    <td>
                      <a href='tambah_nilai.php?mahasiswa_id={$row['id']}'>Tambah Nilai</a> |
                      <a href='nilai.php?mahasiswa_id={$row['id']}'>Lihat/Edit Nilai</a>
                    </td>
                  </tr>";
                  $i++;
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
    document.querySelector("#keyword").oninput = function() {
      let key = this.value;
      fetch("cari.php?keyword=" + key)
        .then(res => res.json())
        .then(data => {
          let isi = "";
          let i = 0;
          data.forEach(m => {
            i++;
            isi += `<tr>
                      <td>${i}</td>
                      <td>${m.nim}</td>
                      <td>${m.nama}</td>
                      <td>${m.prodi}</td>
                      <td class='aksi'>
                        <a href='edit.php?id=${m.id}'>Edit</a> |
                        <a href='hapus.php?id=${m.id}'
                           onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                      </td>
                      <td>
                        <a href='tambah_nilai.php?mahasiswa_id=${m.id}'>Tambah Nilai</a> |
                        <a href='nilai.php?mahasiswa_id=${m.id}'>Lihat/Edit Nilai</a>
                      </td>
                    </tr>`;
          });
          document.querySelector("#hasil").innerHTML = isi;
        });
    };
  </script>
</body>
</html>
