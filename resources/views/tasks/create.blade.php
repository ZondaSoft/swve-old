<form action="{{ route('tasks.store') }}" method="post">
    {{ csrf_field() }}
    Task name:
    <br />
    <input type="text" name="cod_nov" />
    <br /><br />
    Task description:
    <br />
    <textarea name="comenta1"></textarea>
    <br /><br />
    Start time:
    <br />
    <input type="text" name="fecha" class="date" />
    <br /><br />
    <input type="submit" value="Save" />
</form>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
