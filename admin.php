<?php
// عند الضغط على زر الإرسال
if (isset($_POST['submit'])) {
    $news = json_decode(file_get_contents('news.json'), true);

    $new_item = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'category' => $_POST['category'],
        'image' => $_POST['image']
    ];

    $news[] = $new_item;

    file_put_contents('news.json', json_encode($news, JSON_PRETTY_PRINT));
    echo "تم إضافة الخبر بنجاح!";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - إضافة خبر</title>
</head>
<body>
    <h1>إضافة خبر جديد</h1>
    <form method="post">
        <label>عنوان الخبر:</label><br>
        <input type="text" name="title" required><br><br>

        <label>محتوى الخبر:</label><br>
        <textarea name="content" required></textarea><br><br>

        <label>تصنيف الخبر:</label><br>
        <select name="category" required>
            <option value="الاقتصاد">الاقتصاد</option>
            <option value="السياسة">السياسة</option>
            <option value="الرياضة">الرياضة</option>
            <option value="العالم">العالم</option>
            <option value="السودان الان">السودان الان</option>
            <option value="السودان عاجل">السودان عاجل</option>
        </select><br><br>

        <label>رابط صورة الخبر:</label><br>
        <input type="text" name="image" required><br><br>

        <input type="submit" name="submit" value="حفظ الخبر">
    </form>
</body>
</html>