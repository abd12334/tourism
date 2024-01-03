<form action="{{route('updatePass',['id'=>$user->id])}}" method="post">
    @csrf
    <label for="">new Password :</label>
    <input type="Password"  name="password" required autocomplete="current-password">
    <br><br>
    <input type="submit" value="Update" name="Update">
</form>
