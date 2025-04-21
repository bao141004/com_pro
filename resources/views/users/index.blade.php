<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIST USER
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
        <h1 style="text-align: center">List User</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}">
            <button type="button" class="btn btn-success mb-3">Add</button>
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Website</th>
                    <th scope="col">Company</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $stt = 1; @endphp
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            {{ $item->address['street'] }},
                            {{ $item->address['suite'] }},
                            {{ $item->address['city'] }},
                            {{ $item->address['zipcode'] }}<br>
                            <small>Lat: {{ $item->address['geo']['lat'] }}, Lng:
                                {{ $item->address['geo']['lng'] }}</small>
                        </td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->website }}</td>
                        <td>
                            {{ $item->company['name'] }}<br>
                            <small><i>{{ $item->company['catchPhrase'] }}</i></small><br>
                            <small>{{ $item->company['bs'] }}</small>
                        </td>
                        <td>
                            <a href="{{ route('users.show', $item->_id) }}">
                                <button type="button" class="btn btn-warning btn-sm">Show</button>
                            </a>
                            <a href="{{ route('users.edit', $item->_id) }}">
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                            </a>
                            <form action="{{ route('users.destroy', $item->_id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('You sure you want to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>
