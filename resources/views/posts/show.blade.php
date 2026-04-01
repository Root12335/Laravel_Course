<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post['title'] }}</title>
    <!-- Tailwind CSS CDN for Hyper UI -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col items-center justify-center min-h-screen text-gray-800 p-6">

    <article class="max-w-2xl px-6 py-12 mx-auto bg-white border border-gray-100 rounded-lg shadow-sm sm:px-12 sm:py-16">
        <div class="space-y-4 text-center">
            <span class="inline-block px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full"> Post #{{ $post['id'] }} </span>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                {{ $post['title'] }}
            </h1>
            <p class="text-sm font-medium text-gray-500">
                Written by <span class="font-bold text-gray-800">{{ $post['author'] }}</span>
            </p>
        </div>

        <div class="mt-8 prose prose-gray max-w-none">
            <p class="text-lg leading-relaxed text-gray-600">
                {{ $post['content'] }}
            </p>
        </div>

        <div class="mt-8 text-center sm:text-left border-t border-gray-100 pt-8">
            <a href="/posts" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition">
                <svg fill="currentColor" class="w-4 h-4 mr-2" viewBox="0 0 20 20">
                     <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
                Back to all posts
            </a>
        </div>
    </article>

</body>
</html>