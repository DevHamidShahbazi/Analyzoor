@props(['type' => 'video', 'accept' => 'video/*', 'name' => 'video', 'required' => false, 'existingFile' => null, 'label' => 'ویدیو آموزش'])

<div class="chunked-upload-container" data-type="{{ $type }}" data-name="{{ $name }}">
    <div class="upload-area" id="upload-area-{{ $name }}">
        <div class="upload-content" @if($existingFile) style="display: none;" @endif>
            <div class="upload-icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7,10 12,15 17,10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
            </div>
            <div class="upload-text">
                <h4>{{ $label }}</h4>
                <p>فایل را اینجا بکشید یا <span class="upload-link">کلیک کنید</span></p>
                <p class="upload-size-info">حداکثر سایز: ۱ گیگابایت</p>
            </div>
        </div>

        <div class="upload-progress-area" style="display: none;">
            <div class="file-info">
                <div class="file-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                    </svg>
                </div>
                <div class="file-details">
                    <div class="file-name"></div>
                    <div class="file-size"></div>
                </div>
                <div class="upload-actions">
                    <button type="button" class="btn btn-sm btn-danger cancel-upload">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 0%"></div>
                </div>
                <div class="progress-info">
                    <span class="progress-percentage">0%</span>
                    <span class="upload-speed"></span>
                    <span class="time-remaining"></span>
                </div>
            </div>

            <div class="upload-status">
                <span class="status-text">در حال آپلود...</span>
            </div>
        </div>

        <div class="upload-success-area" style="display: none;">
            <div class="success-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="20,6 9,17 4,12"/>
                </svg>
            </div>
            <div class="success-text">
                <h4>آپلود با موفقیت انجام شد</h4>
                <p class="uploaded-filename"></p>
            </div>
            <div class="success-actions">
                <button type="button" class="btn btn-sm btn-secondary change-file">تغییر فایل</button>
            </div>
        </div>

        @if($existingFile)
        <div class="existing-file-area" style="display: block;">
            <div class="existing-file-info">
                <div class="file-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                    </svg>
                </div>
                <div class="existing-file-details">
                    <div class="existing-file-name">فایل موجود</div>
                    <div class="existing-file-actions">
                        <button type="button" class="btn btn-sm btn-primary change-existing-file">تغییر فایل</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <input type="file" id="file-input-{{ $name }}" accept="{{ $accept }}" style="display: none;" {{ $required ? 'required' : '' }}>
    <input type="hidden" id="uploaded-file-{{ $name }}" name="{{ $name }}_path" value="">
    <input type="hidden" id="is-new-upload-{{ $name }}" name="{{ $name }}_is_new" value="0">
</div>

<style>
.chunked-upload-container {
    margin: 20px 0;
}

.upload-area {
    border: 2px dashed #e0e0e0;
    border-radius: 8px;
    padding: 40px 20px;
    text-align: center;
    background-color: #fafafa;
    transition: all 0.3s ease;
    cursor: pointer;
}

.upload-area:hover {
    border-color: #007bff;
    background-color: #f8f9fa;
}

.upload-area.drag-over {
    border-color: #007bff;
    background-color: #e3f2fd;
}

.upload-content {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.upload-icon {
    color: #6c757d;
    margin-bottom: 15px;
}

.upload-text h4 {
    margin: 0 0 10px 0;
    color: #333;
    font-size: 18px;
}

.upload-text p {
    margin: 5px 0;
    color: #666;
}

.upload-link {
    color: #007bff;
    text-decoration: underline;
}

.upload-size-info {
    font-size: 12px;
    color: #999;
}

.upload-progress-area {
    padding: 20px;
}

.file-info {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.file-icon {
    margin-right: 10px;
    color: #007bff;
}

.file-details {
    flex: 1;
}

.file-name {
    font-weight: 500;
    color: #333;
    margin-bottom: 5px;
}

.file-size {
    font-size: 12px;
    color: #666;
}

.upload-actions {
    margin-left: 10px;
}

.progress-container {
    margin-bottom: 15px;
}

.progress-bar {
    width: 100%;
    height: 8px;
    background-color: #e9ecef;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 8px;
}

.progress-fill {
    height: 100%;
    background-color: #007bff;
    transition: width 0.3s ease;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: #666;
}

.upload-status {
    text-align: center;
    color: #666;
    font-size: 14px;
}

.upload-success-area {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.success-icon {
    color: #28a745;
    margin-bottom: 15px;
}

.success-text {
    text-align: center;
    margin-bottom: 15px;
}

.success-text h4 {
    margin: 0 0 10px 0;
    color: #28a745;
    font-size: 18px;
}

.uploaded-filename {
    color: #666;
    font-size: 14px;
}

.existing-file-area {
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 6px;
    border: 1px solid #e9ecef;
}

.existing-file-info {
    display: flex;
    align-items: center;
}

.existing-file-details {
    flex: 1;
    margin-right: 10px;
}

.existing-file-name {
    font-weight: 500;
    color: #333;
    margin-bottom: 5px;
}

.btn {
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    text-decoration: none;
    display: inline-block;
}

.btn-sm {
    padding: 3px 8px;
    font-size: 11px;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.upload-area.uploading {
    border-color: #007bff;
    background-color: #f8f9fa;
}

.upload-area.success {
    border-color: #28a745;
    background-color: #f8fff9;
}

.upload-area.error {
    border-color: #dc3545;
    background-color: #fff5f5;
}

@media (max-width: 768px) {
    .upload-area {
        padding: 20px 10px;
    }

    .progress-info {
        flex-direction: column;
        gap: 5px;
    }

    .file-info {
        flex-direction: column;
        text-align: center;
    }

    .upload-actions {
        margin-left: 0;
        margin-top: 10px;
    }
}
</style>
