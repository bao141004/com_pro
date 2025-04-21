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
    <h1 style="text-align: center">ADD USER</h1>
<div class="container">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>    
            <input type="text" class="form-control" name="phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Website</label>    
            <input type="text" class="form-control" name="website">
            @error('website')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <h4>Address</h4>
        <div class="mb-3">
            <label class="form-label">Street</label>
            <input type="text" class="form-control" name="address[street]">    
        </div>
            @error('address[street]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label class="form-label">Suite</label>
            <input type="text" class="form-control" name="address[suite]">    
        </div>
            @error('address[suite]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="address[city]">    
        </div>
            @error('address[city]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label class="form-label">Zipcode</label>
            <input type="text" class="form-control" name="address[zipcode]">    
        </div>
            @error('address[zipcode]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label class="form-label">Latitude</label>
            <input type="text" class="form-control" name="address[geo][lat]">    
        </div>
            @error('address[geo][lat]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label class="form-label">Longitude</label>    
            <input type="text" class="form-control" name="address[geo][lng]">
            @error('address[geo][lng]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <h4>Company</h4>
        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control" name="company[name]">    
        </div>
            @error('company[name]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label class="form-label">Catch Phrase</label>
            <input type="text" class="form-control" name="company[catchPhrase]">    
        </div>
            @error('company[catchPhrase]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <div class="mb-3">
            <label class="form-label">Business Strategy (bs)</label>    
            <input type="text" class="form-control" name="company[bs]">
            @error('company[bs]')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">
        <button type="button" class="btn btn-primary">List</button>
    </a>
</div>
</body>

</html>
