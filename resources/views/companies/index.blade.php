<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgb(62, 62, 243);
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        @media (max-width: 600px) {
            table {
                overflow-x: auto;
            }
        }
    </style>
    <title>CSS Table Template</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td></td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->phone }}</td>
                    <td><a href="{{ Route('companies.edit', ['company' => $company->id]) }}"><img style="width: 30px"
                                src="data:image/png;base64,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"
                                alt=""></a></td>
                    <td><a href="{{Route('companies.destroy',['company'=>$company->id])}}"><img style="width: 30px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgxgk2JJECcveyd80tbCtE3TwsNj-WlmUApw&usqp=CAU" alt=""></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <button>
        <a href="{{route('companies.create')}}">Add Company</a>
    </button>
</body>

</html>

