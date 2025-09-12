<?php
include 'config.php';

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

echo "<h1 style='text-align:center'>سجلات المرضى</h1>";

echo "<table>
      <thead>
        <tr>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
            <th>الهاتف</th>
            <th>تاريخ الزيارة</th>
            <th>تعديل</th>
            <th>حذف</th>
        </tr>
      </thead>
      <tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["phone"]) . "</td>
                <td>" . htmlspecialchars($row["date"]) . "</td>
                <td><a href='edit_patient.php?id=" . $row["id"] . "'>تعديل</a></td>
                <td><a href='delete_patient.php?id=" . $row["id"] . "' onclick=\"return confirm('هل أنت متأكد من الحذف؟')\">حذف</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p style='text-align:center'>لا توجد سجلات لعرضها</p>";
}

$conn->close();
