<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-end mb-4 px-6 py-4">
                    <a href="{{ route('articles.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Article
                    </a>
                </div>

                <!-- Articles Table -->
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Body
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Updated At
                            </th>

                            <th
                                class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Actions
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($articles as $article)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $article->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $article->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $article->body }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $article->created_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $article->updated_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    <a href="{{ route('articles.show', $article->id) }}"
                                    class="inline-block bg-green-500 hover:bg-green-700 text-white text-sm py-1 px-2 rounded">
                                    View
                                    </a>

                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-700 text-white text-sm py-1 px-2 rounded" 
                                                onclick="return confirm('Are you sure you want to delete this article?');">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        No articles found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
