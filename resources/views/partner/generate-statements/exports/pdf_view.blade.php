<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Records PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Booking Statement</h1>
    </div>

    <div class="content">
        <p><strong>Name Of Room:</strong> {{ $selectedRoomNames }}</p>
        <p><strong>Room Number:</strong> {{ $selectedRoomNumbers }}</p>

        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Status</th>
                    <th>Room Name</th>
                    <th>Room No.</th>
                    <th>Guest Name</th>
                    <th>Phone No.</th>
                    <th>No. Of Adult</th>
                    <th>No. Of Children</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Price(NGN)</th>
                </tr>
            </thead>
            <tbody>
                @if ($filteredRecords->isEmpty())
                    <tr>
                        <td colspan="8">No record found.</td>
                    </tr>
                @else
                    @foreach ($filteredRecords as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->status }}</td>
                            <td>{{ $record->room_name }}</td>
                            <td>{{ $record->room_number }}</td>
                            <td>{{ $record->guest_name }}</td>
                            <td>{{ $record->phone_number }}</td>
                            <td>{{ $record->adults }}</td>
                            <td>{{ $record->children }}</td>
                            <td>{{ $record->check_in }}</td>
                            <td>{{ $record->check_out }}</td>
                            <td>{{ number_format($record->price, 2) }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="footer">
        <table>
            <tr>
                <td colspan="2"><strong>Totals:</strong></td>
                <td>Cost Price: {{ number_format($totalAmountPaid, 2) }}</td>
            </tr>
        </table>
        <p>Generated on: {{ now()->format('Y-m-d H:i:s') }}</p>
    </div>
</body>
</html>
