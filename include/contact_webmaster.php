

        <?php
        include("config.php");
        $result = mysqli_query($conn, "SELECT * FROM message");
        ?>

        <div style="direction:rtl;">

          <?php
          echo "<table id=customers>";
          echo "<th> Id </th>"; /* تغيير <td> إلى <th> هنا */
          echo "<th>الإسم</th>"; /* تغيير <td> إلى <th> هنا */
          echo "<th>البريد الإلكتروني</th>"; /* تغيير <td> إلى <th> هنا */
          echo "<th>الموضوع</th>"; /* تغيير <td> إلى <th> هنا */
          echo "<th>الرسالة</th>"; /* تغيير <td> إلى <th> هنا */
          echo "<th>نوع المستخدم</th>"; /* تغيير <td> إلى <th> هنا */
          echo "<th>الرد</th>"; /* تغيير <td> إلى <th> هنا */

          while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $res['id'] . "</td>";
            echo "<td>" . $res['name'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td>" . $res['subject'] . "</td>";
            echo "<td>" . $res['comment'] . "</td>";
            echo "<td>" . $res['user_type'] . "</td>";
            echo "<td><a href='mailto:" . $res['email'] . "'><i class='fa-solid fa-reply-all fa-xl'></i> <i class='fa-solid fa-envelope-open-text fa-xl'></i></a></td>";

            echo "</tr>";
          }
          echo "</table>";
          ?>
        </div>