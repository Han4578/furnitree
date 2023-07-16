<?php
    #Fail ini adalah wajib
    require "../require/connect.php";
    session_start();
    
    #Terima Fail POST
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $conn->real_escape_string($email);
    $pass = $conn->real_escape_string($password);
    
    #Cari pengguna dengan nama dan kata laluan yang sama
    $query = $conn->query("SELECT pengguna.name AS name, aras, pengguna.id AS id, picture, brand.id AS brand FROM pengguna LEFT JOIN brand ON brand.account = pengguna.id WHERE (email = '$user' OR pengguna.name = '$user') AND password = '$password';");
    
    if ($query->num_rows == 0) alertError('Nama atau kata laluan salah'); #Papar mesej jika gagal ditemui
    else {
        $row = $query->fetch_assoc();
        $name = $row['name'];
        
        #Mengubah data session
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $name;
        $_SESSION['level'] = $row['aras'];
        $_SESSION['pfp'] = $row['picture'];
        $_SESSION['brandID'] = $row['brand'] ?? '';
        $_SESSION['isLoggedIn'] = true;
        
        echo    "<script>
                    alert('Log masuk berjaya \\n Selamat datang, $name')
                    window.location = '../main_pages/main_page.php';
                </script>"; #Papar mesej jika barjaya ditemui
    }
?>