<?php
$opinions = file("opinions.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>آراء المتدربات | معهد الخوارزمي</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    main {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 16px;
    }
    h2 {
      font-size: 22px;
      font-weight: bold;
      color: #1D3557;
      margin-bottom: 24px;
      text-align: center;
    }
    .reviews-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
    }
    .review-card {
      background-color: white;
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    .review-card h3 {
      margin: 0 0 8px;
      font-size: 18px;
      color: #1D3557;
    }
    .stars {
      color: #f1c40f;
      margin-bottom: 12px;
    }
    .review-card p {
      font-size: 14px;
      color: #457b9d;
      line-height: 1.6;
    }
  </style>
</head>
<body>
  <header class="animate-fadeUp">
    <img class="logo-right" src="https://i.ibb.co/fYHKG1tG/image.jpg" alt="شعار المعهد" />
    <img class="logo-left" src="https://i.ibb.co/7NNGzg4p/image.jpg" alt="شعار الموقع" />
    <h1>دليل متدربات معهد الخوارزمي</h1>
    <nav>
      <div class="nav-right">
        <a href="index.html">الرئيسية</a>
        <a href="opinions.php">إضافة رأي</a>
        <a href="showOpinions.php">تصفح الآراء</a>
        <a href="templets.html">تصفح القوالب</a>
      </div>
      <div class="nav-left">
        <a href="contact.html">📞 تواصل معنا</a>
        <a href="#">🤖 اسألني</a>
      </div>
    </nav>
  </header>

  <main>
    <h2>آراء المتدربات السابقات</h2>
    <div class="reviews-grid">
      <?php foreach ($opinions as $line):
        $opinion = json_decode($line, true);
        if (!$opinion) continue;
      ?>
        <div class="review-card">
          <h3><?= htmlspecialchars($opinion["name"]) ?></h3>
          <div class="stars"><?= str_repeat("⭐", intval($opinion["rating"])) ?></div>
          <p><?= nl2br(htmlspecialchars($opinion["experience"])) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <footer>
    <p>© 2025 دليل متدربات معهد الخوارزمي. جميع الحقوق محفوظة.</p>
    <p>للتواصل: <a href="mailto:info@alkhwarizmi.edu.sa">info@alkhwarizmi.edu.sa</a></p>
  </footer>
</body>
</html>
