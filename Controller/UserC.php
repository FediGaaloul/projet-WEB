<?php

include_once '../../config.php';
include_once '../../Model/User.php';
class userC
{
    public static function login($email, $password)
    {
        $conn = config::getConnexion();

        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user was found
        if ($user) {
            // Create a new user object and return it
            return new User(
                $user['id'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['password'],
                $user['roles'],
                $user['dateins'],
            );
        }

        // Return null if no user was found
        return null;
    }
    public static function searchUsers($searchTerm)
{
    $conn = config::getConnexion();

    // Prepare and execute the query to search for users
    $stmt = $conn->prepare("SELECT * FROM user WHERE id LIKE ? OR email LIKE ? OR firstname LIKE ? OR lastname LIKE ? OR roles LIKE ? OR dateins LIKE ?");
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->execute([$searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm,$searchTerm]);

    // Fetch all users
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Create an array of User objects
    $userObjects = [];
    foreach ($users as $user) {
        $userObjects[] = new User(
            $user['id'],
            $user['firstname'],
            $user['lastname'],
            $user['email'],
            $user['password'],
            $user['roles'],
            $user['dateins']
        );
    }

    return $userObjects;
}

    public static function getAllUsers()
    {
        $conn = config::getConnexion();

        // Prepare and execute the query to get all users
        $stmt = $conn->prepare("SELECT * FROM user ORDER BY id DESC");
                $stmt->execute();

        // Fetch all users
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Create an array of User objects
        $userObjects = [];
        foreach ($users as $user) {
            $userObjects[] = new User(
                $user['id'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['password'],
                $user['roles'],
                $user['dateins']
            );
        }

        return $userObjects;
    }

    public static function getUserById($id)
    {
        $conn = config::getConnexion();

        // Prepare and execute the query to get a user by ID
        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user was found
        if ($user) {
            // Create a new user object and return it
            return new User(
                $user['id'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['password'],
                $user['roles'],
                $user['dateins']
            );
        }

        // Return null if no user was found
        return null;
    }
    public static function addUser($firstname, $lastname, $email, $password, $roles,$dateins)
{
    $conn = config::getConnexion();

    // Check if the email already exists
    if (self::isEmailExists($email)) {
        return false; // Email already exists, return false
    }

    // Prepare and execute the query to insert a new user
    $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, password, roles, dateins) VALUES (?, ?, ?, ?, ?,?)");
    $stmt->execute([$firstname, $lastname, $email, $password, $roles,$dateins]);

    // Check if the insertion was successful
    return $stmt->rowCount() > 0;
}

// Function to check if the email already exists
public static function isEmailExists($email)
{
    $conn = config::getConnexion();

    // Prepare and execute the query to check if the email exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
    $stmt->execute([$email]);

    // Fetch the result
    $count = $stmt->fetchColumn();

    // If the count is greater than 0, the email exists
    return $count > 0;
}

    public static function getUser($id)
    {
        $conn = config::getConnexion();

        // Prepare and execute the query to get a user by ID
        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user was found
        if ($user) {
            // Create a new user object and return it
            return new User(
                $user['id'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['password'],
                $user['roles'],
                $user['dateins']
            );
        }

        // Return null if no user was found
        return null;
    }

    public static function updateUser($id, $firstname, $lastname, $email, $password, $roles, $dateins)
    {
        $conn = config::getConnexion();

        // Prepare and execute the query to update a user
        $stmt = $conn->prepare("UPDATE user SET firstname = ?, lastname = ?, email = ?, password = ?, roles = ? , dateins = ? WHERE id = ? ");
        $stmt->execute([$firstname, $lastname, $email, $password, $roles, $dateins ,$id]);

        // Check if the update was successful
        return $stmt->rowCount() > 0;
    }

    public static function deleteUser($id)
    {
        $conn = config::getConnexion();

        // Prepare and execute the query to delete a user
        $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
        $stmt->execute([$id]);

        // Check if the deletion was successful
        return $stmt->rowCount() > 0;
    }
    public static function makeAdmin($id)
    {
        $conn = config::getConnexion();
    
        // Prepare and execute the query to update the user's roles to 'admin'
        $stmt = $conn->prepare("UPDATE user SET roles = 'Admin' WHERE id = ?");
        $stmt->execute([$id]);
    
        // Check if the update was successful
        return $stmt->rowCount() > 0;
    }
    

}

?>
