<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ajax</title>
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>
	用户名：<input type="text" name="name" id="name">
	年龄:<input type="text" name="age" id="age">
	<input type="button" name="btn" id="btn" value="点击">

	<script type="text/javascript">
		$('#btn').click(function(){
			$.ajax({
				url:'/response/ajax',
				dataType:'json',
				success:function(data){
					$('#name').val(data.name);
					$('#age').val(data.age);
				}
			});
		});
	</script>
</body>
</html>