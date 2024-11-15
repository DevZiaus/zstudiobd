function switchUploadType(type) {
    const fileForm = document.getElementById('fileUploadForm');
    const linkForm = document.getElementById('linkSubmitForm');
    const fileBtn = document.getElementById('fileBtn');
    const linkBtn = document.getElementById('linkBtn');

    if (type === 'file') {
        fileForm.classList.remove('hidden');
        linkForm.classList.add('hidden');
        fileBtn.classList.add('bg-blue-500', 'hover:bg-blue-600');
        fileBtn.classList.remove('bg-gray-500', 'hover:bg-gray-600');
        linkBtn.classList.add('bg-gray-500', 'hover:bg-gray-600');
        linkBtn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
    } else if (type === 'link') {
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