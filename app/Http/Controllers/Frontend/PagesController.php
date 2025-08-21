<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    public function about()
    {
        $data= Page::where('slug','about-us')->first();
        // dd($data); this line is data ck command
        return view('front.pages.about-us', compact('data'));
    }

    public function contact()
    {
        $data= Page::where('slug','contact-us')->first();
        return view('front.pages.contact-us', compact('data'));
    }
    public function storeContact(Request $request){
        $validated = $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname'  => 'required|string|max:100',
            'email'     => 'required|email|max:150',
            'phone'     => 'nullable|string|max:20',
            'message'   => 'nullable|string',
        ]);

        DB::table('contacts')->insert([
            'firstname'  => $validated['firstname'],
            'lastname'   => $validated['lastname'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'] ?? null,
            'message'    => $validated['message'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function faq()
    {
         $data= Page::where('slug','faq')->first();
        $faqs = DB::table('faq')->get();
        return view('front.pages.faq', compact('faqs', 'data'));
    }

    public function terms()
    {

        $data= Page::where('slug','terms-and-conditions')->first();
        return view('front.pages.terms-conditions', compact('data'));
    }

    public function privacy()
    {
        $data= Page::where('slug','privacy-policy')->first();
        return view('front.pages.privacy-policy', compact('data'));
    }
}

