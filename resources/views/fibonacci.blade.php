<!DOCTYPE html>
<html>

<head>
    <title>Fibonacci</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Fibonacci
            </div>
            <div class="card-body">
                <form id="fibonacci-exam" action="#" method="post" class="form-group">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" name="number" class="form-control" value="0">
                        </div>
                        <div class="col-md-4">
                   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" name="submit" id="btnSubmit" class="btn btn-primary "
                                value="Submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <span>Output: </span><span id="output"></span>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#btnSubmit").click(function(event) {
            //stop submit the form, we will post it manually.
            event.preventDefault();
            // Get form
            var form = $('#fibonacci-exam')[0];
            // Create an FormData object 
            var data = new FormData(form);
            // disabled the submit button
            $("#btnSubmit").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ url('fibonacci') }}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                success: function(data) {
                    $("#output").html(data);
                    $("#btnSubmit").prop("disabled", false);
                },
                error: function(e) {
                    $("#output").html(e.responseText);
                    console.log("ERROR : ", e);
                    $("#btnSubmit").prop("disabled", false);
                }
            });
        });
    });
    </script>
</body>

</html>