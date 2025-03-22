<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return inertia('Home');
    }

    public function renderMyAvatar()
    {
        $user = request()->user();
        
        // Check if user is authenticated and has an avatar
        if ($user->avatar == null) {
            abort(404, 'Avatar not found');
        }
        
        // Get the binary avatar data
        $avatarData = $user->avatar;
        
        // Detect the image type (you might want to store this separately in the future)
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($avatarData) ?: 'image/jpeg';
        
        // Set the appropriate headers for image download
        return response($avatarData)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', 'inline; filename="avatar.' . $this->getExtensionFromMimeType($mimeType) . '"')
            ->header('Cache-Control', 'public, max-age=86400'); // Cache for 1 day
    }
    
    /**
     * Get file extension from MIME type
     *
     * @param string $mimeType
     * @return string
     */
    private function getExtensionFromMimeType(string $mimeType): string
    {
        $map = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'image/svg+xml' => 'svg',
        ];
        
        return $map[$mimeType] ?? 'jpg';
    }
}
