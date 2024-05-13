<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings Report</title>
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
    <h1>Bookings Report</h1>
    @if($startDate && $endDate)
    <p><strong>Date Range:</strong> {{ $startDate }} to {{ $endDate }}</p>
    @else
    @endif
    <p><strong>Number of bookings:</strong>{{$bookings->count()}}</p>

    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Booking Date</th>
                <th>Booking Status</th>
                <th>Payment Status</th>
                <th>Payment amount</th>
            </tr>
        </thead>
        <tbody>
          @php
              $total_amount = 0;
          @endphp
          @foreach($bookings as $booking)
              <tr>
                  <td>{{ $booking->id }}</td>
                  <td>{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</td>
                  <td>{{ $booking->created_at }}</td>
                  <td>{{ $booking->order_status }}</td>
                  <td>{{ $booking->payment->payment_status }}</td>
                  <td>{{ ($booking->payment->payment_amount)/100 }}</td>
              </tr>
              @php
                  $total_amount += $booking->payment->payment_amount;
              @endphp
          @endforeach
      </tbody>
  </table>
  <p><strong>Total amount: NRs.</strong>{{ ($total_amount)/100 }}</p>
</body>
</html>
