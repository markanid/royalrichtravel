<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @if ($data['source'] === 'service')
            Service Enquiry
        @elseif ($data['source'] === 'package')
            Package Enquiry
        @else
            Website Enquiry
        @endif
    </title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <tr>
            <th align="left">Name</th>
            <td>{{ $data['name'] }}</td>
        </tr>
        @if ($data['source'] === 'contact')
            <tr>
                <th align="left">Email</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th align="left">Phone</th>
                <td>{{ $data['phone'] }}</td>
            </tr>
        @elseif ($data['source'] === 'service')
            <tr>
                <th align="left">Service Name</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th align="left">Phone</th>
                <td>{{ $data['phone'] }}</td>
            </tr>
        @elseif ($data['source'] === 'package')
            <tr>
                <th align="left">Email</th>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th align="left">Package Name</th>
                <td>{{ $data['phone'] }}</td>
            </tr>
        @endif
        <tr>
            <th align="left">Message</th>
            <td>{{ $data['comment'] }}</td>
        </tr>
    </table>
</body>
</html>