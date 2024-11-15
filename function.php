<style>
    *{
        font-family:'courier new';
    }
</style>




    <!-- 1.正三角形的星星作法 -->

    <!-- // for($i=0;$i<5;$i++){
    
    //     for($k=0;$k<4-$i;$k++){
    //         echo "&nbsp;";
    //     }
    
    //     for($j=0;$j<(2*$i+1);$j++){
    //         echo "*";
    //     }
    //     echo "<br>";
    // } -->


    <!-- 2.用LINE表示要填入的數字 -->


 <!-- $line = 7 ;
    for($i=0;$i<$line;$i++){
    
    for($k=0;$k<$line-1-$i;$k++){
        echo "&nbsp;";
    }

    for($j=0;$j<(2*$i+1);$j++){
        echo "*";
    }
    echo "<br>";
} -->


<!-- 3.檢查數值 -->

<!-- $line = (isset($GET_['line']))?$_GET['line']:5;
for($i=0;$i<$line;$i++){
    
for($k=0;$k<$line-1-$i;$k++){
    echo "&nbsp;";
}

for($j=0;$j<(2*$i+1);$j++){
    echo "*";
}
echo "<br>";
} -->


<!-- 4.用FUNCTION -->

<!-- 
 function starts($line){
    for($i=0;$i<$line;$i++){
    
        for($k=0;$k<$line-1-$i;$k++){
            echo "&nbsp;";
        }
    
        for($j=0;$j<(2*$i+1);$j++){
            echo "*";
        }
        echo "<br>";
    }
}  -->


<?php
function starts($shape,$line){
switch($shape){
    case "正三角形":
    for($i=0;$i<$line;$i++){
    
        for($k=0;$k<$line-1-$i;$k++){
            echo "&nbsp;";
        }
    
        for($j=0;$j<(2*$i+1);$j++){
            echo "*";
        }
        echo "<br>";
    }
    break;
    case "菱形":
    for($i=0;$i<$line;$i++){
        if($i>floor($line/2)){
            $k1=$i-(floor($line/2));
            $j1=2*($i-(2*($i-(floor($line/2)))))+1;
        }else{
            $k1=(floor($line/2))-$i;
            $j1=(2*$i+1);
        }
    
        for($k=0;$k<$k1;$k++){
            echo "&nbsp;";
        }
    
        for($j=0;$j<$j1;$j++){
            echo "*";
        }
        echo "<br>";
    
    }
    break;  
}
}

/* 回傳指定資料表的所有資料
* @param string $table 資料表名稱
* @return array
*/


function all($table){
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $pdo=new PDO($dsn,'root','');
    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

// /**
//  * 回傳指定資料表的特定ID的單筆資料
//  * @param string $table 資料表名稱
//  * @return integer $id 資料表ID
//  * @return array
//  * /

 function find($table,$id){
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $pdo=new PDO($dsn,'root','');
    $sql="select * from $table where is = '$id'";
    $rows=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $rows;
}





?>








