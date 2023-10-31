<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Survey</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-title">
                <div class="text-center">
                    Form Survey
                </div>
            </div>
            <form action="{{ route('admin.surveyStore') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="col-12">
                        <input type="text" class="form-control" name="kep_tanah">
                        <input type="text" class="form-control" name="kep_rumah">
                        <input type="text" class="form-control" name="lantai">
                        <input type="text" class="form-control" name="dinding">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="kep_kendaraan" id="opsiSepeda" value="Sepeda">
                            <label class="form-check-label" for="opsiSepeda">Sepeda</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="kep_kendaraan" id="opsiMotor" value="Motor">
                            <label class="form-check-label" for="opsiMotor">Motor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="kep_kendaraan" id="opsiMobil" value="Mobil">
                            <label class="form-check-label" for="opsiMobil">Mobil</label>
                        </div>
                        <input type="text" class="form-control" name="kep_elektronik">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>