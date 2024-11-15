<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">My Uploads</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-6 py-3 text-left">Title</th>
                                    <th class="px-6 py-3 text-left">Type</th>
                                    <th class="px-6 py-3 text-left">Status</th>
                                    <th class="px-6 py-3 text-left">Size</th>
                                    <th class="px-6 py-3 text-left">Uploaded At</th>
                                    <th class="px-6 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uploads as $upload)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $upload->title }}</td>
                                    <td class="px-6 py-4">{{ ucfirst($upload->type) }}</td>
                                    <td class="px-6 py-4">{{ ucfirst($upload->status) }}</td>
                                    <td class="px-6 py-4">
                                        @if($upload->type === 'file')
                                            {{ number_format($upload->file_size / 1048576, 2) }} MB
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $upload->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="px-6 py-4">
                                        @if($upload->type === 'file')
                                            <a href="{{ Storage::url($upload->file_path) }}" 
                                               target="_blank"
                                               class="text-blue-600 hover:text-blue-800">
                                                Download
                                            </a>
                                        @else
                                            <a href="{{ $upload->external_url }}" 
                                               target="_blank"
                                               class="text-blue-600 hover:text-blue-800">
                                                View Link
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $uploads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>