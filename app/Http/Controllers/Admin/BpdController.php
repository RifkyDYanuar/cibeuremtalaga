<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BpdMember;
use App\Models\BpdActivity;
use App\Models\BpdContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BpdController extends Controller
{
    public function index()
    {
        $totalMembers = BpdMember::count();
        $totalActivities = BpdActivity::count();
        $hasContent = BpdContent::count() > 0;
        
        return view('admin.bpd.index', compact('totalMembers', 'totalActivities', 'hasContent'));
    }

    // === ANGGOTA BPD ===
    public function members()
    {
        $members = BpdMember::orderBy('position')->orderBy('name')->get();
        return view('admin.bpd.members', compact('members'));
    }

    public function createMember()
    {
        return view('admin.bpd.member-form');
    }

    public function storeMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $request->except(['photo']);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('bpd/members', $filename, 'public');
            $data['photo'] = $filename;
        }

        BpdMember::create($data);

        return redirect()->route('admin.bpd.members')
                        ->with('success', 'Anggota BPD berhasil ditambahkan.');
    }

    public function editMember($id)
    {
        $member = BpdMember::findOrFail($id);
        return view('admin.bpd.member-form', compact('member'));
    }

    public function updateMember(Request $request, $id)
    {
        $member = BpdMember::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $request->except(['photo']);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($member->photo && Storage::disk('public')->exists('bpd/members/' . $member->photo)) {
                Storage::disk('public')->delete('bpd/members/' . $member->photo);
            }

            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('bpd/members', $filename, 'public');
            $data['photo'] = $filename;
        }

        $member->update($data);

        return redirect()->route('admin.bpd.members')
                        ->with('success', 'Anggota BPD berhasil diperbarui.');
    }

    public function destroyMember($id)
    {
        $member = BpdMember::findOrFail($id);

        // Delete photo
        if ($member->photo && Storage::disk('public')->exists('bpd/members/' . $member->photo)) {
            Storage::disk('public')->delete('bpd/members/' . $member->photo);
        }

        $member->delete();

        return redirect()->route('admin.bpd.members')
                        ->with('success', 'Anggota BPD berhasil dihapus.');
    }

    public function bulkDestroyMembers(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:bpd_members,id'
        ]);

        $deleted = 0;
        $members = BpdMember::whereIn('id', $request->ids)->get();

        foreach ($members as $member) {
            // Delete photo
            if ($member->photo && Storage::disk('public')->exists('bpd/members/' . $member->photo)) {
                Storage::disk('public')->delete('bpd/members/' . $member->photo);
            }

            $member->delete();
            $deleted++;
        }

        return redirect()->route('admin.bpd.members')
                        ->with('success', "Berhasil menghapus {$deleted} anggota BPD.");
    }

    // === ACTIVITY MANAGEMENT ===

    // === ACTIVITIES MANAGEMENT ===
    public function activities()
    {
        $activities = BpdActivity::latest()->paginate(12);
        return view('admin.bpd.activities', compact('activities'));
    }

    public function createActivity()
    {
        return view('admin.bpd.activity-form');
    }

    public function storeActivity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'activity_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'location' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $request->except(['image']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('bpd/activities', $filename, 'public');
            $data['image'] = $filename;
        }

        BpdActivity::create($data);

        return redirect()->route('admin.bpd.activities')
                        ->with('success', 'Kegiatan BPD berhasil ditambahkan.');
    }

    public function editActivity($id)
    {
        $activity = BpdActivity::findOrFail($id);
        return view('admin.bpd.activity-form', compact('activity'));
    }

    public function updateActivity(Request $request, $id)
    {
        $activity = BpdActivity::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'activity_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'location' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $request->except(['image']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($activity->image && Storage::disk('public')->exists('bpd/activities/' . $activity->image)) {
                Storage::disk('public')->delete('bpd/activities/' . $activity->image);
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('bpd/activities', $filename, 'public');
            $data['image'] = $filename;
        }

        $activity->update($data);

        return redirect()->route('admin.bpd.activities')
                        ->with('success', 'Kegiatan BPD berhasil diperbarui.');
    }

    public function destroyActivity($id)
    {
        $activity = BpdActivity::findOrFail($id);

        // Delete image
        if ($activity->image && Storage::disk('public')->exists('bpd/activities/' . $activity->image)) {
            Storage::disk('public')->delete('bpd/activities/' . $activity->image);
        }

        $activity->delete();

        return redirect()->route('admin.bpd.activities')
                        ->with('success', 'Kegiatan BPD berhasil dihapus.');
    }

    public function bulkDestroyActivities(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:bpd_activities,id'
        ]);

        $deleted = 0;
        $activities = BpdActivity::whereIn('id', $request->ids)->get();

        foreach ($activities as $activity) {
            // Delete image
            if ($activity->image && Storage::disk('public')->exists('bpd/activities/' . $activity->image)) {
                Storage::disk('public')->delete('bpd/activities/' . $activity->image);
            }

            $activity->delete();
            $deleted++;
        }

        return redirect()->route('admin.bpd.activities')
                        ->with('success', "Berhasil menghapus {$deleted} kegiatan BPD.");
    }

    // === CONTENT MANAGEMENT ===
    public function content()
    {
        $content = [];
        $contentItems = BpdContent::all();
        
        foreach ($contentItems as $item) {
            $content[$item->key] = $item->content;
        }
        
        return view('admin.bpd.content', compact('content'));
    }

    public function storeContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bpd_profil' => 'nullable|string',
            'bpd_visi' => 'nullable|string',
            'bpd_misi' => 'nullable|string',
            'bpd_dasar_hukum' => 'nullable|string',
            'bpd_contact_phone' => 'nullable|string',
            'bpd_contact_email' => 'nullable|email',
            'bpd_contact_address' => 'nullable|string',
            'bpd_jam_pelayanan' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $contentKeys = [
            'bpd_profil', 'bpd_visi', 'bpd_misi', 'bpd_dasar_hukum', 
            'bpd_contact_phone', 'bpd_contact_email', 'bpd_contact_address', 'bpd_jam_pelayanan'
        ];

        foreach ($contentKeys as $key) {
            if ($request->has($key)) {
                BpdContent::updateOrCreate(
                    ['key' => $key],
                    ['content' => $request->input($key), 'type' => 'text']
                );
            }
        }

        return redirect()->route('admin.bpd.content')
                        ->with('success', 'Konten BPD berhasil diperbarui.');
    }
}
