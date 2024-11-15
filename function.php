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


/**
 * 建立資料庫的連線變數
 * @param string $db 資料庫名稱
 * @return object
 */
function pdo($db){
    $dsn="mysql:host=localhost;charset=utf8;dbname=$db";
    $pdo=new PDO($dsn,'root','');
    return $pdo;
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
//  * @return integer $id || array $id 資料表ID
//  * @return array
//  * /

function find($table,$id){

    $sql="select * from $table where ";
    $pdo=$pdo=pdo('crud');

    if(is_array($id)){
        $tmp=[];
        foreach($id as $key => $value){
            //sprintf("`%s`='%s'",$key,$value);
            $tmp[]="`$key`='$value'";
        }

        // 簡化 //
  
    //     $sql="select * from $table where ".join(" && ",$tmp);
        
    // }else{
    //     $sql="select * from $table where id='$id'";
    // }


    $sql=$sql.join(" && ",$tmp);
        
}else{
    $sql=$sql . " `id`='$id'";
}
$row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

return $row;
}


/**
* 刪除指定條件的資料
* @param string $table 資料表名稱
* @param array $id 條件(數字或陣列)
* @return boolean
*/

function del($table ,$id){
$sql="delete from $table where ";
$pdo=$pdo=pdo('crud');

if(is_array($id)){
    $tmp=[];
    foreach($id as $key => $value){
        //sprintf("`%s`='%s'",$key,$value);
        $tmp[]="`$key`='$value'";
    }
    $sql=$sql.join(" && ",$tmp);
    
}else{
    $sql=$sql . " id='$id'";
}

 return  $pdo->exec($sql);

}

/**
* 更新指定條件的資料
* @param string $table 資料表名稱
* @param array $array 更新的欄位及內容
* @param array || number $id 條件(數字或陣列)
* @return boolean
*/

function update($table,$array,$id){
$sql="update $table set ";
$pdo=$pdo=pdo('crud');
$tmp=[];
foreach($array as $key => $value){
    $tmp[]="`$key`='$value'";
}
$sql=$sql . join(",",$tmp);

if(is_array($id)){
    $tmp=[];
    foreach($id as $key => $value){
        $tmp[]="`$key`='$value'";
    }
    $sql=$sql . " where ".join(" && ",$tmp);

}else{
    $sql=$sql . " where `id`='$id'";
}

return $pdo->exec($sql);


}

/**
* 列出陣列內容
*/
function dd($array){
echo "<pre>";
print_r($array);
echo "</pre>";
}


update('member',['email'=>'12@gmail.com'],['acc'=>'12','pw'=>'12']);

?>








