# Chunked Upload System for Large Video Files

## 🎯 Overview

This implementation provides a YouTube-like chunked upload system for handling large video files (500MB+) in the Analyzoor Laravel application. The system includes modern drag & drop UI, progress tracking, resumable uploads, and background video processing.

## ✨ Features

### Core Features
- **Chunked Uploads**: Break large files into 2MB chunks for reliable uploads
- **Drag & Drop Interface**: Modern, intuitive file upload experience
- **Real-time Progress**: Live progress bars with speed and time remaining
- **Resumable Uploads**: Automatic retry logic with 3 attempts
- **Background Processing**: Video optimization and thumbnail generation
- **Form Validation**: Proper validation for both traditional and chunked uploads
- **Error Handling**: Comprehensive error handling and user feedback

### Technical Features
- **Memory Efficient**: Streaming file processing without loading entire files into memory
- **Cross-browser Compatible**: Works on all modern browsers
- **Mobile Responsive**: Optimized for mobile devices
- **Backward Compatible**: Preserves existing upload functionality
- **Production Ready**: Includes logging, monitoring, and security features

## 🏗️ Architecture

### Backend Components

#### 1. ChunkedUploadController
**Location**: `app/Http/Controllers/admin/ChunkedUploadController.php`

**Key Methods**:
- `upload()` - Handles chunked file uploads
- `checkChunk()` - Checks if chunk already exists (for resumable uploads)
- `moveToFinalLocation()` - Moves files from temp to final location
- `deleteTempFile()` - Cleans up temporary files

#### 2. ProcessVideoJob
**Location**: `app/Jobs/ProcessVideoJob.php`

**Features**:
- Automatic thumbnail generation using FFmpeg
- Video information extraction (duration, size, codec)
- Video optimization for large files
- Error handling and retry logic

#### 3. Updated EpisodeController
**Location**: `app/Http/Controllers/admin/EpisodeController.php`

**Changes**:
- Handles both traditional and chunked uploads
- Dispatches background video processing jobs
- Manages file cleanup and organization

### Frontend Components

#### 1. Chunked Upload Component
**Location**: `resources/views/components/chunked-upload.blade.php`

**Features**:
- Drag & drop interface
- Progress tracking
- Success/error states
- Existing file management

#### 2. JavaScript Uploader
**Location**: `public/admin/js/chunked-uploader.js`

**Features**:
- Chunked upload logic
- Progress calculation
- Error handling
- Form validation integration

## 📁 File Structure

```
app/
├── Http/
│   ├── Controllers/admin/
│   │   ├── ChunkedUploadController.php    # Chunked upload handling
│   │   └── EpisodeController.php          # Updated episode controller
│   └── Requests/
│       └── EpisodeAdminRequest.php        # Updated validation rules
├── Jobs/
│   └── ProcessVideoJob.php                # Background video processing
└── Models/
    └── Episode.php                        # Updated with new fields

resources/
└── views/
    ├── components/
    │   └── chunked-upload.blade.php       # Upload component
    └── admin/course/episode/
        ├── create.blade.php               # Updated create form
        └── edit.blade.php                 # Updated edit form

public/
└── admin/js/
    └── chunked-uploader.js                # Upload JavaScript

database/
└── migrations/
    └── 2025_07_05_211605_add_video_processing_fields_to_episodes_table.php

routes/
└── web/admin/
    └── episode.php                        # Updated with chunked routes
```

## 🚀 Installation & Setup

### 1. Database Migration
```bash
php artisan migrate
```

### 2. Create Required Directories
```bash
mkdir -p storage/app/temp/chunks
mkdir -p storage/app/uploads/temp/video
mkdir -p storage/app/uploads/temp/file
mkdir -p storage/app/uploads/thumbnails/episodes
mkdir -p storage/app/uploads/optimized/episodes
chmod -R 755 storage/app/temp/
chmod -R 755 storage/app/uploads/
```

### 3. PHP Configuration
Update your `php.ini`:
```ini
upload_max_filesize = 1024M
post_max_size = 1024M
memory_limit = 512M
max_execution_time = 1800
max_input_time = 1800
```

### 4. Queue Setup (Optional but Recommended)
```bash
# Add to .env
QUEUE_CONNECTION=database

# Create queue table
php artisan queue:table
php artisan migrate

# Start queue worker
php artisan queue:work
```

### 5. FFmpeg Installation (Optional)
For video processing features:
- **Windows**: Download from https://ffmpeg.org/download.html
- **Linux**: `sudo apt install ffmpeg`
- **macOS**: `brew install ffmpeg`

## 🔧 Configuration

### Chunk Size
Default chunk size is 2MB. To change:
```javascript
// In chunked-uploader.js
chunkSize: 1024 * 1024 * 2, // 2MB chunks
```

### Max File Size
Default max file size is 1GB. To change:
```javascript
// In chunked-uploader.js
maxFileSize: 1024 * 1024 * 1024, // 1GB max
```

### Upload URLs
Routes are automatically configured with the correct prefix:
- Upload: `/admin-panel/episode/chunked-upload`
- Check: `/admin-panel/episode/chunked-upload/check`
- Move: `/admin-panel/episode/chunked-upload/move`
- Delete: `/admin-panel/episode/chunked-upload/delete`

## 📝 Usage

### In Blade Templates
```blade
<x-chunked-upload 
    type="video" 
    name="video" 
    accept="video/*" 
    :required="true"
    label="ویدیو آموزش"
/>
```

### Component Parameters
- `type`: File type ('video' or 'file')
- `name`: Input field name
- `accept`: File type restrictions
- `required`: Whether field is required
- `label`: Display label
- `existingFile`: Path to existing file (for edit forms)

### JavaScript Events
```javascript
// Listen for upload completion
container.addEventListener('upload-complete', function(e) {
    console.log('Upload completed:', e.detail);
});
```

## 🔍 Troubleshooting

### Common Issues

#### 1. "File too large" Error
- Check PHP `upload_max_filesize` and `post_max_size` settings
- Verify nginx/apache configuration for large files

#### 2. "Maximum execution time exceeded"
- Increase `max_execution_time` in php.ini
- Consider using background processing for large files

#### 3. Chunked Uploads Failing
- Check temp directory permissions
- Verify CSRF token is present
- Check browser console for JavaScript errors

#### 4. Form Validation Errors
- Ensure validation rules are updated for chunked uploads
- Check that hidden inputs are properly set

### Debug Mode
Enable debug logging:
```php
// In .env
LOG_LEVEL=debug
```

### Monitoring
Monitor upload progress:
```bash
# Check queue status
php artisan queue:work --once

# Monitor logs
tail -f storage/logs/laravel.log
```

## 🔒 Security Considerations

### File Validation
- Server-side file type validation
- File size limits enforced
- Secure file naming with UUIDs

### Access Control
- Authentication required for uploads
- CSRF protection enabled
- Proper file permissions

### Cleanup
- Temporary files automatically cleaned up
- Abandoned uploads handled
- Storage quotas can be implemented

## 📊 Performance

### Optimizations
- Chunked uploads reduce memory usage
- Background processing prevents timeouts
- Efficient file storage organization
- CDN-ready file structure

### Monitoring
- Upload speed tracking
- Progress indicators
- Error rate monitoring
- Storage usage tracking

## 🔄 Migration from Traditional Uploads

### Backward Compatibility
- Traditional file uploads still work
- Gradual migration possible
- No breaking changes to existing functionality

### Migration Steps
1. Update forms to use new component
2. Update validation rules
3. Test with existing data
4. Monitor performance improvements

## 📈 Future Enhancements

### Planned Features
- Multiple file upload support
- Advanced video processing (transcoding)
- Cloud storage integration
- Real-time upload analytics
- Mobile app support

### Extensibility
- Modular design for easy extension
- Plugin architecture for additional features
- API endpoints for external integration

## 🤝 Contributing

### Development Setup
1. Fork the repository
2. Create feature branch
3. Implement changes
4. Add tests
5. Submit pull request

### Testing
```bash
# Run tests
php artisan test

# Test upload functionality
php artisan serve
# Visit episode create page and test uploads
```

## 📞 Support

For issues and questions:
1. Check troubleshooting section
2. Review logs for error details
3. Test with smaller files first
4. Verify configuration settings

## 📄 License

This implementation is part of the Analyzoor project and follows the same licensing terms.

---

**Last Updated**: July 2025
**Version**: 1.0.0
**Compatibility**: Laravel 10+, PHP 8.1+ 
