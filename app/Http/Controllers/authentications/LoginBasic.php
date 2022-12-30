<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function login()
  {
    $username = filter_input(INPUT_POST, 'email-username', FILTER_SANITIZE_STRING);
    // $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $payload_token = json_encode([
      'user_id' => 1,
      'user_name' => $username,
    ]);

    if ($username == 'admin') {
      $auth_token = base64_encode($payload_token);
      $expire = time() + 3600;
      setcookie('auth_token', $auth_token, $expire, '/');
      header("Location: /index.php");
      exit();
    } else {
      echo 'Password atau username salah';
    }
    // $auth_token = "ajdlakjdlkajdlkajldad";

    // Menetapkan waktu kadaluarsa dari cookie dalam satu jam dari sekarang
    // $expire = time() + 3600;

    // Menetapkan cookie dengan nama 'auth_token', nilai $auth_token, waktu kadaluarsa $expire,
    // dan path '/' sehingga cookie dapat digunakan di seluruh website
    // setcookie('auth_token', $auth_token, $expire, '/');

    // if(isset($_POST['login'])){
    //   echo "masuk";
    //     // $username = filter_input(INPUT_POST, 'email-username', FILTER_SANITIZE_STRING);
    //     // // enkripsi password
    //     // // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //     // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    //     // echo $username;
    //     // echo $email;
    //     $auth_token = "ajdlakjdlkajdlkajldad";

    //     // Menetapkan waktu kadaluarsa dari cookie dalam satu jam dari sekarang
    //     $expire = time() + 3600;

    //     // Menetapkan cookie dengan nama 'auth_token', nilai $auth_token, waktu kadaluarsa $expire,
    //     // dan path '/' sehingga cookie dapat digunakan di seluruh website
    //     setcookie('auth_token', $auth_token, $expire, '/');
    // }
    // // Mendapatkan auth token setelah login berhasil
    // $auth_token = generateAuthToken();

    // // Menetapkan waktu kadaluarsa dari cookie dalam satu jam dari sekarang
    // $expire = time() + 3600;

    // // Menetapkan cookie dengan nama 'auth_token', nilai $auth_token, waktu kadaluarsa $expire,
    // // dan path '/' sehingga cookie dapat digunakan di seluruh website
    // setcookie('auth_token', $auth_token, $expire, '/');

    // // Menampilkan pesan login berhasil
    // echo 'Login berhasil';
    // echo "Masuk sini";
  }
}
