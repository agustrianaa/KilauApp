<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown dengan Checkbox</title>
    <!-- Menggunakan Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Dropdown dengan Checkbox</h2>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pilih Item
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <form class="px-4 py-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="checkbox1" id="checkbox1">
                    <label class="form-check-label" for="checkbox1">
                        Checkbox 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="checkbox2" id="checkbox2">
                    <label class="form-check-label" for="checkbox2">
                        Checkbox 2
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="checkbox3" id="checkbox3">
                    <label class="form-check-label" for="checkbox3">
                        Checkbox 3
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Menggunakan Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
