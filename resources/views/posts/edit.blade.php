<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT USER ACCOUNT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 style="text-align: center">EDIT User Account</h1>

    <div class="container">
        <form action="{{ route('posts.update',$posts->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">UserId </label>
                <input type="text" class="form-control" value="{{$posts->userId}}" name="userId">
                @error('userId')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title </label>
                <input type="text" class="form-control" value="{{$posts->title}}" name="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Body </label><br>
                <textarea  name="body" id="" cols="30" rows="10">
                    {{$posts->body}}
                </textarea>
                @error('body')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" onclick="return confirm('You sure you want to change the infomation?')" class="btn btn-success">Submit</button>
        </form>
        <br>
        <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-primary">List</button></a>

    </div>

</body>

</html>
