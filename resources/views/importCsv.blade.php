<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}
</style>
<h1> Upload from File</h1>
<form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
      <input type="file" name="csv_file" required>  
    </div>

    <div style="margin-top: 20px;">
     <button type="submit">Import</button>
    <button type="button" onclick="location.reload()">Cancel</button>   
    </div>  

</form>

<div style="margin-top: 20px;">
    <table width="50%">
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