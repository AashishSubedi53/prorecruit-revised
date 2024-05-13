<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Report</title>
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
            padding: 5px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Customers Report</h1>
    @if($startDate && $endDate)
    <p><strong>Date Range:</strong> {{ $startDate }} to {{ $endDate }}</p>
    @else
    @endif
    <p><strong>Number of customers:</strong> {{$customers->count()}}</p>

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
          
          @foreach($customers as $customer)
              <tr>
                  <td>{{ $customer->id }}</td>
                  <td>{{ $customer->first_name }}</td>
                  <td>{{ $customer->last_name }}</td>
                  <td>{{ $customer->user->email}}</td>
                  <td>{{ $customer->phonenumber}}</td>
                  <td>{{ $customer->address}}</td>
                  <td>{{ $customer->created_at}}</td>
              </tr>              
          @endforeach
      </tbody>
  </table>
</body>
</html>



