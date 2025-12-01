<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Daftar Mahasiswa - PDF</title>

    <style>
        :root{
            --primary: #007bff;
            --muted: #f4f6f9;
            --card-bg: #fff;
            --border: #d6dce6;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--muted);
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 16px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 18px auto;
            background: var(--card-bg);
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            background: var(--primary);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            transition: background .18s ease;
        }

        .btn:hover { background: #0056c7; }

        .table-wrapper {
            max-height: 220px; /* height for ~5 rows */
            overflow-y: auto;
            overflow-x: auto;
            margin-top: 18px;
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        thead th {
            position: sticky;
            top: 0;
            background: var(--primary);
            color: #fff;
            z-index: 3;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid rgba(0,0,0,0.08);
        }

        tbody td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        tbody tr:nth-child(even) {
            background: #fbfdff;
        }

        tbody tr:hover {
            background: #eef6ff;
        }

        th, td { white-space: nowrap; }
        th:first-child, td:first-child { width: 60px; } /* set reasonable column widths */
        th:nth-child(2), td:nth-child(2) { width: auto; } /* flexible name column */
        th:nth-child(3), td:nth-child(3) { width: 100px; }
        th:nth-child(4), td:nth-child(4) { width: 110px; }

        .footer {
            text-align: center;
            margin-top: 18px;
            color: #666;
            font-size: 13px;
        }

        @media (max-width:600px) {
            .container { padding: 14px; }
            th, td { padding: 8px; font-size: 14px; }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Daftar Mahasiswa - Jurusan S1 RPL</h2>

    <p style="text-align:center; margin: 8px 0 0;">
        <a class="btn" href="report.php" target="_blank">📄 Unduh PDF</a>
    </p>

    <hr style="margin-top:14px;">

    <h3 style="margin-bottom:6px;">Data Mahasiswa</h3>

    <!-- TABLE WRAPPER: tempat di mana scroll & sticky header bekerja -->
    <div class="table-wrapper">
        <?php
            include 'connection.php';
            $res = mysqli_query($connect, "SELECT * FROM mahasiswa ORDER BY nama_lengkap ASC");

            echo "<table>";
            echo "<thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Tanggal Lahir</th>
                      <th>Nomor HP</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            while ($r = mysqli_fetch_assoc($res)) {
                // safe output - minimal escaping
                $nim = htmlspecialchars($r['nim']);
                $name = htmlspecialchars($r['nama_lengkap']);
                $tgl  = htmlspecialchars(date('d-m-Y', strtotime($r['tanggal_lahir'])));
                $hp   = htmlspecialchars($r['no_hp']);

                echo "<tr>
                        <td>{$nim}</td>
                        <td>{$name}</td>
                        <td>{$tgl}</td>
                        <td>{$hp}</td>
                      </tr>";
            }

            echo "</tbody></table>";
        ?>
    </div> <!-- /.table-wrapper -->

    <!-- end container content -->
</div>

<div class="footer">
    © <?= date("Y") ?> Sistem Informasi Akademik | Institut Teknologi Konoha
</div>

</body>
</html>