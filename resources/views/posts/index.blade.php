<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIST USER ACCOUNT
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">List Post</h1>
        @if (session('status')) 
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        <table class="table">
            <a href="{{route('posts.create')}}"><button type="button" class="btn btn-success" >Add</button></a>
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">UserId</th>
                    <th scope="col">title</th>
                    <th scope="col">body</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $stt = 1 @endphp
                @foreach ($post as $item)
                    <tr>
                        <th scope="row">{{$stt++}}</th>
                        <td>{{$item->userId}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->body}}</td>
                        <td>
                            <a href="{{route('posts.show' , $item->id)}}">
                                <button type="button" href="" class="btn btn-warning">Show</button>
                            </a>  
                            <a href="{{route('posts.edit' , $item->id)}}">
                                <button type="button" href="" class="btn btn-primary">Edit</button>
                            </a>          
                            <form action="{{route('posts.destroy' , $item->id)}}" onclick="
                            return confirm('You sure you want to delete ??')" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                               <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
