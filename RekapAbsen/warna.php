<?php $a; $b=5; $hasil;?>
<html>
    <head></head>
    <body>
    <label for="">Pilih Warna : </label>
    <?php $a="<p id='angka'></p>";
    echo "lihat".$a." + ".$b; 
    
    // $hasil = $a+$b;
    // var_dump($hasil);
    // echo "jawab: ".$hasil;
    ?>
    

    <select id="bulan">
        <option value=1>Blue</option>
        <option value=2>Yellow</option>
        <option value="#4CAF50">Green</option>
        <option value="#E91E63">Pink</option>
        <option value="#9E9E9E">Grey</option>
        <option value="#9C27B0">Purple</option>
    </select>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#bulan").change(function(){
        var get = $('#bulan').val();
        $("body").css({"background-color": get});
        document.getElementById("angka").innerHTML = get;
    });
});
</script> 
</body>
    
</html>