<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <section class="mx-auto max-w-5xl px-4 py-10">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">All Posts</h1>
            </div>
            <a href="/posts/create" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                Create Post
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">Image</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">Title</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">Description</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">Creator</th>
                        <!-- <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">Created At</th> -->
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">{{ $post['id'] }}</td>
                            <td class="px-4 py-3 text-sm">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="h-12 w-12 rounded object-cover">
                                @else
                                    <span class="text-gray-400 text-xs">No image</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $post['title'] }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $post['description'] }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $post->user?->name ?? 'Unknown' }}</td>
                            <!-- <td class="px-4 py-3 text-sm text-gray-600">{{ $post->created_at?->format('M d, Y h:i A') }}</td> -->
                            <td class="px-4 py-3 text-sm">
                                @if($post->trashed())
                                    <span class="rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">Deleted</span>
                                @else
                                    <span class="rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">Active</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if(!$post->trashed())
                                    <a href="/posts/{{ $post['id'] }}" class="mr-3 text-blue-600 hover:underline">View</a>
                                    <a href="/posts/{{ $post['id'] }}/edit" class="mr-3 text-gray-700 hover:underline">Edit</a>
                                    
                                    @if($post->image)
                                        <form action="{{ route('posts.deleteImage', $post->id) }}" method="POST" class="inline mr-3">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="text-yellow-600 hover:underline"
                                                onclick="return confirm('Delete just the image for this post?')"
                                            >
                                                Delete Image
                                            </button>
                                        </form>
                                    @endif

                                    <form action="/posts/{{ $post['id'] }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="text-red-600 hover:underline"
                                            onclick="return confirm('Delete this post?')"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.restore', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="mr-3 text-green-600 hover:underline"
                                        >
                                            Restore
                                        </button>
                                    </form>
                                    <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="text-red-600 hover:underline"
                                            onclick="return confirm('Permanently delete this post and its image?')"
                                        >
                                            Force Delete
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{ $posts->links() }}
        </div>
    </section>
</body>
</html>
