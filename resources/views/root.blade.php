<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			@vite('resources/application/main.ts')
	</head>
	<body class="font-sans leading-none text-gray-700 antialiased">
			@hybridly(class: 'h-full')
	</body>
</html>
