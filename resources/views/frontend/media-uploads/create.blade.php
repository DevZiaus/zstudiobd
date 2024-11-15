<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Upload Media</h2>

                    <div class="mb-4">
                        <div class="flex space-x-4 mb-4">
                            <button type="button" onclick="switchUploadType('file')" 
                                    id="fileBtn"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 active-upload-btn">
                                Upload File
                            </button>
                            <button type="button" onclick="switchUploadType('link')"
                                    id="linkBtn" 
                                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Submit Link
                            </button>
                        </div>

                        <!-- File Upload Form -->
                        <form id="fileUploadForm" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Media File</label>
                                <input type="file" name="media_file" accept="audio/*,video/*" class="mt-1 block w-full" required>
                                <p class="text-sm text-gray-500 mt-1">Maximum file size: 500MB. Supported formats: Audio and Video files only.</p>
                            </div>

                            <div>
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                    Upload File
                                </button>
                            </div>
                        </form>

                        <!-- Link Submission Form -->
                        <form id="linkSubmitForm" class="space-y-4 hidden">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Media URL</label>
                                <input type="url" name="external_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <p class="text-sm text-gray-500 mt-1">Please provide a valid media file URL</p>
                            </div>

                            <div>
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                    Submit Link
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Loading Indicator -->
                    <div id="loadingIndicator" class="hidden">
                        <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white p-6 rounded-lg shadow-xl">
                                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500 mx-auto"></div>
                                <p class="mt-4 text-center">Processing your upload...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- <script>
        // Ensure the switchUploadType function is properly loaded
        console.log('JavaScript loaded');

        function switchUploadType(type) {
            console.log('switchUploadType called with type:', type);  // Debug log

            const fileForm = document.getElementById('fileUploadForm');
            const linkForm = document.getElementById('linkSubmitForm');
            const fileBtn = document.getElementById('fileBtn');
            const linkBtn = document.getElementById('linkBtn');

            if (type === 'file') {
                console.log('Switching to File Form');  // Debug log
                fileForm.classList.remove('hidden');
                linkForm.classList.add('hidden');
                fileBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                fileBtn.classList.remove('bg-gray-500', 'hover:bg-gray-600');
                linkBtn.classList.add('bg-gray-500', 'hover:bg-gray-600');
                linkBtn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
            } else if (type === 'link') {
                console.log('Switching to Link Form');  // Debug log
                fileForm.classList.add('hidden');
                linkForm.classList.remove('hidden');
                linkBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                linkBtn.classList.remove('bg-gray-500', 'hover:bg-gray-600');
                fileBtn.classList.add('bg-gray-500', 'hover:bg-gray-600');
                fileBtn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
            }
        }

        document.getElementById('fileUploadForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            formData.append('upload_type', 'file');

            // File size validation (500MB)
            const fileInput = form.querySelector('input[type="file"]');
            const maxSize = 500 * 1024 * 1024; // 500MB in bytes
            
            if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
                alert('File size exceeds 500MB limit');
                return;
            }

            try {
                document.getElementById('loadingIndicator').classList.remove('hidden');
                
                const response = await fetch('/media-uploads', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                const result = await response.json();

                if (result.success) {
                    alert('File uploaded successfully!');
                    form.reset();
                } else {
                    alert(Object.values(result.errors).flat().join('\n'));
                }
            } catch (error) {
                alert('An error occurred during upload');
            } finally {
                document.getElementById('loadingIndicator').classList.add('hidden');
            }
        });

        document.getElementById('linkSubmitForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            formData.append('upload_type', 'link');

            try {
                document.getElementById('loadingIndicator').classList.remove('hidden');
                
                const response = await fetch('/media-uploads', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                const result = await response.json();

                if (result.success) {
                    alert('Link submitted successfully!');
                    form.reset();
                } else {
                    alert(Object.values(result.errors).flat().join('\n'));
                }
            } catch (error) {
                alert('An error occurred while submitting the link');
            } finally {
                document.getElementById('loadingIndicator').classList.add('hidden');
            }
        });
    </script> -->
    <script type="text/javascript" src="{{asset('custom')}}/upload.js"></script>
    @endpush
</x-app-layout>