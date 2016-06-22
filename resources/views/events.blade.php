<html xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <div>
        <form>
            <div class="form-group">
                <label for="keyword">Keyword</label>
                <input type="text" id="keyword" name="keyword" class="form-control">
            </div>
        </form>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>タイトル</th>
            </tr>
            </thead>
            <tbody id="result"></tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo=" crossorigin="anonymous"></script>
<script>
    $('#keyword').on('input', function () {
        $.ajax({
            type: 'GET',
            url: '/events/search',
            data: {keyword: $(this).val()},
            success: function (data) {
                $('#result').empty();
                data.forEach(function (val, index) {
                    console.log(val);
                    $('#result').append('<tr><td><a href="' + val.event_url + '" target="_blank">' + val.title + '</a></td></tr>');
                });
            },
            error: function () {
                console.log('error...');
            }
        });
    });

</script>

</body>
</html>
