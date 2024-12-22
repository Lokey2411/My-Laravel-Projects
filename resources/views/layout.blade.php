<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    {{-- message to display --}}
    @if (session()->has('success'))
        <p class="bg-green-500 w-full text-center rounded-lg mx-6 my-3 text-white">{{ session()->get('success') }}</p>
    @endif
    @if (session()->has('error'))
        <p class="bg-red-500 w-full text-center rounded-lg mx-6 my-3 text-white">{{ session()->get('error') }}</p>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="bg-red-500 w-full text-center rounded-lg mx-6 my-3 text-white">{{ $error }}</p>
        @endforeach
    @endif
    @yield('content')
</body>

</html>
