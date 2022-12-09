<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full flex flex-col">
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			@vite('resources/application/main.ts')
	</head>
	<body class="h-full bg-gray-50 antialiased">
			@hybridly(class: 'h-full')
	</body>
</html>
