<html>
<h2>
    {{ $meal->title}}
</h2>
<p>Your meal has been added!</p>
<p>
    <a href="{{ url('meals/' . $meal->id) }}">View your meal here</a>
</p>

</html>

