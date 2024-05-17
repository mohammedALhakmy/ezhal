<?php
// التحقق مما إذا كانت الطريقة المستخدمة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من أن الحقول ليست فارغة
    if (!empty($_POST['deliveryagent_name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['deliveryagent_type'])) {
        // قم بتخزين القيم المرسلة من النموذج في متغيرات
        $deliveryagent_name = $_POST['deliveryagent_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $deliveryagent_type = $_POST['deliveryagent_type'];

        // قم بإجراء أي عمليات إضافية هنا، مثل التحقق من صحة البيانات أو إضافتها إلى قاعدة البيانات

        // عند الانتهاء، يمكنك توجيه المستخدم إلى صفحة أخرى مع رسالة نجاح أو خطأ
        header("Location:  d_regist.php?success=تم تسجيل المندوب بنجاح");
        exit();
    } else {
        // إذا كان أحد الحقول فارغًا، قم بتوجيه المستخدم مرة أخرى إلى صفحة التسجيل مع رسالة خطأ
        header("Location:  d_regist.php?error=الرجاء ملء جميع الحقول");
        exit();
    }
} else {
    // إذا كانت الطريقة المستخدمة غير POST، قم بتوجيه المستخدم إلى صفحة التسجيل مع رسالة خطأ
    header("Location: d_regist.php?error=طريقة غير صالحة للوصول");
    exit();
}
?>