<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <!-- Tailwind CSS CDN for Hyper UI -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
    <header class="text-center">
        <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Our Blog Posts</h2>
        <p class="max-w-md mx-auto mt-4 text-gray-500">Read the latest articles and stories from our authors.</p>
    </header>

    <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
        <li>
            <a href="/posts/{{ $post['id'] }}" class="block overflow-hidden group">
                <div class="p-6 transition border border-gray-100 bg-white rounded-lg shadow-sm hover:ring-1 hover:ring-gray-200 hover:shadow-lg">
                    <span class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-full"> Post #{{ $post['id'] }} </span>
                    <h3 class="mt-4 text-lg font-bold text-gray-900 group-hover:text-blue-600">{{ $post['title'] }}</h3>
                    <p class="mt-2 text-sm text-gray-500 line-clamp-3">{{ $post['content'] }}</p>
                    <p class="mt-4 text-xs font-medium text-gray-400">By {{ $post['author'] }}</p>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>

</body>
</html>
