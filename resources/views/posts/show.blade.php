<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <section class="mx-auto max-w-3xl px-4 py-10">
        <div class="mb-4">
            <p class="text-sm text-gray-500">Simple Blog</p>
            <h1 class="text-2xl font-bold">Post Details</h1>
        </div>

        <article class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-gray-500">ID: {{ $post['id'] }}</p>
            <h1 class="mt-1 text-2xl font-bold">{{ $post['title'] }}</h1>
            <p class="mt-4 leading-7 text-gray-700">{{ $post['content'] }}</p>
        </article>

        <div class="mt-6 flex gap-3">
            <a href="/posts" class="inline-block rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                Back
            </a>
            <a href="/posts/{{ $post['id'] }}/edit" class="inline-block rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Edit
            </a>
            <form action="/posts/{{ $post['id'] }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700"
                    onclick="return confirm('Delete this post?')"
                >
                    Delete
                </button>
            </form>
        </div>
    </section>
</body>
</html>