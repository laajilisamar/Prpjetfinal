<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .btn {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th class="text-center">Code classe</th>
            <th class="text-center">Classe</th>
            <th class="text-center">Departement</th>
            <th class="text-center">Option</th>
            <th class="text-center">Niveau</th>
            <th class="text-center">Classe Arab</th>
            <th class="text-center">Option Arab</th>
            <th class="text-center">Departement Arab</th>
            <th class="text-center">Niveau Arab</th>
            <th class="text-center">Code Etape</th>
            <th class="text-center">Code Salima</th>
            <th class="text-center">Traitement 1</th>
            <th class="text-center">Traitement 2</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($ligne = $stmt->fetch()) { ?>
            <tr>
                <td><?php echo $ligne['CodClasse'] ?></td>
                <td><?php echo $ligne['IntClasse'] ?></td>
                <td><?php echo $ligne['Departement'] ?></td>
                <td><?php echo $ligne['Optionn'] ?></td>
                <td><?php echo $ligne['Niveau'] ?></td>
                <td><?php echo $ligne['IntCalsseArabB'] ?></td>
                <td><?php echo $ligne['OptionAaraB'] ?></td>
                <td><?php echo $ligne['DepartementAaraB'] ?></td>
                <td><?php echo $ligne['NiveauAaraB'] ?></td>
                <td><?php echo $ligne['CodeEtape'] ?></td>
                <td><?php echo $ligne['CodeSalima'] ?></td>
                <td><a class="btn" href='modifier.php?CodClasse=<?php echo $ligne['CodClasse'] ?>'>Modifier</a></td>
                <td><a class="btn" href='modifier.php?CodClasse=<?php echo $ligne['CodClasse'] ?>'>Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
