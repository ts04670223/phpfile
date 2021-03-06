<?php
/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */

include_once "base.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            margin: auto;
            border:3px solid black;
            border-collapse: collapse;
        }
        td{
            border:1px solid #555;
            padding: 5px;
        }
        a.primary,a.danger{
            border-radius: 15%;
            padding: 3px 8px;
            box-shadow: 1px 1px 4px grey;
        }
        a.primary{
            border-radius: 15%;
            background: #297de6;
            padding: 3px 8px;
            color:#fff1f3;
            box-shadow: 1px 1px 4px grey;
        }
        a.danger{
            border-radius: 15%;
            background: #e82828;
            padding: 3px 8px;
            color:#fff1f3;
            box-shadow: 1px 1px 4px grey;
        }
        .top{
        width: 100px;
        margin: auto;
        }
    </style>
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
<a class="top danger" href="upload.php">檔案上傳</a>
<?php
$rows=all('upload');
echo "<table>";
echo "<td>縮圖</td>";
echo "<td>檔案名稱</td>";
echo "<td>檔案類型</td>";
echo "<td>檔案說明</td>";
echo "<td>下載</td>";
echo "<td>操作</td>";
foreach($rows as $row){
    echo "<tr>";
    if($row['type']=='圖檔'){
        echo "<td><img src='{$row['path']}' style='width:100px'></td>";
        
    }else{
        echo "<td><img src='./img/20201126015004.jpg' style='width:100px'></td>";
    }
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['type']}</td>";
    echo "<td>{$row['note']}</td>";
    echo "<td><a href='{$row['path']}' download>下載</a></td>";
    echo "<td>";
    echo "<a class='primary' href='edit.php?id={$row['id']}' >編輯</a>";
    echo "<a class='danger' href='del.php?id={$row['id']}'>刪除</a>";
    echo "</td>";
    
    echo"</tr>";
}
echo"</table>";


?>




<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->




</body>
</html>