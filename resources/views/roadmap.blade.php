<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="md:w-1/2 md:sticky top-10">
        <h1 class="text-7xl font-bold mb-2">RoadMap Cerdas</h1>
        <h2 class="text-4xl font-extrabold text-blue-700 capitalize">Untuk {{$user->name}}🔥</h2>
        <form action="{{ route('roadmap.search') }}" method="GET">
            <input id="occupation" type="text" name="occupation" placeholder="Cari Roadmap"
                   class="border rounded-lg px-3 py-2 text-sm w-sm outline-none dark:border-gray-500 dark:bg-gray-900"
                   value="{{ old('occupation') }}" required autocomplete="occupation">
            <button type="submit" class="mt-3 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                Search
            </button>
        </form>
    
        @if(isset($videos))
            <div class="mt-5">
                @foreach($videos as $video)
                    <div class="mb-4">
                        <a href="{{ $video['url'] }}" target="_blank">
                            <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}" class="mb-2">
                            <h3 class="text-2xl font-bold">{{ $video['title'] }}</h3>
                        </a>
                        <p>{{ $video['description'] }}</p>
                        <small>Channel: {{ $video['channel_title'] }}</small>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    
</body>
</html>