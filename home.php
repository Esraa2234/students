<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>جدول طلاب مدرسيه</title>
</head>
<body dir='rtl'>
    <?php 
    // الاتصال مع قاعدةالبيانات
    $host='localhost';
    $user='root';
    $pass='';
    $db='student';
    $con=mysqli_connect($host,$user,$pass,$db);
    $res=mysqli_query($con,"select * from studennt");
    #button variable  
    $id='';
    $name='';
    $address='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST["address"];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls= "insert into studennt values($id,'$name','$address')";
        mysqli_query( $con , $sqls);
        header( 'Location: home.php' ) ;
    }
    if (isset($_POST['del'])){
        $sqls="delete  from studennt where name='$name'";
        mysqli_query( $con , $sqls);
        header('Location:home.php');
    }
    ?>
    <div id='mother'>
    <form method='POST' action="">
    <!-- لوحة التحكم -->
    <aside>
            <div id='div'>
                <img src="https://i.pinimg.com/originals/ea/0c/65/ea0c65df3d03e9121144b03d086af3b4.png" alt='لوجو الموقع' width='200'>
                <h3>لوحة المدير</h3>
                <label>
                    رقم الطالب:
                </label> <br>
                <input type="text" name='id'> <br>
                <label>
                    اسم الطالب:
                </label> <br>
                <input type="text" name='name' id='name'> <br>
                <label>
                    عنوان الطالب:
                </label> <br>
                <input type="text" name='address' id='address'><br><br>
                <button name='add'> اضافة طالب </button>
                <button name='del'> حذف الطالب </button>
    </div>
        </aside>
        <!-- عرض بيانات الطلاب -->
    <main>
        <table id='tbl'>
        <tr>
            <th>الرقم التسلسلي</th>
            <th>اسم الطالب</th>
            <th>عنوان الطالب</th>
        </tr>
        <?php  
        while ( $row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </main>
        </form>
    </div>
</body>
</html>