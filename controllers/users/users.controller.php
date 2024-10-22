<?php
include("./../../models/users/users.model.php");


session_start();
if (isset($_POST['RegisterUser'])) {
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $cellphone = $_POST['cellphone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $result = createUser($name, $lastName, $cellphone, $email, $password, $role);
    if ($result === true) {
        $_SESSION['result'] = getAllUsers();
        header("location: ./../../views/users/showAllUsers.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST['deleteUser'])) {
    $idUser = $_POST['id'];

    if ($_SESSION['id'] === $idUser) {
        session_destroy();
        echo "<script>
        alert('We cannot delete this user, because the user is linked to the sales table or is the currently logged-in user.');
        window.location.href = './../../views/users/showAllUsers.view.php';
        </script>";
        closeConnection();
        return false;
    } else {

        $result = deleteUser($idUser);

        if ($result === true) {
            $_SESSION['result'] = getAllUsers();
            header("location: ./../../views/users/showAllUsers.view.php");
        } else {
            echo $result;
        }
    }
}

if (isset($_POST['updateUser'])) {
    $idUser = $_POST['id'];
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $cellphone = $_POST['cellphone'];
    $email = $_POST['email'];
    $idRole = $_POST['role'];

    $result = updateUser($idUser, $name, $lastName, $cellphone, $email, $idRole);

    if ($result === true) {
        //update the session variable of role 
        openConnection();
        global $connection;
        $query = "SELECT * FROM usuarios INNER JOIN roles ON usuarios.idroles = roles.idroles WHERE idusuarios = $idUser";
        $resultSession = $connection->query($query);

        if ($resultSession->num_rows > 0) {
            $row = $resultSession->fetch_assoc();
            if ($_SESSION['id'] === $idUser) {
                $_SESSION['role'] = $row['descripcion'];
            }
        }
        $_SESSION['result'] = getAllUsers();
        header("location: ./../../views/users/showAllUsers.view.php");
    } else {
        echo $result;
    }
}

if (isset($_POST["filterUser"])) {
    $idFiltrado = $_POST["id"];
    $result = getOneUser($idFiltrado);

    if (!empty($result)) {
        $_SESSION['result'] = $result;
        header("location: ./../../views/users/showAllUsers.view.php");
    } else {
        header("location: ./../../views/users/showAllUsers.view.php");
        $_SESSION['result'] = getAllUsers();
    }
}

if (isset($_POST['showAllUsers'])) {
    $_SESSION['result'] = getAllUsers();
    header("location: ./../../views/users/showAllUsers.view.php");
}