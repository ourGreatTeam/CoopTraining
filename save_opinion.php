<?php
$conn = new mysqli("localhost", "root", "", "opinions_db");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?: "بدون اسم";
    $email = $_POST["email"];
    $period = $_POST["period"];
    $experience = $_POST["experience"];
    $rating = $_POST["rating"];
    $suggestions = $_POST["suggestions"];

    // صياغة البيانات
    $data = [
        "name" => htmlspecialchars($name),
        "email" => htmlspecialchars($email),
        "period" => htmlspecialchars($period),
        "experience" => htmlspecialchars($experience),
        "rating" => htmlspecialchars($rating),
        "suggestions" => htmlspecialchars($suggestions)
    ];

    // تحويل إلى JSON
    $jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);
    
    // حفظ في ملف
    file_put_contents("opinions.txt", $jsonData . "\n", FILE_APPEND);

    // توجيه لصفحة عرض الآراء
    header("Location: showOpinions.php");
    exit;
}
?>
