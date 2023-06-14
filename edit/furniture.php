<?php
    require "../require/register_menu.php";

    $id = $_GET['id'];

    $query = $conn->query("SELECT * FROM furniture LEFT JOIN company ON furniture.company_id = company.company_id WHERE id = $id");
    $row = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../register.css">
    <title>Kemas Kini Profil</title>
</head>
<body>
    <div class="main">
        <form class="background" action="./f_update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            <div class="equal">
                <div class="info">
                    <div class="vertical space-around">
                        <div>Nama:  </div>
                        <div>Warna:  </div>
                        <div>Syarikat:  </div>
                        <div>Harga: </div>
                    </div>
                    <div class="vertical space-around grow">
                        <input class="custom input" name="name" value="<?php echo $row['name'] ?>" required>
                        <select class="custom" name="color" id="color">
                            <?php
                                displayOptions("SELECT * FROM color", "document.getElementById('color')", $row['color'])    
                            ?>
                        </select>
                        <select class="custom" name="company" id="company">
                            <?php
                                $query = $conn->query("SELECT * FROM company");

                                if ($query->num_rows > 0) {
                                    while ($row2 = $query->fetch_assoc()) {
                                        $name = $row2['company'];
                                        $value = $row2['id'];
                                        echo "<script>
                                                    displayOptions('$name', document.getElementById('company'), '$value');
                                                </script>";
                                    }
                                }                            
                            ?>
                        </select>
                        <input class="custom input" name="price" value="<?php echo $row['price'] ?>"required>
                    </div>
                </div>
                <input type="file" id="image" name="image" accept="image/*">
                <div class="pfp">
                    <label for="image" class="camera">
                        <img src="../images/camera.png" alt="">
                    </label>
                    <img data-pfp src="../images/<?php echo $row['image']; ?>" alt="gambar profil">
                </div>
            </div>
            <div class="options grow">
                <button class="custom button" data-profile2 type="button">Batalkan</button>
                <button class="custom button yes" type="submit">Kemas kini</button>
            </div>
            <div class="delete">
                <img src="../images/delete.png" alt="">
            </div>
        </form>
        <dialog class="confirm">
            <div class="vertical">
                <div class="grow center">Memadamkan akaun?</div>
                <div class="options">
                    <button class="dialog-button" id="no">tidak</button>
                    <button class="dialog-button yes" id="yes">ya</button>
                </div>
            </div>
        </dialog>
    </div>
    <script>
        let edit = document.querySelector("#image")
        let img = document.querySelector('[data-pfp]')
        let del = document.querySelector('.delete')
        let confirm = document.querySelector('.confirm')
        let yes = document.querySelector('#yes')
        let no = document.querySelector('#no')
        let p = document.querySelector('[data-profile2]')
        
        edit.onchange = () => {
            img.src = URL.createObjectURL(edit.files[0]); 
        }

        del.addEventListener('click', () => {
            confirm.open = true
        })

        no.addEventListener('click', () => {
            confirm.open = false
        })

        yes.addEventListener('click', () => {
            window.location = './p_delete.php?id=' + <?php echo $row['id']; ?>
        })

        p.addEventListener('click', () => {
            redirect.profile(<?php echo $row['id']; ?>)
        })
    </script>
</body>
</html>