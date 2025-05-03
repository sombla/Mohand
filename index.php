<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>لوحة تحكم - إضافة خبر</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background: #f2f2f2;
      padding: 30px;
    }
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    input, select, textarea {
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

  <h2>إضافة خبر جديد</h2>
  <form action="save-news.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="عنوان الخبر" required>
    
    <select name="category" required>
      <option value="">اختر القسم</option>
      <option value="الاقتصاد">الاقتصاد</option>
      <option value="السياسة">السياسة</option>
      <option value="الرياضة">الرياضة</option>
      <option value="العالم">العالم</option>
      <option value="السودان الآن">السودان الآن</option>
      <option value="السودان عاجل">السودان عاجل</option>
    </select>
    
    <textarea name="content" rows="5" placeholder="نص الخبر" required></textarea>
    
    <input type="file" name="image" accept="image/*" required>

    <button type="submit">نشر الخبر</button>
  </form>

</body>
</html>