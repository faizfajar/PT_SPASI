<h1>Fibonacci</h1>
<form action="/fibonacci/buat" method="post">
  @method('POST')
  @csrf
  <label for="row">row</label>
  <br>
  <input type="text" name="row">
  <br>
  <label for="columns">columns</label>
  <br>
  <input type="text" name="column">
  <br>
  <br>

  <button type="submit">submit</button>
</form>