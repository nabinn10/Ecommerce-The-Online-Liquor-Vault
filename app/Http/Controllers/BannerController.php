<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('priority')->get(); // Sort banners by priority
        $totalBanners = Banner::count();
        return view('banners.index', compact('banners','totalBanners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required|integer',
            'status' => 'required|string', // Validate that status is either 'Show' or 'Hide'
            'photopath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Convert status to an integer value (1 for Show, 0 for Hide)
        $data['status'] = $request->status === 'Show' ? 1 : 0;

        // Handle file upload
        if ($request->hasFile('photopath')) {
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/banners/'), $photoname);
            $data['photo_path'] = $photoname;
        }

        // Create the banner with the validated and processed data
        Banner::create($data);

        return redirect()->route('banners.index')->with('success', 'Banner Created Successfully');
    }



    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority' => 'required|integer',
            'status' => 'required|string',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $banner = Banner::findOrFail($id);
        $data['photopath'] = $banner->photopath;

        if ($request->hasFile('photopath')) {
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/banners/'), $photoname);
            $data['photopath'] = $photoname;

            // Delete old photo if exists
            $oldPhotoPath = public_path('images/banners/' . $banner->photopath);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }

        $banner->update($data);

        return redirect()->route('banners.index')->with('success', 'Banner Updated Successfully');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete associated photo
        $photoPath = public_path('images/banners/' . $banner->photopath);
        if (file_exists($photoPath) && is_file($photoPath)) {
            unlink($photoPath);  // Make sure you're unlinking a file
        }

        $banner->delete();

        return redirect()->back()->with('success', 'Banner Deleted Successfully');
    }
}
