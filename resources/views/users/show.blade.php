<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD USER ACCOUNT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">User Infomation</h2>
    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $users['name'] }} ({{ $users['username'] }})</h4>
    
                <p><strong>Email:</strong> {{ $users['email'] }}</p>
                <p><strong>Phone:</strong> {{ $users['phone'] }}</p>
                <p><strong>Website:</strong> <a href="http://{{ $users['website'] }}" target="_blank">{{ $users['website'] }}</a></p>
    
                <h5 class="mt-4">Address</h5>
                <p>
                    {{ $users['address']['street'] }},
                    {{ $users['address']['suite'] }},
                    {{ $users['address']['city'] }},
                    {{ $users['address']['zipcode'] }}<br>
                    <small><strong>Lat:</strong> {{ $users['address']['geo']['lat'] }},
                    <strong>Lng:</strong> {{ $users['address']['geo']['lng'] }}</small>
                </p>
    
                <h5 class="mt-4">Company</h5>
                <p>
                    <strong>{{ $users['company']['name'] }}</strong><br>
                    <i>{{ $users['company']['catchPhrase'] }}</i><br>
                    <small>{{ $users['company']['bs'] }}</small>
                </p>
    
                <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">List</a>
            </div>
        </div>
    </div>
</body>
</html>