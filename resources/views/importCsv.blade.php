<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    .container {
      margin: 20px auto;
      width: 80%;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input[type="file"] {
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      font-size: 14px;
    }
    .btn-group {
      margin-top: 20px;
      text-align: center;
    }
    button {
      padding: 10px 20px;
      font-size: 14px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    button.cancel {
      background-color: #913831;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      border: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Upload from File</h1>
    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="csv_file">CSV File:</label>
        <input type="file" name="csv_file" required>  
      </div>
      <div class="btn-group">
        <button type="submit">Import</button>
        <button type="button" onclick="location.reload()" class="cancel">Cancel</button>   
      </div>
    </form>
    <div style="margin-top: 20px;">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Level</th>
            <th>Class</th>
            <th>Parents Contact</th>  
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{ $item->Name }}</td>
            <td>{{ $item->Level }}</td>
            <td>{{ $item->Class}}</td>
            <td>{{ $item->Parent_Contact}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
