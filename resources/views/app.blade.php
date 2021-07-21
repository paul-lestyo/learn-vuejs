<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div id="app">
			<Navigation></Navigation>
		<div class="py-4">
			<router-view />
		</div>
		</div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>