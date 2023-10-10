<?php
require 'vendor/autoload.php';

use DatabaseConnection;
use Firebase\JWT\JWT;

class GenerateTokenApi
{
    private $koneksi;

    public function __construct(DatabaseConnection $koneksi)
    {
        $this->koneksi = $koneksi->getConnectionToDatabase();
    }

    function generateAccessToken($user)
    {
        $secretKey = "abc"; 

        $payload = [
            "nama_user" => $user["nama_user"],
            "no_telp_user" => $user["no_telp_user"],
            "exp" => time() + 7200
        ];

        $token = JWT::encode($payload, $secretKey, 'HS256');

        // use user phone number
        $userId = $user["no_telp_user"];
        $db = $this->koneksi;
        $query = "UPDATE user SET toket_user = '$token' WHERE no_telp_user = $userId";

        if ($db->query($query) === TRUE) {
            echo json_encode(["access_token" => $token]);
        } else {
            echo "Error updating token: " . $db->error;
        }

        $db->close();
    }

    function verifyAccessToken($token)
    {
        $secretKey = "abc"; // Replace with the same secret key used for token generation

        try {
            $decoded = JWT::decode($token, $secretKey);

            if ($decoded["exp"] < time()) {
                return false; // Token has expired
            }

            // get user token
            $userId = $decoded["no_telp_user"];
            $db = $this->koneksi;
            $query = "SELECT token_user FROM user WHERE token_user = $userId";
            $getUserToken = mysqli_query($db, $query);
            $userTokenRow = mysqli_fetch_assoc($getUserToken);
            $userToken = $userTokenRow['token_user'];

            if ($userToken === $token) {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }

        return false;
    }
}