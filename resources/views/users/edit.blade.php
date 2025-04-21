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
    <h1 style="text-align: center">EDIT USER</h1>
    <div class="container">
        <form action="{{ route('users.update', $users->_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $users->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username"
                    value="{{ old('username', $users->username) }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $users->email) }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone', $users->phone) }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Website</label>
                <input type="text" class="form-control" name="website" value="{{ old('website', $users->website) }}">
                @error('website')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <h4>Address</h4>
            <div class="mb-3">
                <label class="form-label">Street</label>
                <input type="text" class="form-control" name="address[street]"
                    value="{{ old('address.street', $users->address['street'] ?? '') }}">
                @error('address.street')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Suite</label>
                <input type="text" class="form-control" name="address[suite]"
                    value="{{ old('address.suite', $users->address['suite'] ?? '') }}">
                @error('address.suite')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" class="form-control" name="address[city]"
                    value="{{ old('address.city', $users->address['city'] ?? '') }}">
                @error('address.city')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Zipcode</label>
                <input type="text" class="form-control" name="address[zipcode]"
                    value="{{ old('address.zipcode', $users->address['zipcode'] ?? '') }}">
                @error('address.zipcode')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Latitude</label>
                <input type="text" class="form-control" name="address[geo][lat]"
                    value="{{ old('address.geo.lat', $users->address['geo']['lat'] ?? '') }}">
                @error('address.geo.lat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Longitude</label>
                <input type="text" class="form-control" name="address[geo][lng]"
                    value="{{ old('address.geo.lng', $users->address['geo']['lng'] ?? '') }}">
                @error('address.geo.lng')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <h4>Company</h4>
            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" class="form-control" name="company[name]"
                    value="{{ old('company.name', $users->company['name'] ?? '') }}">
                @error('company.name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Catch Phrase</label>
                <input type="text" class="form-control" name="company[catchPhrase]"
                    value="{{ old('company.catchPhrase', $users->company['catchPhrase'] ?? '') }}">
                @error('company.catchPhrase')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Business Strategy (bs)</label>
                <input type="text" class="form-control" name="company[bs]"
                    value="{{ old('company.bs', $users->company['bs'] ?? '') }}">
                @error('company.bs')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>

        <br>
        <a href="{{ route('users.index') }}">
            <button type="button" class="btn btn-primary">List</button>
        </a>
    </div>
</body>

</html>
