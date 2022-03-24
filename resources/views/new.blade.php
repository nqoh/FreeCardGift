<form method="post" action="upload"  >
    @csrf
    <input type="text" name="name" value="{{@old('name')}}"><br><br>
    <span style="color:red">@error('name') {{$message}} @enderror</span>
    <input type="password" name="password" value="{{@old('password')}}"><br>
    <button type="submit">Submit</button>
</form>