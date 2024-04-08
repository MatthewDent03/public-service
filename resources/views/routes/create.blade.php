<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV File</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Upload CSV File</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('upload.csv') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="csvFile">Choose CSV File:</label>
                                <input type="file" class="form-control-file" id="csvFile" name="csvFile" accept=".csv">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
