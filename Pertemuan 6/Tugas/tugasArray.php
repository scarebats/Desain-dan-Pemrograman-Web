<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <script src="./jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function () {
            $("#flip").click(function () {
                $("#dataSiswaTable").slideToggle("slow");
            });
        });
    </script>
    <style>
        body {
            text-align: center; 
        }
        
        #dataSiswaTable {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #FF6464; 
            background-color: #FF6464; 
            border-radius: 12px;
        }

        th, td {
            border: 0.4px solid black;
            padding: 12px;
            text-align: left;
            border-radius: 12px;
        }
        
        th {
            background-color: #FF0000; 
        }

        td {
            background-color: #FF6464; 
        }

        #flip {
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 12px;
            text-align: center;
            background-color: #FF0000; 
            cursor: pointer;
            color: black;
        }

        #rataSiswa {
            text-align: center;
            margin-top: 6px;
            margin-bottom: 18px;
            color: black;
        }
    </style>
</head>
<body>
    <h1>DATA SISWA</h1>
    <div id="flip">Klik untuk melihat database</div>
    <div id="dataSiswaTable">
        <table>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Kelas</th>
                <th>Alamat</th>
            </tr>
            <?php
            $siswa = [
                ["Ryuen", 19, "2B", "Shibuya"],
                ["Arisu", 18, "2A", "Tokyo"],
                ["Kiyotaka", 19, "2D", "Tokyo"],
                ["Kei", 18, "2D", "Shinjuku"]
            ];

            for ($i = 0; $i < count($siswa); $i++) {
                echo "<tr>";
                for ($j = 0; $j < count($siswa[$i]); $j++) {
                    echo "<td>" . $siswa[$i][$j] . "</td>";
                }
                echo "</tr>";
            }

            $jumlah = 0;
            foreach ($siswa as $data) {
                $jumlah += $data[1]; 
            }

            $rataRata = $jumlah / count($siswa);
            echo "<tr><td colspan='4'><div id='rataSiswa'>Rata-rata umur siswa : $rataRata tahun</div></td></tr>";
            ?>
        </table>
    </div>
</body>
</html>