<html>
<head>
    <title>Test Post</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/buttonPro.css" />
</head>
<body>
<form id="frm" action="" method="post">
    
    <input type="submit" value="Hoàn tất" class="buttonPro"/>
</form>
<span onClick="add_field()" class="buttonPro small blue">Thêm trường</span>
<script>
$(document).ready(function(){
    alert("sdsd");
});

function add_field(){
    $("#frm").append( "<p><input type='text' name=''/></p>" );
}
</script>
</body>
</html>