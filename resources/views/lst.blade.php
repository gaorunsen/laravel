<!DOCTYPE html>
<html>
<head>
	<title>post</title>
</head>
<body>
	<form action="/user/add" method="post">
		{{ csrf_field() }}
		用户名: <input type="text" name="name">
		<input type="submit" name="btn" value="提交">
	</form>
</body>
</html>