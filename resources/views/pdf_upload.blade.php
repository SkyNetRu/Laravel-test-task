<html>
<body>
<h1>Upload PDF</h1>

<form enctype="multipart/form-data" action="{{route('uploadfile')}}" method="POST">
    {{ csrf_field() }}
    Select file: <input name="pdf_file" type="file" />
    <input type="submit" value="Send PDF" />
</form>
</body>
</html>
