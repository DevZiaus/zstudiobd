<!-- <x-app-layout>
</div>
    <h2>{{$title}}</h2>
    <p>{{$date}}</p>
    <p>{{$text}}</p>

</x-app-layout> -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <!-- Display the logo image -->
    <div style="text-align: center;">
        <img src="{{ asset('/logo.png') }}" alt="Logo" width="150" height="auto">
    </div>
    
    <h1>{{ $title }}</h1>
    <p>Date: {{ $date }}</p>
    <div>
        {{ $text }}
    </div>
</body>
</html>
