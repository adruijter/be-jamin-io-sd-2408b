@vite(['resources/css/app.css', 'resources/js/app.js']);
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
</head>
<body>
    <div class="container">

        <h1>{{ $title }}</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dimissable fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
            </div>
            <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
        @endif

        <a href="/allergeen/create">Nieuwe Allergeen</a>
    
        <table class="table table-hover">
            <thead>
                <th>Naam</th>
                <th>Omschrijving</th>
            </thead>
            <tbody>
                @forelse ($allergenen as $allergeen)
                    <tr>
                        <td>{{ $allergeen->Naam }}</td>
                        <td>{{ $allergeen->Omschrijving }}</td>
                    </tr>
                @empty
                    <tr colspan='3'>Geen allergenen bekent</tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>