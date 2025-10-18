<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profileimage extends BaseController
{
    public function edit()
    {
        return view('Admin/Profileimage/edit');
    }

    public function update()
    {
        $file = $this->request->getFile('image');

        if (!$file->isValid()) {
            $error_code = $file->getError();

            if ($error_code == UPLOAD_ERR_NO_FILE) {
                return redirect()->back()->with('warning', 'No file selected');
            }

            throw new \RuntimeException($file->getErrorString() . " " . $error_code);
        }

        $size = $file->getSizeByUnit('mb');
        if ($size > 2) {
            return redirect()->back()->with('warning', 'File too large (max 2MB)');
        }

        $type = $file->getMimeType();
        if (!in_array($type, ['image/png', 'image/jpeg'])) {
            return redirect()->back()->with('warning', 'Invalid file format (PNG or JPEG only)');
        }

        $path = $file->store('profile_images');
        $path = WRITEPATH . 'uploads/' . $path;

        service('image')
            ->withFile($path)
            ->fit(200, 200, 'center')
            ->save($path);

        $user = service('auth')->getCurrentUser();
        $user->profile_image = $file->getName();

        $model = new UserModel();
        $model->protect(false)->save($user);

        return redirect()->to("/profile/show")->with('info', 'Image uploaded successfully');
    }

    // ✅ Nueva función para mostrar confirmación
    public function confirmDelete()
    {
        return view('Admin/Profileimage/delete');
    }

    // ✅ Acción real de eliminación
    public function delete()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/profile/show');
        }

        $user = service('auth')->getCurrentUser();
        $path = WRITEPATH . 'uploads/profile_images/' . $user->profile_image;

        if (is_file($path)) {
            unlink($path);
        }

        $user->profile_image = null;

        $model = new UserModel();
        $model->protect(false)->save($user);

        return redirect()->to('/profile/show')->with('info', 'Image deleted');
    }
}
