# Large File Upload Configuration

## PHP Configuration (php.ini)

Add or update these settings in your `php.ini` file:

```ini
# Maximum file size for uploads (1GB)
upload_max_filesize = 1024M

# Maximum POST data size (1GB)
post_max_size = 1024M

# Maximum memory limit (512MB)
memory_limit = 512M

# Maximum execution time (30 minutes)
max_execution_time = 1800

# Maximum input time (30 minutes)
max_input_time = 1800

# Maximum number of files that can be uploaded simultaneously
max_file_uploads = 20

# Temporary directory for file uploads
upload_tmp_dir = /tmp
```

## Nginx Configuration

If using Nginx, update your server block:

```nginx
server {
    # Maximum client body size (1GB)
    client_max_body_size 1024M;
    
    # Increase timeouts for large uploads
    client_body_timeout 300s;
    client_header_timeout 300s;
    
    # Increase proxy timeouts if using PHP-FPM
    proxy_connect_timeout 300s;
    proxy_send_timeout 300s;
    proxy_read_timeout 300s;
    
    # Buffer size for reading client request body
    client_body_buffer_size 128k;
    
    # Location for PHP files
    location ~ \.php$ {
        fastcgi_read_timeout 300s;
        fastcgi_send_timeout 300s;
        # ... other fastcgi settings
    }
}
```

## Apache Configuration

If using Apache, update your virtual host or .htaccess:

```apache
# Maximum upload size
php_value upload_max_filesize 1024M
php_value post_max_size 1024M
php_value memory_limit 512M
php_value max_execution_time 1800
php_value max_input_time 1800

# Apache request timeout
Timeout 1800
```

## Laravel Configuration

Update your Laravel configuration files:

### config/filesystems.php
```php
'disks' => [
    'local' => [
        'driver' => 'local',
        'root' => storage_path('app'),
        'permissions' => [
            'file' => [
                'public' => 0644,
                'private' => 0600,
            ],
            'dir' => [
                'public' => 0755,
                'private' => 0700,
            ],
        ],
    ],
],
```

### .env file
```env
# Set higher limits for chunked uploads
UPLOAD_MAX_FILESIZE=1024M
POST_MAX_SIZE=1024M
MEMORY_LIMIT=512M
MAX_EXECUTION_TIME=1800
```

## Directory Permissions

Ensure proper permissions for upload directories:

```bash
# Make sure storage directories are writable
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Create temp directories for chunked uploads
mkdir -p storage/app/temp/chunks
mkdir -p storage/app/uploads/temp
chmod -R 755 storage/app/temp/
chmod -R 755 storage/app/uploads/
```

## Testing the Configuration

After making these changes:

1. Restart your web server (Apache/Nginx)
2. Restart PHP-FPM if using it
3. Clear Laravel cache:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Troubleshooting

Common issues and solutions:

1. **"File too large" error**: Check `upload_max_filesize` and `post_max_size`
2. **"Maximum execution time exceeded"**: Increase `max_execution_time`
3. **"Out of memory" error**: Increase `memory_limit`
4. **Chunked uploads failing**: Check temp directory permissions
5. **Nginx 413 error**: Increase `client_max_body_size`

## Monitoring

Monitor your server resources during large uploads:

```bash
# Check disk space
df -h

# Monitor memory usage
free -h

# Monitor PHP processes
ps aux | grep php

# Check logs
tail -f /var/log/nginx/error.log
tail -f /var/log/php/error.log
```

## Security Considerations

1. **File type validation**: Always validate file types server-side
2. **Virus scanning**: Consider implementing virus scanning for uploaded files
3. **Storage limits**: Implement user storage quotas
4. **Access controls**: Secure file access with proper authentication
5. **Cleanup**: Implement cleanup for abandoned temporary files

## Performance Tips

1. **Use SSD storage**: For better I/O performance
2. **Separate storage**: Use separate disk for uploads
3. **CDN integration**: Consider using CDN for file delivery
4. **Background processing**: Process large files in background queues
5. **Compression**: Implement file compression where appropriate 
