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


<?php
$line = (isset($GET_['line']))?$_GET['line']:5;
    for($i=0;$i<$line;$i++){
    
    for($k=0;$k<$line-1-$i;$k++){
        echo "&nbsp;";
    }

    for($j=0;$j<(2*$i+1);$j++){
        echo "*";
    }
    echo "<br>";
}


?>

<!-- 3. -->
 <form action="?">
    <input type="number name='line'">
    <button type='submit'>submit</button>
 </form>









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

