<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professionals Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Professionals Report</h1>
    @if($startDate && $endDate)
    <p><strong>Date Range:</strong> {{ $startDate }} to {{ $endDate }}</p>
    @else
    @endif
    <p><strong>Number of professionals:</strong> {{$professionals->count()}}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email address</th>
                <th>Phone number</th>
                <th>Address</th>
                <th>Registered on</th>
            </tr>
        </thead>
        <tbody>
          
          @foreach($professionals as $professional)
              <tr>
                  <td>{{ $professional->id }}</td>
                  <td>{{ $professional->first_name }}</td>
                  <td>{{ $professional->last_name }}</td>
                  <td>{{ $professional->user->email}}</td>
                  <td>{{ $professional->phonenumber}}</td>
                  <td>{{ $professional->address->address_line_1}}</td>
                  <td>{{ $professional->created_at}}</td>
              </tr>              
          @endforeach
      </tbody>
  </table>
</body>
</html>
