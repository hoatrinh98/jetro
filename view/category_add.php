<!DOCTYPE html>
<html>
<head>
<style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  float:left;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  resize: none;
}
input[type=button] {
  background-color: #e9d8f4;
  border: none;
  color: #58257b;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  float:right;
  border-radius:10px;
}
.body{
	width:800px;
	margin-left:20%;
	color:#00868B;
}
.txt{
	font-size:25px;
}
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  resize: none;
}
</style>
</head>

<body>
<form class="body">
	<h1 style="text-align:center">Thêm Mới Danh Mục</h1>
  <label for="fname" class="txt">Nhập tên danh mục:</label>
  <input type="text" id="fname" name="fname">
  <textarea placeholder="Viết mô tả..."></textarea>
  <input type="button" value="Thêm" class="txt">
</form>

</body>
</html>