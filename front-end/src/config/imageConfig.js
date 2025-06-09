export const imageConfig = {
    uploadPath: '/images',
    allowedTypes: ['image/jpeg', 'image/png', 'image/gif', 'image/webp'],
    maxSize: 5 * 1024 * 1024, // 5MB
    baseUrl: import.meta.env.VITE_API_URL || 'http://localhost:8000'
};

export const getImageUrl = (imagePath) => {
    if (!imagePath) return '';
    return `${imageConfig.baseUrl}${imageConfig.uploadPath}/${imagePath}`;
};