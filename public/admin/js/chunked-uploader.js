/**
 * Chunked File Uploader
 * Handles large file uploads with chunking, progress tracking, and resumable uploads
 */
class ChunkedUploader {
        constructor(container, options = {}) {
        this.container = container;
        this.options = {
            chunkSize: 1024 * 1024 * 2, // 2MB chunks
            maxFileSize: 1024 * 1024 * 1024, // 1GB max
            maxRetries: 3,
            retryDelay: 1000,
            uploadUrl: '/admin-panel/episode/chunked-upload',
            checkUrl: '/admin-panel/episode/chunked-upload/check',
            ...options
        };

        this.type = container.dataset.type;
        this.name = container.dataset.name;
        this.currentUpload = null;
        this.isUploading = false;
        this.isPaused = false;
        this.originallyRequired = false;

        this.init();
    }

    init() {
        this.setupElements();
        this.setupEventListeners();
        this.setupDragAndDrop();
    }

            setupElements() {
        this.uploadArea = this.container.querySelector('.upload-area');
        this.uploadContent = this.container.querySelector('.upload-content');
        this.progressArea = this.container.querySelector('.upload-progress-area');
        this.successArea = this.container.querySelector('.upload-success-area');
        this.existingFileArea = this.container.querySelector('.existing-file-area');
        this.fileInput = this.container.querySelector(`#file-input-${this.name}`);
        this.uploadedFileInput = this.container.querySelector(`#uploaded-file-${this.name}`);
        this.isNewUploadInput = this.container.querySelector(`#is-new-upload-${this.name}`);
        this.deleteFileInput = this.container.querySelector(`#delete-file-${this.name}`);

        // Store original required state
        this.originallyRequired = this.fileInput.hasAttribute('required');

        // Check if there's an existing file
        if (this.existingFileArea && this.existingFileArea.style.display !== 'none') {
            // Set the uploaded file input value if it exists
            const hiddenInput = this.container.parentElement.querySelector(`input[name="${this.name}_path"]`);
            if (hiddenInput && hiddenInput.value) {
                this.uploadedFileInput.value = hiddenInput.value;
                this.isNewUploadInput.value = '1';
                // Remove required attribute since we have a file
                this.fileInput.removeAttribute('required');
            }
        }

        // Progress elements
        this.fileNameEl = this.container.querySelector('.file-name');
        this.fileSizeEl = this.container.querySelector('.file-size');
        this.progressFill = this.container.querySelector('.progress-fill');
        this.progressPercentage = this.container.querySelector('.progress-percentage');
        this.uploadSpeed = this.container.querySelector('.upload-speed');
        this.timeRemaining = this.container.querySelector('.time-remaining');
        this.statusText = this.container.querySelector('.status-text');
        this.uploadedFilename = this.container.querySelector('.uploaded-filename');

        // Buttons
        this.cancelButton = this.container.querySelector('.cancel-upload');
        this.changeFileButton = this.container.querySelector('.change-file');
        this.changeExistingFileButton = this.container.querySelector('.change-existing-file');
        this.deleteExistingFileButton = this.container.querySelector('.delete-existing-file');
    }

    setupEventListeners() {
        // File input change
        this.fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                this.handleFileSelect(e.target.files[0]);
            }
        });

        // Upload area click
        this.uploadArea.addEventListener('click', (e) => {
            if (!this.isUploading && e.target.closest('.upload-content')) {
                this.fileInput.click();
            }
        });

        // Cancel upload
        if (this.cancelButton) {
            this.cancelButton.addEventListener('click', () => {
                this.cancelUpload();
            });
        }

        // Change file buttons
        if (this.changeFileButton) {
            this.changeFileButton.addEventListener('click', () => {
                this.resetUploader();
            });
        }

        if (this.changeExistingFileButton) {
            this.changeExistingFileButton.addEventListener('click', () => {
                this.showUploadArea();
            });
        }

        // Delete existing file button
        if (this.deleteExistingFileButton) {
            this.deleteExistingFileButton.addEventListener('click', () => {
                this.deleteExistingFile();
            });
        }
    }

    setupDragAndDrop() {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            this.uploadArea.addEventListener(eventName, this.preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            this.uploadArea.addEventListener(eventName, () => {
                this.uploadArea.classList.add('drag-over');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            this.uploadArea.addEventListener(eventName, () => {
                this.uploadArea.classList.remove('drag-over');
            }, false);
        });

        this.uploadArea.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                this.handleFileSelect(files[0]);
            }
        }, false);
    }

    preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    handleFileSelect(file) {
        // Validate file
        if (!this.validateFile(file)) {
            return;
        }

        this.currentUpload = {
            file: file,
            identifier: this.generateIdentifier(),
            chunkNumber: 1,
            totalChunks: Math.ceil(file.size / this.options.chunkSize),
            uploadedChunks: 0,
            startTime: Date.now(),
            retryCount: 0
        };

        this.showProgressArea();
        this.updateFileInfo();
        this.startUpload();
    }

    validateFile(file) {
        if (file.size > this.options.maxFileSize) {
            this.showError('فایل بیش از حد مجاز بزرگ است');
            return false;
        }

        // Additional validation based on file type
        if (this.type === 'video' && !file.type.startsWith('video/')) {
            this.showError('لطفاً فایل ویدیو انتخاب کنید');
            return false;
        }

        return true;
    }

    generateIdentifier() {
        return Date.now() + '_' + Math.random().toString(36).substr(2, 9);
    }

    showProgressArea() {
        this.uploadContent.style.display = 'none';
        this.progressArea.style.display = 'block';
        this.successArea.style.display = 'none';
        if (this.existingFileArea) {
            this.existingFileArea.style.display = 'none';
        }
        this.uploadArea.classList.add('uploading');
        this.uploadArea.classList.remove('error'); // Clear any error state
        this.isUploading = true;
    }

    showSuccessArea() {
        this.uploadContent.style.display = 'none';
        this.progressArea.style.display = 'none';
        this.successArea.style.display = 'block';
        if (this.existingFileArea) {
            this.existingFileArea.style.display = 'none';
        }
        this.uploadArea.classList.remove('uploading', 'error');
        this.uploadArea.classList.add('success');
        this.isUploading = false;
    }

    showUploadArea() {
        this.uploadContent.style.display = 'block';
        this.progressArea.style.display = 'none';
        this.successArea.style.display = 'none';
        if (this.existingFileArea) {
            this.existingFileArea.style.display = 'none';
        }
        this.uploadArea.classList.remove('uploading', 'success', 'error');
        this.isUploading = false;
    }

    updateFileInfo() {
        if (this.currentUpload) {
            this.fileNameEl.textContent = this.currentUpload.file.name;
            this.fileSizeEl.textContent = this.formatFileSize(this.currentUpload.file.size);
        }
    }

    formatFileSize(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    async startUpload() {
        if (!this.currentUpload) return;

        this.statusText.textContent = 'در حال آپلود...';

        try {
            for (let i = 1; i <= this.currentUpload.totalChunks; i++) {
                if (this.isPaused) {
                    this.statusText.textContent = 'متوقف شده';
                    return;
                }

                this.currentUpload.chunkNumber = i;
                const success = await this.uploadChunk(i);

                if (!success) {
                    throw new Error('آپلود ناموفق');
                }

                this.currentUpload.uploadedChunks++;
                this.updateProgress();
            }

            this.completeUpload();
        } catch (error) {
            this.handleUploadError(error);
        }
    }

    async uploadChunk(chunkNumber) {
        const start = (chunkNumber - 1) * this.options.chunkSize;
        const end = Math.min(start + this.options.chunkSize, this.currentUpload.file.size);
        const chunk = this.currentUpload.file.slice(start, end);

        const formData = new FormData();
        formData.append('file', chunk);
        formData.append('resumableChunkNumber', chunkNumber);
        formData.append('resumableTotalChunks', this.currentUpload.totalChunks);
        formData.append('resumableIdentifier', this.currentUpload.identifier);
        formData.append('resumableFilename', this.currentUpload.file.name);
        formData.append('resumableChunkSize', this.options.chunkSize);
        formData.append('resumableTotalSize', this.currentUpload.file.size);
        formData.append('type', this.type);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        try {
            const response = await fetch(this.options.uploadUrl, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

                         if (result.success) {
                 // Store the temp path when upload is completed
                 if (result.completed && result.filename) {
                     this.currentUpload.tempPath = result.filename;
                 }
                 return result;
             } else {
                 throw new Error(result.message || 'آپلود ناموفق');
             }
        } catch (error) {
            // Retry logic
            if (this.currentUpload.retryCount < this.options.maxRetries) {
                this.currentUpload.retryCount++;
                await this.sleep(this.options.retryDelay);
                return this.uploadChunk(chunkNumber);
            }
            throw error;
        }
    }

    updateProgress() {
        if (!this.currentUpload) return;

        const progress = (this.currentUpload.uploadedChunks / this.currentUpload.totalChunks) * 100;
        this.progressFill.style.width = progress + '%';
        this.progressPercentage.textContent = Math.round(progress) + '%';

        // Calculate upload speed and time remaining
        const elapsed = Date.now() - this.currentUpload.startTime;
        const uploadedBytes = this.currentUpload.uploadedChunks * this.options.chunkSize;
        const speed = uploadedBytes / (elapsed / 1000); // bytes per second
        const remainingBytes = this.currentUpload.file.size - uploadedBytes;
        const timeRemaining = remainingBytes / speed; // seconds

        this.uploadSpeed.textContent = this.formatFileSize(speed) + '/s';
        this.timeRemaining.textContent = this.formatTime(timeRemaining);
    }

    formatTime(seconds) {
        if (isNaN(seconds) || seconds === Infinity) return '';

        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);

        if (minutes > 0) {
            return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
        } else {
            return `${remainingSeconds}s`;
        }
    }

        async completeUpload() {
        this.statusText.textContent = 'تکمیل آپلود...';

        // The last chunk response should contain the filename
        this.uploadedFileInput.value = this.currentUpload.tempPath || '';
        this.isNewUploadInput.value = '1';

        // Remove required attribute from hidden file input since we have a file uploaded
        this.fileInput.removeAttribute('required');

        this.uploadedFilename.textContent = this.currentUpload.file.name;
        this.showSuccessArea();

        // Trigger success event
        this.container.dispatchEvent(new CustomEvent('upload-complete', {
            detail: {
                filename: this.currentUpload.file.name,
                type: this.type,
                tempPath: this.currentUpload.tempPath
            }
        }));
    }

    cancelUpload() {
        this.isPaused = true;
        this.currentUpload = null;
        this.resetUploader();
    }

        resetUploader() {
        this.currentUpload = null;
        this.isUploading = false;
        this.isPaused = false;
        this.uploadedFileInput.value = '';
        this.isNewUploadInput.value = '0';
        this.fileInput.value = '';

        // Restore required attribute if it was originally required
        if (this.originallyRequired) {
            this.fileInput.setAttribute('required', '');
        } else {
            this.fileInput.removeAttribute('required');
        }

        this.showUploadArea();
    }

    deleteExistingFile() {
        // Set delete flag
        this.deleteFileInput.value = '1';
        
        // Clear uploaded file path
        this.uploadedFileInput.value = '';
        this.isNewUploadInput.value = '0';
        
        // Hide existing file area and show upload area
        if (this.existingFileArea) {
            this.existingFileArea.style.display = 'none';
        }
        
        // Show upload content
        this.showUploadArea();
        
        // Add visual feedback
        this.uploadArea.classList.add('file-deleted');
        setTimeout(() => {
            this.uploadArea.classList.remove('file-deleted');
        }, 2000);
    }

    handleUploadError(error) {
        console.error('Upload error:', error);
        this.statusText.textContent = 'خطا در آپلود: ' + error.message;
        this.uploadArea.classList.add('error');
        this.isUploading = false;

        // Show retry option
        setTimeout(() => {
            this.resetUploader();
        }, 3000);
    }

    showError(message) {
        alert(message); // You can replace this with a better notification system
    }

    sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
}

// Auto-initialize chunked uploaders when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Add CSRF token to meta tags if not already present
    if (!document.querySelector('meta[name="csrf-token"]')) {
        const meta = document.createElement('meta');
        meta.name = 'csrf-token';
        meta.content = document.querySelector('input[name="_token"]')?.value || '';
        document.head.appendChild(meta);
    }

    // Initialize all chunked upload containers
    const uploaders = [];
    document.querySelectorAll('.chunked-upload-container').forEach(container => {
        const uploader = new ChunkedUploader(container);
        uploaders.push(uploader);
    });

    // Make uploaders available globally
    window.chunkedUploaders = uploaders;

    // Add form validation for chunked uploads
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let hasError = false;

            // Check all chunked upload containers in this form
            const uploadContainers = form.querySelectorAll('.chunked-upload-container');
            uploadContainers.forEach(container => {
                const fileInput = container.querySelector('input[type="file"]');
                const uploadedFileInput = container.querySelector('input[name$="_path"]');
                const isNewUploadInput = container.querySelector('input[name$="_is_new"]');

                // If field is required and no file is uploaded
                if (fileInput && fileInput.hasAttribute('required')) {
                    const hasFile = fileInput.files.length > 0;
                    const hasUploadedFile = uploadedFileInput && uploadedFileInput.value;

                    if (!hasFile && !hasUploadedFile) {
                        hasError = true;

                        // Show error on upload area
                        const uploadArea = container.querySelector('.upload-area');
                        if (uploadArea) {
                            uploadArea.classList.add('error');
                            uploadArea.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }

                        // Show error message
                        const label = container.previousElementSibling?.textContent || 'فایل';
                        alert(`لطفاً ${label} را انتخاب کنید`);
                    }
                }
            });

            if (hasError) {
                e.preventDefault();
                return false;
            }
        });
    });
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = ChunkedUploader;
}
