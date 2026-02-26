<?php
// Cho phép các yêu cầu từ web (CORS) - Quan trọng nếu bạn chạy trên hosting
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Mật khẩu thực sự được giấu ở đây (Server-side)
$REAL_PASSWORD = "1111"; 

// Lấy dữ liệu từ yêu cầu gửi đến
$data = json_decode(file_get_contents("php://input"), true);
$user_password = $data['password'] ?? '';

if ($user_password === $REAL_PASSWORD) {
    // Trả về thành công
    echo json_encode(["success" => true]);
} else {
    // Trả về thất bại
    http_response_code(401);
    echo json_encode(["success" => false, "message" => "Mật khẩu không chính xác!"]);
}
?>
