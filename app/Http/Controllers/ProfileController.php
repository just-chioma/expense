<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
     public function show(){
      $profile = Profile::firstOrCreate(
        ['user_id' => auth()->id()]
     );

      return view('profile.show', compact('profile'));
 }

    public function edit(){
    $profile = Profile::where('user_id', auth()->id())->firstOrFail();
    return view('profile.edit', compact('profile'));
 }

 public function update(Request $request){
    $profile = Profile::where('user_id', auth()->id())->firstOrFail();
    $incomingFields = $request->validate([
        'first_name' => 'nullable|string|max:255',
        'last_name'  => 'nullable|string|max:255',
        'phone'      => 'nullable|string|max:20',
        'dob'        => 'nullable|date',
        'address'    => 'nullable|string|max:255',
        'state'      => 'nullable|string|max:255',
        'country'    => 'nullable|string|max:255',
        'img'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('img')) {

     if ($profile->img && Storage::disk('public')->exists($profile->img)) {
          Storage::disk('public')->delete($profile->img);
        }

        $incomingFields['img'] = $request->file('img')->store('profiles', 'public');
    }

    $profile->update($incomingFields);

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
}
}
