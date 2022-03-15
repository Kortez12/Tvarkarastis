<!DOCTYPE html>
<html lang="lt">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        * {
            font-family: DejaVu Sans !important;
        }

    </style>
</head>
<body>
    <div class="container py-4">
        <h2 class="text-center">Grupės {{ $pos->pavadinimas.$pos->kodas}} tvarkaraštis</h2>
        <table class="table table-striped table-hover table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>Laikas</th>
                    <th>Dalykas</th>
                    <th>Destytojas</th>
                    <th>Rūmai</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++) <tr class="table-dark">
                    <td colspan="4" class="text-center"><b class="h4">
                            <center><b>{{ $dienos[$i][0] }}</b></center>
                        </b></td>
                    </tr>
                    @foreach ($dienos[$i][1] as $tv)
                    <tr>
                        <td>{{ $tv->valandos }}</td>
                        <td>{{ $tv->dalykas }}</td>
                        <td>{{ $tv->vardas.' '.$tv->pavarde }}</td>
                        <td>{{ $tv->rumai.'-'.$tv->numeris }}</td>
                    </tr>
                    @endforeach
                    @endfor
            </tbody>
        </table>
    </div>

</body>
</html>
