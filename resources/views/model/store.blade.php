<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="">
    <select name="abc" id="x">
        <option value="">select</option>
        <option value="input">input</option>
        <option value="option">option</option>
    </select>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(function(){
    $('#x').on('change',function(){
        let value = $(this).children('option:selected').val();
       $.get('http://crcms.local/api/v1/manage/fields/'+value+'/settings',function(data){

       });
    });
})
</script>
</body>
</html>