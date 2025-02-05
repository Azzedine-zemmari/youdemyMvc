<?php var_dump($data); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .file-upload-container {
            position: relative;
            width: 100%;
            min-height: 120px;
            border: 2px dashed #e2e8f0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #f8fafc;
            overflow: hidden;
        }

        .file-upload-container:hover {
            border-color: #1A906B;
            background-color: #f0fdf4;
        }

        .file-upload-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            padding: 20px;
            text-align: center;
        }

        .upload-icon {
            color: #1A906B;
            transition: transform 0.3s ease;
        }

        .file-upload-container:hover .upload-icon {
            transform: translateY(-5px);
        }

        .selected-file {
            display: none;
            width: 100%;
            padding: 8px;
            background-color: #f0fdf4;
            border-radius: 6px;
            margin-top: 8px;
            font-size: 0.875rem;
            color: #1A906B;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
<!-- Course Registration Page -->
<section class="bg-white position-relative min-vh-100 overflow-hidden">
    <!-- Decorative SVGs -->
    <span class="position-absolute animate-bounce left-50 top-80 d-none d-xxl-inline-block">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="18" cy="18" r="16" stroke="#1A906B" stroke-width="4" fill="none" />
            </svg>
        </span>

    <div class="container px-4 px-sm-6 px-xxl-0 d-flex align-items-center justify-content-center min-vh-100 position-relative z-10">
        <div class="bg-white p-5 rounded shadow-lg w-100 max-w-lg">
            <h2 class="text-primary-900 font-weight-bold text-center mb-4">Create a New Course</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idUser" value="<?= $_SESSION['user_id'] ?>">
                <div class="mb-4">
                    <input type="text" name="titre" placeholder="Course Title" class="form-control">
                </div>
                <div class="mb-4">
                    <input type="text" name="description" placeholder="Short Description" class="form-control">
                </div>
                <div class="mb-4">
                    <label class="form-check-label">
                        <input type="checkbox" id="toggleInputType" name="checkbox" onclick="toggleContentInput(this)" class="form-check-input">
                        <span class="ms-2 text-gray-600">Enter Text Content</span>
                    </label>
                </div>
                <div class="mb-4 d-none" id="TextContent">
                    <textarea name="content" rows="6" placeholder="Course Content" class="form-control"></textarea>
                </div>
                <div id="fileInputContainer" class="mb-4">
                    <label class="form-label">Upload Video</label>
                    <div class="file-upload-container" id="uploadContainer">
                        <input type="file" name="contentVedeo" class="file-upload-input" id="fileInput" accept="video/*">
                        <div class="upload-content">
                            <svg class="upload-icon" width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 16.2091 19.2091 18 17 18H7C4.79086 18 3 16.2091 3 14C3 11.7909 4.79086 10 7 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 12V15M12 15L14 13M12 15L10 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="text-sm text-gray-600">
                                <span class="font-weight-bold text-primary-500">Click to upload</span>
                                <div class="mt-1 text-xs text-gray-500">MP4, WebM or Ogg (MAX. 800MB)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <select name="categorieId" class="form-select">
                        <option value="">Select Category</option>
                        <?php foreach ($data['categories'] as $category): ?>
                            <option value="<?= $category->idcategory ?>"><?= $category->nom ?></option>
                        <?php endforeach; ?>
                        <!-- Add more categories dynamically -->
                    </select>
                </div>
                <div class="mb-4">
                    <select name="tags[]" class="form-select" multiple>
                        <option value="">Select Category</option>
                        <?php foreach ($data['tags'] as $tag): ?>
                            <option value="<?= $tag->idtag ?>"><?= $tag->nom ?></option>
                        <?php endforeach; ?>
                        <!-- Add more tags dynamically -->
                    </select>
                    <small class="form-text text-muted">Hold Ctrl (or Cmd on Mac) to select multiple tags.</small>
                </div>
                <div class="mb-4">
                    <input type="number" name="price" placeholder="$" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">
                    Register Course
                </button>
            </form>
        </div>
    </div>

    <!-- Floating circles -->
    <div class="position-absolute inset-0 overflow-hidden">
        <span class="position-absolute bg-primary-500 rounded-circle opacity-20 w-40 h-40 bottom-60 right-30"></span>
        <span class="position-absolute bg-blue-500 rounded-circle opacity-30 w-52 h-52 top-80 left-50"></span>
    </div>
</section>
<script>
    function toggleContentInput(checkbox) {
        const TextInputContainer = document.getElementById("TextContent");
        const fileInputContainer = document.getElementById("fileInputContainer");

        if (checkbox.checked) {
            // Show TextContent and hide fileInputContainer
            TextInputContainer.classList.remove("d-none"); // Remove d-none class
            TextInputContainer.style.display = "block"; // Ensure it's visible
            fileInputContainer.style.display = "none"; // Hide file input container
        } else {
            // Hide TextContent and show fileInputContainer
            TextInputContainer.classList.add("d-none"); // Add d-none class
            fileInputContainer.style.display = "block"; // Show file input container
        }
    }2
</script>
</body>

</html>