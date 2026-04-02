<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <section class="mx-auto max-w-2xl px-4 py-10">
        <h1 class="text-2xl font-bold">Edit Post</h1>

    <form action="/posts/{{ $post['id'] }}" method="POST" class="mt-6 space-y-5 rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post['title']) }}" required class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="content" class="block text-sm font-medium">Content</label>
            <textarea id="content" name="content" rows="5" required class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('content', $post['content']) }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">Update</button>
            <a href="/posts/{{ $post['id'] }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">Cancel</a>
        </div>
    </form>
    </section>
</body>
</html>
